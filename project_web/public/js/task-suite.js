(function () {
  "use strict";

  console.log("Nexa Task Suite JS loading...");

  // --- UTILITIES ---
  const formatTime = (s) => {
    if (!s || isNaN(s)) return "0:00";
    const m = Math.floor(s / 60);
    const sec = Math.floor(s % 60);
    return `${m}:${String(sec).padStart(2, '0')}`;
  };

  // --- GLOBAL AUDIO STATE ---
  // We keep the state on window so it survives script re-executions
  window.__nexa_audio_state = window.__nexa_audio_state || {
    tracks: [],
    currentIndex: 0,
    isPlaying: false
  };

  const getAudioInstance = () => {
    return document.getElementById("globalAudioEngine");
  };

  // --- GLOBAL UI SYNC ---
  const syncGlobalUI = () => {
    const state = window.__nexa_audio_state;
    const track = state.tracks[state.currentIndex];
    const audio = getAudioInstance();
    if (!audio) return;

    state.isPlaying = !audio.paused;

    // Update Music Lounge (if present)
    const loungeTitle = document.getElementById("cyberTrackTitle");
    const loungeArtist = document.getElementById("cyberTrackArtist");
    const loungeCover = document.getElementById("cyberTrackCover");

    if (track) {
      if (loungeTitle) loungeTitle.innerText = track.trackName;
      if (loungeArtist) loungeArtist.innerText = track.artistName;
      if (loungeCover) loungeCover.style.backgroundImage = `url(${track.artworkUrl100.replace('100x100', '600x600')})`;
    }

    // Update Mini HUD
    const miniHud = document.getElementById("cyberMiniHud");
    const miniTitle = document.getElementById("miniHudTitle");
    const miniCover = document.getElementById("miniHudCover");
    const miniPlayBtn = document.getElementById("miniHudPlay");

    if (track) {
      const miniArtist = document.getElementById("miniHudArtist");
      if (miniTitle) miniTitle.innerText = track.trackName;
      if (miniArtist) miniArtist.innerText = track.artistName;
      if (miniCover) miniCover.style.backgroundImage = `url(${track.artworkUrl100.replace('100x100', '600x600')})`;
    }

    if (miniPlayBtn) {
      miniPlayBtn.innerHTML = state.isPlaying ? '<i class="fa-solid fa-pause"></i>' : '<i class="fa-solid fa-play"></i>';
    }

    // Toggle Play/Pause Icons in Lounge
    document.querySelectorAll(".nexus-play-toggle").forEach(btn => {
      btn.innerHTML = state.isPlaying ? '<i class="fa-solid fa-pause"></i>' : '<i class="fa-solid fa-play"></i>';
    });

    // Update List Active state
    document.querySelectorAll(".track-item").forEach(item => {
      item.classList.toggle("active", parseInt(item.dataset.index) === state.currentIndex);
    });

    updateHudVisibility();
  };

  const updateHudVisibility = () => {
    const miniHud = document.getElementById("cyberMiniHud");
    const isMusicPage = !!document.querySelector("[data-suite-page='music']");
    const audio = getAudioInstance();
    const isPlaying = audio && !audio.paused;

    if (miniHud) {
      if (!isMusicPage && isPlaying) {
        miniHud.style.setProperty('display', 'flex', 'important');
      } else {
        miniHud.style.display = 'none';
      }
    }
  };

  // --- ACTIONS ---
  window.nexusAction = (action, payload) => {
    const audio = getAudioInstance();
    const state = window.__nexa_audio_state;
    if (!audio) return;

    switch (action) {
      case 'toggle':
        if (audio.paused) {
          if (!audio.src && state.tracks.length > 0) {
            window.playTrack(state.currentIndex);
          } else {
            audio.play().catch(e => console.warn("Playback failed", e));
          }
        } else {
          audio.pause();
        }
        break;
      case 'next':
        window.playTrack((state.currentIndex + 1) % state.tracks.length);
        break;
      case 'prev':
        window.playTrack((state.currentIndex - 1 + state.tracks.length) % state.tracks.length);
        break;
      case 'close':
        audio.pause();
        state.isPlaying = false;
        updateHudVisibility();
        break;
    }
    syncGlobalUI();
  };

  window.playTrack = (index) => {
    const audio = getAudioInstance();
    const state = window.__nexa_audio_state;
    const track = state.tracks[index];
    if (!audio || !track) return;

    state.currentIndex = index;
    audio.src = track.previewUrl;
    audio.play().then(() => {
      state.isPlaying = true;
      syncGlobalUI();
    }).catch(e => console.warn("Audio blocked", e));
  };

  // --- INIT AUDIO LISTENERS ---
  const initGlobalAudioListeners = () => {
    const audio = getAudioInstance();
    if (!audio || audio.__listenersSet) return;
    audio.__listenersSet = true;

    console.log("Setting up global audio listeners...");
    audio.onplay = () => syncGlobalUI();
    audio.onpause = () => syncGlobalUI();
    audio.onended = () => window.nexusAction('next');
    audio.ontimeupdate = () => {
      // We could sync progress bars here if needed
    };
  };

  // --- MOUNT MUSIC LOUNGE ---
  const mountMusicLounge = () => {
    const container = document.querySelector("[data-suite-page='music']");
    if (!container || container.__mounted) return;
    container.__mounted = true;

    console.log("Mounting Music Lounge...");
    const listEl = document.getElementById("cyberTrackList");
    const searchInput = document.getElementById("cyberSearch");
    const playToggle = document.getElementById("cyberPlayToggle");
    const nextBtn = document.getElementById("cyberNext");
    const prevBtn = document.getElementById("cyberPrev");

    const loadLibrary = async (term = "Ambient Focus") => {
      if (!listEl) return;
      listEl.innerHTML = '<div style="padding: 20px; text-align: center;">Scanning library...</div>';

      try {
        const res = await fetch(`https://itunes.apple.com/search?term=${encodeURIComponent(term)}&entity=song&limit=40`);
        const data = await res.json();
        window.__nexa_audio_state.tracks = data.results || [];

        if (window.__nexa_audio_state.tracks.length === 0) {
          listEl.innerHTML = '<div style="padding: 20px; text-align: center;">No matches found.</div>';
          return;
        }

        renderTrackList();
        syncGlobalUI();
      } catch (e) {
        listEl.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">Connection failed.</div>';
      }
    };

    const renderTrackList = () => {
      if (!listEl) return;
      listEl.innerHTML = window.__nexa_audio_state.tracks.map((t, i) => `
            <div class="track-item" data-index="${i}">
                <div class="track-item-info">
                    <div class="track-item-title">${t.trackName}</div>
                    <div class="track-item-artist">${t.artistName}</div>
                </div>
                <div style="font-size: 0.7rem; opacity: 0.5;">${formatTime(t.trackTimeMillis / 1000)}</div>
            </div>
        `).join("");

      listEl.querySelectorAll(".track-item").forEach(item => {
        item.onclick = () => window.playTrack(parseInt(item.dataset.index));
      });
    };

    if (searchInput) {
      searchInput.onkeydown = (e) => {
        if (e.key === 'Enter') loadLibrary(searchInput.value);
      };
    }

    if (playToggle) playToggle.onclick = () => window.nexusAction('toggle');
    if (nextBtn) nextBtn.onclick = () => window.nexusAction('next');
    if (prevBtn) prevBtn.onclick = () => window.nexusAction('prev');

    // Initial load if empty
    if (window.__nexa_audio_state.tracks.length === 0) {
      loadLibrary();
    } else {
      renderTrackList();
      syncGlobalUI();
    }
  };

  const initAll = () => {
    initGlobalAudioListeners();

    const container = document.querySelector("[data-suite-page]");
    const type = container?.dataset?.suitePage;

    if (type === "music") mountMusicLounge();

    // Always sync UI on page load to ensure HUD shows up correctly
    syncGlobalUI();
  };

  // Execution
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAll);
  } else {
    initAll();
  }

  document.addEventListener("turbo:load", initAll);

})();
