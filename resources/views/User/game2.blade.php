<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>لعبة الأسئلة السريعة - إيكو ستارز</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
  
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#22c55e",
            "sci-fi-blue": "#0ea5e9",
            "sci-fi-purple": "#8b5cf6",
            "lab-dark": "#020617",
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
    @layer utilities {
      .hologram-glow {
        text-shadow: 0 0 10px rgba(14, 165, 233, 0.8), 0 0 20px rgba(14, 165, 233, 0.4);
      }
      .glass-panel {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(14, 165, 233, 0.3);
        box-shadow: 0 0 30px rgba(14, 165, 233, 0.1);
      }
      .three-d-float {
        transform-style: preserve-3d;
        perspective: 1000px;
      }
      .floating-pod {
        transition: all 0.3s ease;
        transform: translateZ(20px);
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.2), rgba(139, 92, 246, 0.2));
        border: 2px solid rgba(14, 165, 233, 0.4);
      }
      .floating-pod:hover {
        transform: translateZ(40px) translateY(-8px);
        border-color: #22c55e;
        box-shadow: 0 0 25px rgba(34, 197, 94, 0.5);
      }
      .lab-grid {
        background-image: linear-gradient(rgba(14, 165, 233, 0.1) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(14, 165, 233, 0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        perspective: 800px;
        transform: rotateX(60deg);
      }
      .rocket-track-gradient {
        background: linear-gradient(to top, #ef4444, #f59e0b, #22c55e);
      }
      .scanline {
        background: linear-gradient(to bottom, transparent 50%, rgba(14, 165, 233, 0.05) 50%);
        background-size: 100% 4px;
      }
      .correct {
        border-color: #22c55e !important;
        box-shadow: 0 0 25px rgba(34,197,94,0.6) !important;
      }
      .wrong {
        border-color: #ef4444 !important;
        box-shadow: 0 0 25px rgba(239,68,68,0.6) !important;
      }
    }
  </style>
</head>
<body class="bg-lab-dark text-white font-display overflow-hidden h-screen w-screen flex flex-col items-center justify-center relative">

<div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
  <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent via-blue-900/10 to-lab-dark"></div>
  <div class="absolute bottom-[-20%] left-[-50%] w-[200%] h-full lab-grid opacity-30"></div>
  <div class="absolute top-0 left-10 w-1 h-[80vh] bg-sci-fi-blue shadow-[0_0_15px_rgba(14,165,233,1)] opacity-40"></div>
  <div class="absolute top-0 right-10 w-1 h-[80vh] bg-sci-fi-purple shadow-[0_0_15px_rgba(139,92,246,1)] opacity-40"></div>
  <div class="absolute inset-0">
    <div class="absolute top-1/4 left-1/4 size-2 bg-white rounded-full blur-[1px] opacity-20"></div>
    <div class="absolute top-1/2 right-1/3 size-1 bg-sci-fi-blue rounded-full blur-[1px] opacity-40"></div>
    <div class="absolute bottom-1/4 left-1/2 size-3 bg-sci-fi-purple rounded-full blur-[2px] opacity-10"></div>
  </div>
</div>

<div id="uiScore" class="absolute top-6 left-10 z-20 flex items-center gap-4">
  <div class="glass-panel px-6 py-3 rounded-2xl flex items-center gap-3">
    <span class="material-symbols-outlined text-accent-yellow fill-current">stars</span>
    <span id="scoreDisplay" class="text-xl font-black text-white">٠</span>
  </div>
  <button id="closeBtn" class="glass-panel size-12 rounded-2xl flex items-center justify-center hover:bg-white/10 transition-colors">
    <span class="material-symbols-outlined">close</span>
  </button>
</div>

<div class="absolute top-6 right-10 z-20">
  <div class="glass-panel px-8 py-3 rounded-2xl">
    <span class="text-slate-400 font-bold ml-3 text-sm">المستوى</span>
    <span id="levelDisplay" class="text-2xl font-black text-primary">١</span>
  </div>
</div>

<div class="absolute left-10 top-1/2 -translate-y-1/2 z-20 h-[60vh] flex flex-col items-center gap-4">
  <div class="text-xs font-bold text-slate-400 vertical-text rotate-180" style="writing-mode: vertical-rl;">تقدم الإطلاق</div>
  <div class="w-8 h-full bg-slate-900/80 rounded-full border border-white/10 p-1 relative overflow-hidden flex flex-col justify-end">
    <div id="progressBar" class="w-full h-0 rocket-track-gradient rounded-full shadow-[0_0_15px_rgba(34,197,94,0.4)] transition-all duration-500"></div>
    <div class="absolute left-1/2 -translate-x-1/2 bottom-0 mb-2">
      <span class="material-symbols-outlined text-white !text-2xl animate-pulse">rocket_launch</span>
    </div>
  </div>
</div>

<main class="relative z-10 w-full max-w-5xl flex flex-col items-center gap-16 px-6">

  <div class="w-full relative three-d-float">
    <div class="absolute -inset-1 bg-gradient-to-r from-sci-fi-blue to-sci-fi-purple rounded-[3rem] blur-xl opacity-20"></div>
    <div class="glass-panel rounded-[3.5rem] p-12 text-center relative overflow-hidden">
      <div class="absolute inset-0 scanline opacity-30 pointer-events-none"></div>
      <div class="mb-4">
        <span class="px-4 py-1 bg-sci-fi-blue/20 text-sci-fi-blue rounded-full text-xs font-bold tracking-widest uppercase">سؤال <span id="questionNumber">1</span> من <span id="totalQuestions">10</span></span>
      </div>
      <h2 id="questionText" class="text-5xl md:text-6xl font-black text-white leading-tight hologram-glow">
        ما هو ناتج ضرب ٧ في ٩؟
      </h2>
      <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4/5 h-1 bg-sci-fi-blue shadow-[0_0_30px_rgba(14,165,233,1)]"></div>
    </div>
    <div class="absolute -top-10 -right-10 glass-panel size-20 rounded-3xl flex items-center justify-center rotate-12">
      <span class="material-symbols-outlined text-sci-fi-blue !text-4xl">calculate</span>
    </div>
    <div class="absolute -bottom-6 -left-8 glass-panel size-16 rounded-3xl flex items-center justify-center -rotate-12">
      <span class="material-symbols-outlined text-sci-fi-purple !text-3xl">lightbulb</span>
    </div>
  </div>

  <div id="optionsGrid" class="grid grid-cols-2 md:grid-cols-4 gap-8 w-full perspective-distant">
    <!-- Options generated by JS -->
  </div>

</main>

<footer class="absolute bottom-10 z-20 w-full max-w-4xl px-10 flex items-center justify-between">
  <div class="flex items-center gap-4">
    <button id="hintBtn" class="glass-panel px-6 py-3 rounded-2xl flex items-center gap-2 hover:bg-white/10 transition-colors">
      <span class="material-symbols-outlined text-accent-yellow">auto_fix_high</span>
      <span class="font-bold">تلميح (<span id="hintsLeft">٢</span>)</span>
    </button>
  </div>
  <div class="flex items-center gap-3">
    <div class="text-right">
      <p class="text-xs font-bold text-slate-400">الوقت المتبقي</p>
      <p id="timeLeft" class="text-2xl font-black text-white tracking-widest">٠٠:٣٠</p>
    </div>
    <div class="size-14 rounded-full border-4 border-slate-800 border-t-primary flex items-center justify-center">
      <span class="material-symbols-outlined text-white">timer</span>
    </div>
  </div>
</footer>

<div id="gameOverScreen" class="fixed inset-0 bg-black/80 backdrop-blur-md hidden flex items-center justify-center z-50">
  <div class="glass-panel rounded-3xl p-12 text-center max-w-lg border-2 border-primary">
    <span id="resultIcon" class="material-symbols-outlined text-9xl mb-6 block"></span>
    <h2 id="resultTitle" class="text-5xl font-black mb-6 hologram-glow"></h2>
    <p id="resultScore" class="text-2xl mb-8"></p>
    <div class="flex gap-4 justify-center">
      <button id="restartBtn" class="bg-primary hover:bg-green-700 text-white text-2xl font-bold px-12 py-5 rounded-2xl shadow-lg transition-all hover:scale-105">
        العب مرة أخرى
      </button>
      <a href="{{ route('games') }}" class="glass-panel text-white text-2xl font-bold px-12 py-5 rounded-2xl shadow-lg transition-all hover:scale-105 hover:bg-white/10">
        العاب أخرى
      </a>
    </div>
  </div>
</div>

<div class="fixed top-1/4 right-20 pointer-events-none opacity-20">
  <div class="animate-pulse">
    <svg fill="none" height="100" viewBox="0 0 100 100" width="100" xmlns="http://www.w3.org/2000/svg">
      <circle cx="50" cy="50" r="48" stroke="#0ea5e9" stroke-dasharray="10 10" stroke-width="2"></circle>
      <circle cx="50" cy="50" fill="#0ea5e9" fill-opacity="0.2" r="30"></circle>
    </svg>
  </div>
</div>

<script>
const gamesPageUrl = "{{ route('games') }}";

const questionsPool = [
  { q: "ما هو ناتج ضرب ٧ في ٩؟", a: 63, options: [56, 63, 49, 72] },
  { q: "كم يساوي ٨ × ٦؟", a: 48, options: [42, 54, 48, 56] },
  { q: "٥ × ٧ = ؟", a: 35, options: [30, 35, 40, 42] },
  { q: "٩ × ٤ = ؟", a: 36, options: [32, 36, 45, 27] },
  { q: "٦ × ٦ = ؟", a: 36, options: [30, 42, 36, 24] },
  { q: "١٠ × ٨ = ؟", a: 80, options: [70, 90, 80, 100] },
  { q: "٤ × ٩ = ؟", a: 36, options: [36, 45, 32, 40] },
  { q: "٧ × ٥ = ؟", a: 35, options: [30, 35, 40, 42] },
  { q: "٣ × ١١ = ؟", a: 33, options: [30, 33, 36, 39] },
  { q: "١٢ × ٣ = ؟", a: 36, options: [36, 39, 30, 42] },
  { q: "٢ × ١٢ = ؟", a: 24, options: [22, 24, 26, 20] },
  { q: "٨ × ٧ = ؟", a: 56, options: [54, 56, 64, 48] },
  { q: "٩ × ٥ = ؟", a: 45, options: [40, 45, 50, 54] },
  { q: "٦ × ٨ = ؟", a: 48, options: [42, 48, 54, 56] },
  { q: "١١ × ٤ = ؟", a: 44, options: [40, 44, 48, 55] },
];

let currentQuestions = [];
let currentIndex = 0;
let score = 0;
let hintsLeft = 2;
let timeLeft = 30;
let timerInterval;
let totalQuestions = 10;

const questionText = document.getElementById("questionText");
const questionNumber = document.getElementById("questionNumber");
const totalQuestionsEl = document.getElementById("totalQuestions");
const optionsGrid = document.getElementById("optionsGrid");
const scoreDisplay = document.getElementById("scoreDisplay");
const levelDisplay = document.getElementById("levelDisplay");
const progressBar = document.getElementById("progressBar");
const timeLeftEl = document.getElementById("timeLeft");
const hintsLeftEl = document.getElementById("hintsLeft");
const gameOverScreen = document.getElementById("gameOverScreen");
const resultIcon = document.getElementById("resultIcon");
const resultTitle = document.getElementById("resultTitle");
const resultScore = document.getElementById("resultScore");
const restartBtn = document.getElementById("restartBtn");
const hintBtn = document.getElementById("hintBtn");

function shuffle(array) {
  return array.sort(() => Math.random() - 0.5);
}

function startGame() {
  currentQuestions = shuffle([...questionsPool]).slice(0, totalQuestions);
  currentIndex = 0;
  score = 0;
  hintsLeft = 2;
  timeLeft = 30;
  hintsLeftEl.textContent = hintsLeft;
  scoreDisplay.textContent = score;
  levelDisplay.textContent = 1;
  progressBar.style.height = "0%";
  gameOverScreen.classList.add("hidden");
  loadQuestion();
  startTimer();
}

function startTimer() {
  clearInterval(timerInterval);
  timerInterval = setInterval(() => {
    timeLeft--;
    const min = Math.floor(timeLeft / 60).toString().padStart(2, "0");
    const sec = (timeLeft % 60).toString().padStart(2, "0");
    timeLeftEl.textContent = `${min}:${sec}`;
    if (timeLeft <= 0) {
      clearInterval(timerInterval);
      showGameOver(false);
    }
  }, 1000);
}

function loadQuestion() {
  if (currentIndex >= totalQuestions) {
    showGameOver(true);
    return;
  }

  const q = currentQuestions[currentIndex];
  questionText.textContent = q.q;
  questionNumber.textContent = currentIndex + 1;
  totalQuestionsEl.textContent = totalQuestions;

  const opts = shuffle([...q.options]);
  optionsGrid.innerHTML = "";

  opts.forEach(opt => {
    const btn = document.createElement("button");
    btn.className = "three-d-float group";
    btn.innerHTML = `
      <div class="floating-pod h-40 rounded-[2rem] flex flex-col items-center justify-center p-6 gap-2">
        <span class="text-slate-400 font-bold text-sm">${String.fromCharCode(1575 + opts.indexOf(opt))}</span>
        <span class="text-4xl font-black text-white group-hover:text-primary transition-colors">${opt}</span>
      </div>
      <div class="mt-4 h-2 w-2/3 mx-auto bg-blue-500/10 rounded-full blur-md group-hover:bg-primary/20"></div>
    `;
    btn.onclick = () => checkAnswer(opt, q.a, btn);
    optionsGrid.appendChild(btn);
  });

  currentIndex++;
}

function checkAnswer(selected, correct, btnElement) {
  clearInterval(timerInterval);

  const buttons = optionsGrid.querySelectorAll("button");
  buttons.forEach(b => b.disabled = true);

  if (selected === correct) {
    score += 10;
    btnElement.querySelector(".floating-pod").classList.add("correct");
    scoreDisplay.textContent = score;
  } else {
    btnElement.querySelector(".floating-pod").classList.add("wrong");
    buttons.forEach(b => {
      if (parseInt(b.querySelector(".text-4xl").textContent) === correct) {
        b.querySelector(".floating-pod").classList.add("correct");
      }
    });
  }

  progressBar.style.height = `${(currentIndex / totalQuestions) * 100}%`;
  levelDisplay.textContent = Math.min(Math.floor(currentIndex / 3) + 1, 5);

  setTimeout(() => {
    loadQuestion();
    timeLeft = 30;
    startTimer();
  }, 1400);
}

function showGameOver(won) {
  clearInterval(timerInterval);
  gameOverScreen.classList.remove("hidden");

  if (won || score >= 70) {
    resultIcon.textContent = "military_tech";
    resultIcon.className = "material-symbols-outlined text-yellow-400 text-9xl mb-6 block";
    resultTitle.textContent = "ممتاز! 🚀";
    resultScore.textContent = `حصلت على ${score} نقطة`;
  } else {
    resultIcon.textContent = "sentiment_dissatisfied";
    resultIcon.className = "material-symbols-outlined text-red-400 text-9xl mb-6 block";
    resultTitle.textContent = "حاول مرة أخرى!";
    resultScore.textContent = `نقاطك: ${score} من ${totalQuestions * 10}`;
  }
}

hintBtn.onclick = () => {
  if (hintsLeft > 0) {
    hintsLeft--;
    hintsLeftEl.textContent = hintsLeft;
    timeLeft += 15;
    timeLeftEl.textContent = "00:" + timeLeft.toString().padStart(2, "0");
  }
};

restartBtn.onclick = startGame;

document.getElementById("closeBtn").onclick = () => {
  if (confirm("هل تريد إنهاء اللعبة؟")) {
    window.location.href = gamesPageUrl;
  }
};

startGame();
</script>

</body>
</html>
