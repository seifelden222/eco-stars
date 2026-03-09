<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>لعبة تطابق البطاقات - إيكو ستارز</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
  
  <script id="tailwind-config">
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            "primary": "#22c55e",
            "sky-blue": "#7dd3fc",
            "grass-green": "#4ade80",
            "accent-yellow": "#facc15",
          },
          fontFamily: {
            "display": ["Cairo", "sans-serif"]
          }
        },
      },
    }
  </script>

  <style type="text/tailwindcss">
    body {
      font-family: 'Cairo', sans-serif;
      overflow: hidden;
    }
    .game-world {
      background: linear-gradient(to bottom, #7dd3fc 0%, #bae6fd 40%, #4ade80 40%, #22c55e 100%);
      perspective: 1200px;
    }
    .three-d-card {
      transform-style: preserve-3d;
      transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      position: relative;
    }
    .three-d-card.flipped {
      transform: rotateY(180deg) translateY(-4px);
    }
    .card-face {
      backface-visibility: hidden;
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0,0,0,0.18), inset 0 -5px 0 rgba(0,0,0,0.1);
    }
    .card-back {
      background: #ffffff;
      border: 5px solid #22c55e;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card-front {
      background: #ffffff;
      transform: rotateY(180deg);
      border: 5px solid #facc15;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .floating-island {
      transform: rotateX(60deg) rotateZ(-5deg);
      box-shadow: 0 50px 100px rgba(0,0,0,0.3);
    }
    .tree-3d {
      filter: drop-shadow(20px 40px 10px rgba(0,0,0,0.1));
    }
    .meter-3d {
      transform: rotateX(-10deg);
      box-shadow: 0 10px 0 #15803d;
    }
    .matched {
      opacity: 0.85;
      transform: scale(1.04);
    }
  </style>
</head>
<body class="bg-sky-blue font-display h-screen w-screen overflow-hidden">

