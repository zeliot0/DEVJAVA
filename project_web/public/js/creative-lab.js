document.addEventListener('DOMContentLoaded', () => {
  initTicTacToe();
  initRiddle();
  initPuzzle();
  initReflexClick();
});

function initTicTacToe() {
  const boardEl = document.getElementById('tttBoard');
  const statusEl = document.getElementById('tttStatus');
  const resetBtn = document.getElementById('tttResetBtn');
  if (!boardEl || !statusEl || !resetBtn) return;

  let board = Array(9).fill('');
  let ended = false;
  let busy = false;
  const human = 'X';
  const ai = 'O';
  const wins = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8],
    [0, 3, 6], [1, 4, 7], [2, 5, 8],
    [0, 4, 8], [2, 4, 6],
  ];

  const build = () => {
    boardEl.innerHTML = '';
    board.forEach((value, index) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'ttt-cell';
      btn.textContent = value;
      btn.disabled = ended || busy || value !== '';
      btn.addEventListener('click', () => playHuman(index));
      boardEl.appendChild(btn);
    });
  };

  const winner = () => {
    for (const line of wins) {
      const [a, b, c] = line;
      if (board[a] && board[a] === board[b] && board[b] === board[c]) return board[a];
    }
    return '';
  };

  const evaluate = (cells, player) => {
    for (const [a, b, c] of wins) {
      if (cells[a] === player && cells[b] === player && cells[c] === player) return true;
    }
    return false;
  };

  const findBestMove = () => {
    const empties = board
      .map((value, index) => (value === '' ? index : -1))
      .filter((index) => index !== -1);

    for (const i of empties) {
      const test = [...board];
      test[i] = ai;
      if (evaluate(test, ai)) return i;
    }

    for (const i of empties) {
      const test = [...board];
      test[i] = human;
      if (evaluate(test, human)) return i;
    }

    if (board[4] === '') return 4;

    const corners = [0, 2, 6, 8].filter((i) => board[i] === '');
    if (corners.length > 0) return corners[Math.floor(Math.random() * corners.length)];

    return empties[Math.floor(Math.random() * empties.length)];
  };

  const finishOrContinue = () => {
    const win = winner();
    if (win) {
      ended = true;
      statusEl.textContent = `Bravo, ${win} gagne.`;
      return true;
    }

    if (board.every((c) => c !== '')) {
      ended = true;
      statusEl.textContent = 'Match nul.';
      return true;
    }

    return false;
  };

  const playAi = () => {
    if (ended) return;
    const aiMove = findBestMove();
    if (aiMove === undefined) return;
    board[aiMove] = ai;
    if (!finishOrContinue()) {
      statusEl.textContent = 'Votre tour (X)';
    }
    build();
  };

  const playHuman = (index) => {
    if (ended || busy || board[index]) return;
    board[index] = human;
    if (finishOrContinue()) {
      build();
      return;
    }
    build();
    busy = true;
    statusEl.textContent = 'Computer joue...';
    setTimeout(() => {
      playAi();
      busy = false;
      build();
    }, 280);
  };

  const reset = () => {
    board = Array(9).fill('');
    ended = false;
    busy = false;
    statusEl.textContent = 'Votre tour (X)';
    build();
  };

  resetBtn.addEventListener('click', reset);
  reset();
}

