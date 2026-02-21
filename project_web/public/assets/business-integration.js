/**
 * Business Features Integration
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('Initializing Business Features Integration...');

    const api = window.NEXA_API || {};
    const getTasks = () => window.allTasks || [];
    const getCats = () => window.allCategories || [];

    const safeExec = async (name, fn) => {
        try {
            await fn();
        } catch (err) {
            console.error(`Error in ${name}:`, err);
            const detail = err?.message ? ` (${err.message})` : '';
            window.showToast?.({
                type: 'error',
                title: 'Erreur',
                message: `Impossible d'executer ${name}${detail}`,
            });
        }
    };

    const fetchJSON = async (url) => {
        const res = await fetch(url);
        const text = await res.text();
        let data = {};
        try {
            data = text ? JSON.parse(text) : {};
        } catch {
            data = {};
        }
        if (!res.ok) throw new Error(data?.error || `HTTP ${res.status}`);
        return data;
    };

    const pdfBtn = document.getElementById('exportPdfBtn');
    pdfBtn?.addEventListener('click', () => {
        safeExec('PDF Export', async () => {
            if (!window.pdfExporter) throw new Error('PDF engine missing');
            await window.pdfExporter.exportBoard(getTasks(), getCats());
        });
    });

    const excelBtn = document.getElementById('exportExcelBtn');
    excelBtn?.addEventListener('click', () => {
        safeExec('Excel Export', async () => {
            if (!window.businessFeatures) throw new Error('Excel engine missing');
            await window.businessFeatures.exportToExcel(getTasks());
        });
    });

    const anaBtn = document.getElementById('showAnalyticsBtn');
    const calendarBtn = document.getElementById('showCalendarBtn');
    const weatherBtn = document.getElementById('showWeatherBtn');
    const anaModal = document.getElementById('analyticsModal');
    const anaBody = document.getElementById('analyticsBody');
    const modalTitle = document.querySelector('#analyticsModal .analytics-header h2');

    anaBtn?.addEventListener('click', () => {
        safeExec('Analytics', async () => {
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fa-solid fa-chart-line"></i> Analytics & Rapports';
            }
            const analytics = await loadAnalytics();
            displayAnalytics(analytics);
            anaModal?.classList.add('active');
        });
    });

    calendarBtn?.addEventListener('click', () => {
        safeExec('Calendrier', async () => {
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fa-solid fa-calendar-days"></i> Calendrier des taches';
            }
            const now = new Date();
            const from = new Date(now.getFullYear(), now.getMonth(), 1).toISOString().slice(0, 10);
            const to = new Date(now.getFullYear(), now.getMonth() + 1, 0).toISOString().slice(0, 10);
            const url = `${api.calendarEvents}?from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`;
            const payload = await fetchJSON(url);
            displayCalendar(payload?.data || [], payload?.meta || null);
            anaModal?.classList.add('active');
        });
    });

    weatherBtn?.addEventListener('click', () => {
        safeExec('Meteo', async () => {
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fa-solid fa-cloud-sun"></i> Meteo';
            }
            const city = window.prompt('Ville pour la meteo:', 'Tunis');
            if (city === null) return;
            const url = `${api.weatherCurrent}?city=${encodeURIComponent(city || 'Tunis')}`;
            const payload = await fetchJSON(url);
            displayWeather(payload?.data || null);
            anaModal?.classList.add('active');
        });
    });

    document.getElementById('closeAnalytics')?.addEventListener('click', () => {
        anaModal?.classList.remove('active');
    });

    anaModal?.addEventListener('click', (e) => {
        if (e.target === anaModal) {
            anaModal.classList.remove('active');
        }
    });

    async function loadAnalytics() {
        const canUseApi = api.analyticsThroughput && api.analyticsWorkload && api.analyticsCycleTime;
        if (!canUseApi) {
            return fallbackAnalytics();
        }

        try {
            const [throughputRaw, workloadStatusRaw, workloadPriorityRaw, cycleTimeRaw, dashboardRaw] = await Promise.all([
                fetchJSON(api.analyticsThroughput),
                fetchJSON(`${api.analyticsWorkload}?groupBy=status`),
                fetchJSON(`${api.analyticsWorkload}?groupBy=priority`),
                fetchJSON(api.analyticsCycleTime),
                api.dashboardStats ? fetchJSON(api.dashboardStats) : Promise.resolve(null),
            ]);

            return {
                throughput: throughputRaw?.data || {},
                status: workloadStatusRaw?.data || {},
                priority: workloadPriorityRaw?.data || {},
                cycleTime: cycleTimeRaw?.averageHours || 0,
                cycleSamples: cycleTimeRaw?.samples || 0,
                totals: dashboardRaw?.totals || null,
                tasksByStatus: dashboardRaw?.tasksByStatus || null,
            };
        } catch (error) {
            console.warn('Backend analytics failed, fallback local analytics', error);
            return fallbackAnalytics();
        }
    }

    function fallbackAnalytics() {
        const tasks = getTasks();
        const stats = window.businessFeatures?.generateAnalytics(tasks);
        return {
            fallback: true,
            local: stats,
        };
    }

    function displayAnalytics(analytics) {
        if (!anaBody) return;

        if (analytics.fallback) {
            const local = analytics.local;
            if (!local) {
                anaBody.innerHTML = '<p>Aucune donnee disponible.</p>';
                return;
            }

            anaBody.innerHTML = `
                <div class="analytics-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:15px;">
                    <div class="analytics-card" style="background:rgba(255,255,255,0.05);padding:20px;border-radius:15px;">
                        <div style="font-size:0.8rem;color:var(--muted);font-weight:800;">TOTAL TACHES</div>
                        <div style="font-size:2rem;font-weight:900;">${local.overview.total}</div>
                    </div>
                    <div class="analytics-card" style="background:rgba(255,255,255,0.05);padding:20px;border-radius:15px;">
                        <div style="font-size:0.8rem;color:var(--muted);font-weight:800;">COMPLETION</div>
                        <div style="font-size:2rem;font-weight:900;color:var(--good);">${local.overview.completionRate}%</div>
                    </div>
                </div>
                <div style="margin-top:20px;padding:20px;background:rgba(255,255,255,0.03);border-radius:15px;">
                    <div style="font-weight:900;margin-bottom:10px;">Mode local (fallback)</div>
                    <div>Donnees backend indisponibles, statistiques calculees depuis le front.</div>
                </div>
            `;
            return;
        }

        const status = analytics.status || {};
        const priority = analytics.priority || {};
        const throughputEntries = Object.entries(analytics.throughput || {});
        const lastDays = throughputEntries.slice(-7);

        anaBody.innerHTML = `
            <div class="analytics-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:15px;">
                <div class="analytics-card" style="background:rgba(255,255,255,0.05);padding:20px;border-radius:15px;">
                    <div style="font-size:0.8rem;color:var(--muted);font-weight:800;">TOTAL TACHES</div>
                    <div style="font-size:2rem;font-weight:900;">${(analytics.totals?.tasks ?? (status.todo || 0) + (status.doing || 0) + (status.done || 0))}</div>
                </div>
                <div class="analytics-card" style="background:rgba(255,255,255,0.05);padding:20px;border-radius:15px;">
                    <div style="font-size:0.8rem;color:var(--muted);font-weight:800;">CYCLE TIME MOYEN</div>
                    <div style="font-size:2rem;font-weight:900;color:var(--good);">${analytics.cycleTime}h</div>
                    <div style="font-size:0.75rem;opacity:0.8;">${analytics.cycleSamples} echantillons</div>
                </div>
            </div>

            <div style="margin-top:20px;padding:20px;background:rgba(255,255,255,0.03);border-radius:15px;">
               <div style="font-weight:900;margin-bottom:10px;">Repartition par statut</div>
               <div style="display:flex;gap:10px;flex-wrap:wrap;">
                  <span class="badge" style="background:rgba(159,122,234,0.2);color:#9f7aea;">Todo: ${status.todo || 0}</span>
                  <span class="badge" style="background:rgba(91,92,240,0.2);color:#5b5cf0;">Doing: ${status.doing || 0}</span>
                  <span class="badge" style="background:rgba(16,185,129,0.2);color:#10b981;">Done: ${status.done || 0}</span>
               </div>
            </div>

            <div style="margin-top:20px;padding:20px;background:rgba(255,255,255,0.03);border-radius:15px;">
               <div style="font-weight:900;margin-bottom:10px;">Repartition par priorite</div>
               <div style="display:flex;gap:10px;flex-wrap:wrap;">
                  <span class="badge" style="background:rgba(239,68,68,0.2);color:#ef4444;">High: ${priority.high || 0}</span>
                  <span class="badge" style="background:rgba(245,158,11,0.2);color:#f59e0b;">Med: ${priority.med || 0}</span>
                  <span class="badge" style="background:rgba(16,185,129,0.2);color:#10b981;">Low: ${priority.low || 0}</span>
               </div>
            </div>

            <div style="margin-top:20px;padding:20px;background:rgba(255,255,255,0.03);border-radius:15px;">
               <div style="font-weight:900;margin-bottom:10px;">Throughput (7 derniers jours)</div>
               <div style="display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:8px;">
                  ${lastDays.map(([day, val]) => `<div style="padding:10px;background:rgba(255,255,255,0.05);border-radius:10px;text-align:center;"><div style="font-size:0.75rem;opacity:0.8;">${day.slice(5)}</div><div style="font-weight:900;">${val}</div></div>`).join('') || '<div style="grid-column:1/-1;opacity:0.8;">Aucune tache completee sur la periode.</div>'}
               </div>
            </div>
        `;
    }

    function displayCalendar(events, meta) {
        if (!anaBody) return;

        if (!Array.isArray(events) || events.length === 0) {
            anaBody.innerHTML = `
                <div style="padding:20px;background:rgba(255,255,255,0.03);border-radius:15px;">
                    <div style="font-weight:900;margin-bottom:8px;">Aucun evenement</div>
                    <div>Aucune tache planifiee dans la periode selectionnee.</div>
                </div>
            `;
            return;
        }

        const rows = events.map((event) => {
            const date = event.start || '-';
            const status = event.status || '-';
            const priority = event.priority || '-';
            const category = event.category?.name || 'Sans categorie';
            return `
                <tr>
                    <td>${date}</td>
                    <td>${escapeHtml(event.title || '')}</td>
                    <td>${status}</td>
                    <td>${priority}</td>
                    <td>${escapeHtml(category)}</td>
                </tr>
            `;
        }).join('');

        anaBody.innerHTML = `
            <div style="margin-bottom:14px;opacity:0.85;">
                Periode: ${meta?.from || '-'} → ${meta?.to || '-'} | Evenements: ${meta?.count ?? events.length}
            </div>
            <div style="overflow:auto;border:1px solid rgba(255,255,255,0.1);border-radius:12px;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead>
                        <tr style="background:rgba(255,255,255,0.06);">
                            <th style="text-align:left;padding:10px;">Date</th>
                            <th style="text-align:left;padding:10px;">Titre</th>
                            <th style="text-align:left;padding:10px;">Statut</th>
                            <th style="text-align:left;padding:10px;">Priorite</th>
                            <th style="text-align:left;padding:10px;">Categorie</th>
                        </tr>
                    </thead>
                    <tbody>${rows}</tbody>
                </table>
            </div>
        `;
    }

    function displayWeather(data) {
        if (!anaBody) return;
        if (!data) {
            anaBody.innerHTML = '<p>Aucune donnee meteo disponible.</p>';
            return;
        }

        const iconByWeather = (label) => {
            const l = String(label || '').toLowerCase();
            if (l.includes('rain') || l.includes('pluie')) return 'fa-cloud-rain';
            if (l.includes('cloud') || l.includes('nuage')) return 'fa-cloud';
            if (l.includes('storm') || l.includes('orage')) return 'fa-bolt';
            if (l.includes('snow') || l.includes('neige')) return 'fa-snowflake';
            if (l.includes('mist') || l.includes('fog') || l.includes('brouillard')) return 'fa-smog';
            return 'fa-sun';
        };

        const weatherLabel = escapeHtml(data.current?.weatherLabel || '-');
        const currentIcon = iconByWeather(data.current?.weatherLabel);
        const tempNow = data.current?.temperature ?? '-';
        const tempFeel = data.current?.apparentTemperature ?? '-';
        const humidity = data.current?.humidity ?? '-';
        const wind = data.current?.windSpeed ?? '-';

        const forecastCards = (data.forecast || []).map((day) => `
            <article class="weather-forecast-card">
                <div class="weather-forecast-date">${escapeHtml(day.date || '-')}</div>
                <div class="weather-forecast-icon">
                    <i class="fa-solid ${iconByWeather(day.weatherLabel)}"></i>
                </div>
                <div class="weather-forecast-label">${escapeHtml(day.weatherLabel || '-')}</div>
                <div class="weather-forecast-temp">${day.tempMin ?? '-'}&deg; <span>/</span> ${day.tempMax ?? '-'}&deg;</div>
            </article>
        `).join('');

        anaBody.innerHTML = `
            <section class="weather-3d-shell">
                <div class="weather-3d-hero">
                    <div class="weather-3d-city-card">
                        <div class="weather-kicker">Ville</div>
                        <h3>${escapeHtml(data.city || '-')}</h3>
                        <p>${escapeHtml(data.country || '')}</p>
                    </div>

                    <div class="weather-3d-main-card">
                        <div class="weather-main-icon"><i class="fa-solid ${currentIcon}"></i></div>
                        <div>
                            <div class="weather-kicker">Meteo actuelle</div>
                            <div class="weather-main-temp">${tempNow}&deg;C</div>
                            <div class="weather-main-label">${weatherLabel}</div>
                        </div>
                    </div>
                </div>

                <div class="weather-3d-stats">
                    <div class="weather-stat-card">
                        <span>Ressenti</span>
                        <strong>${tempFeel}&deg;C</strong>
                    </div>
                    <div class="weather-stat-card">
                        <span>Humidite</span>
                        <strong>${humidity}%</strong>
                    </div>
                    <div class="weather-stat-card">
                        <span>Vent</span>
                        <strong>${wind} km/h</strong>
                    </div>
                </div>

                <div class="weather-forecast-wrap">
                    <h4><i class="fa-solid fa-calendar-days"></i> Previsions (5 jours)</h4>
                    <div class="weather-forecast-grid">
                        ${forecastCards || '<div class="weather-forecast-empty">Aucune prevision disponible.</div>'}
                    </div>
                </div>
            </section>
        `;
    }

    function escapeHtml(str) {
        return String(str ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    console.log('Business Integration Ready');
});