<div class="game-world relative w-full h-full flex flex-col items-center justify-center">

  <div class="absolute top-20 left-20 tree-3d animate-bounce" style="animation-duration: 4s;">
    <span class="material-symbols-outlined !text-[100px] text-green-700">park</span>
  </div>
  <div class="absolute bottom-40 right-20 tree-3d animate-bounce" style="animation-duration: 5s;">
    <span class="material-symbols-outlined !text-[140px] text-green-600">park</span>
  </div>
  <div class="absolute top-40 right-40 opacity-40">
    <span class="material-symbols-outlined !text-8xl text-white">cloud</span>
  </div>
  <div class="absolute top-10 left-1/4 opacity-60">
    <span class="material-symbols-outlined !text-6xl text-white">cloud</span>
  </div>

  <div class="absolute top-10 left-1/2 -translate-x-1/2 z-50 flex flex-col items-center w-full max-w-5xl px-4">
    <div class="meter-3d bg-white px-6 py-3 rounded-3xl border-b-8 border-slate-200 flex items-center justify-between gap-6 w-full max-w-md">
      <div class="flex flex-col items-start">
        <span class="text-slate-500 font-bold text-xs">المتطابقة</span>
        <div class="flex items-center gap-2">
          <span id="matchesCount" class="text-3xl font-black text-primary">0</span>
          <span class="text-xl text-slate-300">/</span>
          <span class="text-xl font-bold text-slate-400">8</span>
        </div>
      </div>
      
      <div class="flex flex-col items-center">
        <span class="text-slate-500 font-bold text-xs">الحركات</span>
        <span id="movesCount" class="text-3xl font-black text-orange-500">0</span>
      </div>

      <div class="flex flex-col items-center">
        <span class="text-slate-500 font-bold text-xs">الوقت</span>
        <span id="timer" class="text-3xl font-black text-blue-600">00:00</span>
      </div>
    </div>
  </div>

  <div class="absolute top-8 right-8 z-50 flex gap-3">
    <button id="pauseBtn" class="bg-white/90 backdrop-blur-md size-14 rounded-2xl shadow-xl flex items-center justify-center text-slate-700 hover:scale-110 transition-transform">
      <span class="material-symbols-outlined !text-2xl">pause</span>
    </button>
    <button id="exitBtn" class="bg-white/90 backdrop-blur-md px-5 py-3 rounded-2xl shadow-xl flex items-center gap-2 text-slate-700 hover:scale-105 transition-transform font-black text-sm">
      <span class="material-symbols-outlined">arrow_forward</span>
      <span>خروج</span>
    </button>
  </div>

  <div id="gameBoard" class="relative z-10 grid grid-cols-5 sm:grid-cols-6 md:grid-cols-8 gap-3 sm:gap-4 md:gap-5 p-4 sm:p-6 md:p-8 mt-24 md:mt-28">
  </div>

  <div id="gameMessage" class="absolute inset-0 bg-black/60 backdrop-blur-sm hidden flex items-center justify-center z-50">
    <div class="bg-white/95 rounded-3xl p-8 md:p-12 text-center max-w-md shadow-2xl border-4 border-primary">
      <div id="messageIcon" class="material-symbols-outlined text-8xl mb-5"></div>
      <h2 id="messageTitle" class="text-3xl font-black mb-3 text-slate-800"></h2>
      <p id="messageText" class="text-lg text-slate-600 mb-6"></p>
      <div class="flex gap-4 justify-center">
        <button id="playAgainBtn" class="bg-primary hover:bg-green-600 text-white text-xl font-bold px-10 py-4 rounded-2xl shadow-lg transition-transform hover:scale-105">
          العب مرة أخرى
        </button>
        <a href="{{ route('games') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xl font-bold px-10 py-4 rounded-2xl shadow-lg transition-transform hover:scale-105">
          العاب أخرى
        </a>
      </div>
    </div>
  </div>

  <div class="absolute bottom-[-10%] w-[120%] h-1/2 bg-black/5 blur-3xl floating-island rounded-[100%] pointer-events-none"></div>

  <div class="absolute bottom-8 z-40 pointer-events-none">
    <div class="bg-black/20 backdrop-blur-sm px-8 py-3 rounded-full border border-white/20">
      <p id="instructionText" class="text-white font-bold text-base">اضغط على بطاقتين لتجربة مطابقتهما 🐾</p>
    </div>
  </div>

</div>

<script>
const gamesPageUrl = "{{ route('games') }}";

const animals = [
  { emoji: "🦁", color: "text-orange-600",     name: "أسد"     },
  { emoji: "🐰", color: "text-pink-500",       name: "أرنب"    },
  { emoji: "🐱", color: "text-purple-600",     name: "قطة"     },
  { emoji: "🐧", color: "text-cyan-600",       name: "بطريق"   },
  { emoji: "🐝", color: "text-yellow-600",     name: "نحلة"    },
  { emoji: "🐼", color: "text-amber-800",      name: "باندا"   },
  { emoji: "🐘", color: "text-gray-700",       name: "فيل"     },
  { emoji: "🐯", color: "text-teal-700",       name: "نمر"     },
];

const cardsData = [...animals, ...animals].sort(() => Math.random() - 0.5);

let flippedCards = [];
let matchedPairs = 0;
let moves = 0;
let timerInterval;
let seconds = 0;
let isPaused = false;
let gameEnded = false;

const board = document.getElementById("gameBoard");
const matchesEl = document.getElementById("matchesCount");
const movesEl = document.getElementById("movesCount");
const timerEl = document.getElementById("timer");
const messageBox = document.getElementById("gameMessage");
const messageIcon = document.getElementById("messageIcon");
const messageTitle = document.getElementById("messageTitle");
const messageText = document.getElementById("messageText");
const instructionText = document.getElementById("instructionText");