function initRiddle() {
  const questionEl = document.getElementById('riddleQuestion');
  const answerEl = document.getElementById('riddleAnswer');
  const statusEl = document.getElementById('riddleStatus');
  const checkBtn = document.getElementById('riddleCheckBtn');
  const nextBtn = document.getElementById('riddleNextBtn');
  if (!questionEl || !answerEl || !statusEl || !checkBtn || !nextBtn) return;

  const riddles = [
    { q: 'Je parle sans bouche et j entends sans oreilles. Qui suis-je ?', a: ['echo', 'écho'] },
    { q: 'Plus je grandis, moins on me voit. Qui suis-je ?', a: ['obscurite', 'obscurité', 'nuit'] },
    { q: 'J ai des villes sans maisons et des rivieres sans eau. Qui suis-je ?', a: ['carte', 'une carte'] },
    { q: 'Je peux courir mais je ne marche jamais. Qui suis-je ?', a: ['eau', 'la riviere', 'rivière'] },
  ];

  let idx = 0;

  const normalize = (s) => (s || '')
    .toLowerCase()
    .trim()
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '');

  const load = () => {
    idx = Math.floor(Math.random() * riddles.length);
    questionEl.textContent = riddles[idx].q;
    answerEl.value = '';
    statusEl.textContent = 'Entrez votre reponse puis cliquez sur Verifier.';
  };

  const check = () => {
    const user = normalize(answerEl.value);
    const ok = riddles[idx].a.some((a) => normalize(a) === user);
    statusEl.textContent = ok ? 'Bonne reponse, excellent.' : 'Pas encore. Essayez une autre formulation.';
  };

  nextBtn.addEventListener('click', load);
  checkBtn.addEventListener('click', check);
  answerEl.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') check();
  });

  load();
}

function initPuzzle() {
  const gridEl = document.getElementById('puzzleGrid');
  const statusEl = document.getElementById('puzzleStatus');
  const shuffleBtn = document.getElementById('puzzleShuffleBtn');
  if (!gridEl || !statusEl || !shuffleBtn) return;

  let state = [1, 2, 3, 4, 5, 6, 7, 8, 0];

  const render = () => {
    gridEl.innerHTML = '';
    state.forEach((value, index) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `puzzle-tile${value === 0 ? ' empty' : ''}`;
      btn.textContent = value === 0 ? '' : String(value);
      btn.addEventListener('click', () => move(index));
      gridEl.appendChild(btn);
    });
  };

  const neighbors = (index) => {
    const row = Math.floor(index / 3);
    const col = index % 3;
    const list = [];
    if (row > 0) list.push(index - 3);
    if (row < 2) list.push(index + 3);
    if (col > 0) list.push(index - 1);
    if (col < 2) list.push(index + 1);
    return list;
  };

  const solved = () => state.join(',') === '1,2,3,4,5,6,7,8,0';

  const move = (index) => {
    const empty = state.indexOf(0);
    if (!neighbors(index).includes(empty)) return;
    [state[index], state[empty]] = [state[empty], state[index]];
    render();
    statusEl.textContent = solved()
      ? 'Bravo, puzzle resolu.'
      : 'Continuez: cliquez une case voisine du vide.';
  };

  const shuffle = () => {
    state = [1, 2, 3, 4, 5, 6, 7, 8, 0];
    for (let i = 0; i < 120; i += 1) {
      const empty = state.indexOf(0);
      const n = neighbors(empty);
      const next = n[Math.floor(Math.random() * n.length)];
      [state[empty], state[next]] = [state[next], state[empty]];
    }
    statusEl.textContent = 'Melange effectue. Reorganisez les tuiles.';
    render();
  };

  shuffleBtn.addEventListener('click', shuffle);
  shuffle();
}

function initReflexClick() {
  const startBtn = document.getElementById('reflexStartBtn');
  const targetBtn = document.getElementById('reflexTargetBtn');
  const statusEl = document.getElementById('reflexStatus');
  if (!startBtn || !targetBtn || !statusEl) return;

  let running = false;
  let score = 0;
  let remaining = 10;
  let timer = null;

  const stop = () => {
    running = false;
    clearInterval(timer);
    targetBtn.disabled = true;
    statusEl.textContent = `Temps termine. Score: ${score} clics.`;
  };

  startBtn.addEventListener('click', () => {
    clearInterval(timer);
    running = true;
    score = 0;
    remaining = 10;
    targetBtn.disabled = false;
    statusEl.textContent = `Go: ${remaining}s | Score: ${score}`;

    timer = setInterval(() => {
      remaining -= 1;
      if (remaining <= 0) {
        stop();
        return;
      }
      statusEl.textContent = `Go: ${remaining}s | Score: ${score}`;
    }, 1000);
  });

  targetBtn.addEventListener('click', () => {
    if (!running) return;
    score += 1;
    statusEl.textContent = `Go: ${remaining}s | Score: ${score}`;
  });

  targetBtn.disabled = true;
}