function startTimer() {
  if (timerInterval) clearInterval(timerInterval);
  timerInterval = setInterval(() => {
    if (!isPaused && !gameEnded) {
      seconds++;
      const mins = Math.floor(seconds / 60).toString().padStart(2, '0');
      const secs = (seconds % 60).toString().padStart(2, '0');
      timerEl.textContent = `${mins}:${secs}`;
    }
  }, 1000);
}

function createCard(item, index) {
  const card = document.createElement("div");
  card.className = "w-24 sm:w-28 md:w-32 h-36 sm:h-40 md:h-44 relative three-d-card";
  card.dataset.animal = item.name;
  card.dataset.index = index;

  card.innerHTML = `
    <div class="card-face card-back">
      <span class="material-symbols-outlined !text-5xl text-primary/30">stars</span>
    </div>
    <div class="card-face card-front">
      <div class="flex flex-col items-center">
        <span class="text-6xl sm:text-7xl ${item.color}">${item.emoji}</span>
        <span class="mt-1 font-black text-base sm:text-lg text-slate-700">${item.name}</span>
      </div>
    </div>
  `;

  card.addEventListener("click", () => flipCard(card));
  return card;
}

function initGame() {
  board.innerHTML = "";
  matchedPairs = 0;
  moves = 0;
  seconds = 0;
  flippedCards = [];
  gameEnded = false;
  isPaused = false;

  matchesEl.textContent = "0";
  movesEl.textContent = "0";
  timerEl.textContent = "00:00";
  instructionText.textContent = "اضغط على بطاقتين لتجربة مطابقتهما 🐾";

  cardsData.forEach((item, i) => {
    board.appendChild(createCard(item, i));
  });

  startTimer();
}

function flipCard(card) {
  if (gameEnded || isPaused || card.classList.contains("flipped") || card.classList.contains("matched") || flippedCards.length >= 2) {
    return;
  }

  card.classList.add("flipped");
  flippedCards.push(card);

  if (flippedCards.length === 2) {
    moves++;
    movesEl.textContent = moves;
    checkMatch();
  }
}

function checkMatch() {
  const [card1, card2] = flippedCards;
  const match = card1.dataset.animal === card2.dataset.animal;

  setTimeout(() => {
    if (match) {
      card1.classList.add("matched");
      card2.classList.add("matched");
      matchedPairs++;
      matchesEl.textContent = matchedPairs;

      if (matchedPairs === 8) {
        endGame(true);
      }
    } else {
      card1.classList.remove("flipped");
      card2.classList.remove("flipped");
    }
    flippedCards = [];
  }, 800);
}

function endGame(won) {
  gameEnded = true;
  clearInterval(timerInterval);

  messageBox.classList.remove("hidden");

  if (won) {
    messageIcon.textContent = "emoji_events";
    messageIcon.className = "material-symbols-outlined text-yellow-500 !text-8xl mb-5";
    messageTitle.textContent = "مبروك! 🎉";
    messageText.innerHTML = `أكملت اللعبة<br>في <strong>${moves}</strong> حركة وبوقت <strong>${timerEl.textContent}</strong>`;
  }
}

document.getElementById("playAgainBtn").addEventListener("click", () => {
  messageBox.classList.add("hidden");
  initGame();
});

document.getElementById("pauseBtn").addEventListener("click", () => {
  isPaused = !isPaused;
  const icon = document.querySelector("#pauseBtn span");
  icon.textContent = isPaused ? "play_arrow" : "pause";
  instructionText.textContent = isPaused ? "اللعبة متوقفة... اضغط ▶ للاستمرار" : "اضغط على بطاقتين لتجربة مطابقتهما 🐾";
});

document.getElementById("exitBtn").addEventListener("click", () => {
  if (confirm("هل تريد الخروج من اللعبة؟")) {
    window.location.href = gamesPageUrl;
  }
});

initGame();
</script>

</body>
</html>
