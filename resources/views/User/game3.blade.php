<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>لعبة صياد النجوم - إيكو ستارز</title>
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
            "space-dark": "#020617",
            "star-gold": "#facc15",
          },
          fontFamily: {
            "display": ["Cairo", "sans-serif"]
          },
        },
      },
    }
  </script>

  <style type="text/tailwindcss">
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #020617;
      overflow: hidden;
      margin: 0;
      touch-action: none;
    }
    .galaxy-bg {
      background: 
        radial-gradient(circle at 20% 30%, rgba(79, 70, 229, 0.2) 0%, transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(147, 51, 234, 0.2) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
        #020617;
    }
    .nebula {
      filter: blur(80px);
      opacity: 0.4;
      pointer-events: none;
    }
    .star-item {
      filter: drop-shadow(0 0 15px rgba(250, 204, 21, 0.6));
      transition: transform 0.15s ease-out;
    }
    .glass-ui {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    }
    .planet {
      box-shadow: inset -20px -20px 50px rgba(0,0,0,0.5);
    }
    .energy-fill {
      box-shadow: 0 0 15px rgba(34, 197, 94, 0.8);
      transition: width 0.4s ease;
    }
    #gameOverScreen {
      background: rgba(2,6,23,0.92);
      backdrop-filter: blur(8px);
    }
  </style>
</head>
<body class="galaxy-bg h-screen w-screen relative overflow-hidden select-none">

<div class="absolute inset-0 z-0">
  <div class="absolute top-[-10%] left-[-10%] w-[60%] h-[60%] bg-purple-600/30 rounded-full nebula"></div>
  <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-indigo-600/30 rounded-full nebula"></div>
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[40%] h-[40%] bg-emerald-600/20 rounded-full nebula"></div>
  <div class="absolute inset-0" style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 100px 100px; opacity: 0.1;"></div>
</div>

<div class="absolute top-20 right-[15%] w-32 h-32 rounded-full bg-gradient-to-tr from-blue-900 to-blue-400 planet opacity-80 rotate-12"></div>
<div class="absolute bottom-40 left-[10%] w-48 h-48 rounded-full bg-gradient-to-br from-red-900 via-orange-600 to-yellow-500 planet opacity-70 -rotate-12"></div>
<div class="absolute top-[60%] left-[20%] w-12 h-12 rounded-full bg-gradient-to-tr from-purple-800 to-pink-500 planet opacity-60"></div>

<div class="absolute inset-0 z-10" id="starsContainer"></div>

<div class="absolute inset-0 flex items-center justify-center z-20 pointer-events-none astronaut-container">
  <div id="astronaut" class="relative w-80 h-96 flex flex-col items-center justify-center floating">
    <div class="relative w-48 h-64 bg-slate-100 rounded-[4rem] shadow-2xl border-b-[12px] border-slate-300">
      <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-32 h-32 bg-slate-800 rounded-3xl border-4 border-slate-400 overflow-hidden">
        <div class="absolute top-2 left-2 w-20 h-8 bg-white/20 rounded-full blur-sm"></div>
      </div>
      <div class="absolute bottom-12 left-1/2 -translate-x-1/2 bg-primary/20 p-2 rounded-full border border-primary/40">
        <span class="material-symbols-outlined text-primary !text-2xl">rocket_launch</span>
      </div>
    </div>
    <div class="absolute -z-10 w-60 h-48 bg-slate-200 rounded-3xl top-20 border-b-[8px] border-slate-400"></div>
    <div class="absolute -right-12 top-24 w-12 h-32 bg-slate-100 rounded-full rotate-12 border-b-4 border-slate-300"></div>
    <div class="absolute -left-12 top-24 w-12 h-32 bg-slate-100 rounded-full -rotate-12 border-b-4 border-slate-300"></div>
    <div class="absolute -bottom-10 flex gap-12">
      <div class="w-8 h-20 bg-gradient-to-b from-blue-400 to-transparent blur-md opacity-60"></div>
      <div class="w-8 h-20 bg-gradient-to-b from-blue-400 to-transparent blur-md opacity-60"></div>
    </div>
  </div>
</div>

<div class="absolute inset-0 z-50 pointer-events-none p-10 flex flex-col justify-between">
  <div class="flex items-start justify-between w-full pointer-events-auto">
    <div class="glass-ui rounded-3xl p-4 flex flex-col gap-2 w-72">
      <div class="flex items-center justify-between px-2">
        <span class="text-white font-black text-sm">الطاقة المتبقية</span>
        <span class="material-symbols-outlined text-emerald-400">bolt</span>
      </div>
      <div class="w-full h-4 bg-white/10 rounded-full overflow-hidden border border-white/10">
        <div id="energyBar" class="h-full bg-primary energy-fill w-[100%] rounded-full"></div>
      </div>
    </div>

    <div class="glass-ui rounded-3xl px-6 py-4 flex items-center gap-4">
      <div class="flex flex-col items-end">
        <span class="text-slate-300 text-xs font-bold">النجوم المجمعة</span>
        <span id="starsCount" class="text-3xl font-black text-star-gold tracking-widest">٠ / ٣٠</span>
      </div>
      <div class="size-14 bg-star-gold/20 rounded-2xl flex items-center justify-center border border-star-gold/40 shadow-[0_0_20px_rgba(250,204,21,0.3)]">
        <span class="material-symbols-outlined text-star-gold !text-4xl fill-current">stars</span>
      </div>
    </div>
  </div>

  <div class="flex items-end justify-between w-full pointer-events-auto">
    <div class="flex items-center gap-4">
      <button id="pauseBtn" class="glass-ui size-16 rounded-full flex items-center justify-center hover:bg-white/20 transition-all text-white">
        <span class="material-symbols-outlined !text-4xl">pause</span>
      </button>
      <button class="glass-ui size-16 rounded-full flex items-center justify-center hover:bg-white/20 transition-all text-white">
        <span class="material-symbols-outlined !text-4xl">settings</span>
      </button>
    </div>

    <div id="instruction" class="bg-black/20 backdrop-blur-sm px-8 py-3 rounded-full border border-white/5">
      <p class="text-white/80 font-bold text-lg">استخدم الأسهم أو WASD للتحرك وجمع النجوم المبتسمة 🚀</p>
    </div>

    <button id="exitBtn" class="bg-red-500/80 hover:bg-red-500 text-white backdrop-blur-md px-8 py-4 rounded-2xl font-black flex items-center gap-2 transition-all shadow-lg shadow-red-500/20">
      <span class="material-symbols-outlined">exit_to_app</span>
      <span>خروج</span>
    </button>
  </div>
</div>

<div id="gameOverScreen" class="absolute inset-0 z-60 hidden flex items-center justify-center">
  <div class="glass-ui rounded-3xl p-16 text-center max-w-lg border-2 border-primary shadow-2xl shadow-primary/30">
    <span id="resultIcon" class="material-symbols-outlined text-9xl mb-8 block"></span>
    <h2 id="resultTitle" class="text-5xl font-black mb-6 text-white">مبروك!</h2>
    <p id="resultText" class="text-2xl text-slate-200 mb-10">جمعت <span id="finalStars">0</span> نجمة</p>
    <div class="flex gap-4 justify-center">
      <button id="playAgainBtn" class="bg-primary hover:bg-green-600 text-white text-2xl font-bold px-12 py-5 rounded-2xl shadow-lg transition-all hover:scale-105">
        العب مرة أخرى
      </button>
      <a href="{{ route('games') }}" class="glass-ui text-white text-2xl font-bold px-12 py-5 rounded-2xl shadow-lg transition-all hover:scale-105 hover:bg-white/20">
        العاب أخرى
      </a>
    </div>
  </div>
</div>

<script>
const gamesPageUrl = "{{ route('games') }}";

const astronaut = document.getElementById('astronaut');
const starsContainer = document.getElementById('starsContainer');
const starsCountEl = document.getElementById('starsCount');
const energyBar = document.getElementById('energyBar');
const gameOverScreen = document.getElementById('gameOverScreen');
const resultIcon = document.getElementById('resultIcon');
const resultTitle = document.getElementById('resultTitle');
const finalStars = document.getElementById('finalStars');
const playAgainBtn = document.getElementById('playAgainBtn');
const pauseBtn = document.getElementById('pauseBtn');
const exitBtn = document.getElementById('exitBtn');

let astronautX = window.innerWidth / 2 - 40;
let astronautY = window.innerHeight / 2 - 80;
let velocityX = 0;
let velocityY = 0;
const speed = 7;
const friction = 0.96;
let collected = 0;
let energy = 100;
let gameActive = true;
let paused = false;

const stars = [];
const totalStars = 30;

function createStar() {
  const star = document.createElement('div');
  star.className = 'absolute flex flex-col items-center star-item pointer-events-none';
  star.innerHTML = `
    <span class="material-symbols-outlined !text-5xl text-star-gold fill-current animate-pulse">star</span>
    <div class="w-1.5 h-1.5 bg-white/60 rounded-full mt-1"></div>
  `;
  
  const angle = Math.random() * Math.PI * 2;
  const minDistance = 120;
  const maxDistance = Math.min(window.innerWidth, window.innerHeight) * 0.42;
  const distance = minDistance + Math.random() * (maxDistance - minDistance);
  
  const x = window.innerWidth / 2 + Math.cos(angle) * distance;
  const y = window.innerHeight / 2 + Math.sin(angle) * distance;
  
  star.style.left = `${x}px`;
  star.style.top  = `${y}px`;
  
  starsContainer.appendChild(star);
  stars.push(star);
}

function initGame() {
  starsContainer.innerHTML = '';
  stars.length = 0;
  collected = 0;
  energy = 100;
  energyBar.style.width = '100%';
  starsCountEl.textContent = `٠ / ${totalStars}`;
  gameActive = true;
  paused = false;
  gameOverScreen.classList.add('hidden');

  for(let i = 0; i < totalStars; i++) {
    createStar();
  }

  astronautX = window.innerWidth / 2 - 40;
  astronautY = window.innerHeight / 2 - 80;
  velocityX = 0;
  velocityY = 0;
  updateAstronautPosition();
}

function updateAstronautPosition() {
  astronaut.style.transform = `translate(${astronautX}px, ${astronautY}px)`;
}

function checkCollision(star) {
  const rectA = astronaut.getBoundingClientRect();
  const rectB = star.getBoundingClientRect();
  const padding = 40;
  
  return !(
    rectA.right + padding < rectB.left ||
    rectA.left - padding > rectB.right ||
    rectA.bottom + padding < rectB.top ||
    rectA.top - padding > rectB.bottom
  );
}

function gameLoop() {
  if (!gameActive || paused) return;

  velocityX *= friction;
  velocityY *= friction;

  astronautX += velocityX;
  astronautY += velocityY;

  const margin = 40;
  if (astronautX < -margin) astronautX = -margin;
  if (astronautX > window.innerWidth - 80 + margin) astronautX = window.innerWidth - 80 + margin;
  if (astronautY < -margin) astronautY = -margin;
  if (astronautY > window.innerHeight - 100 + margin) astronautY = window.innerHeight - 100 + margin;

  updateAstronautPosition();

  energy -= 0.018;
  if (energy < 0) energy = 0;
  energyBar.style.width = energy + '%';

  if (energy <= 0) {
    gameActive = false;
    showGameOver(false);
  }

  for (let i = stars.length - 1; i >= 0; i--) {
    if (checkCollision(stars[i])) {
      stars[i].remove();
      stars.splice(i, 1);
      collected++;
      starsCountEl.textContent = `${collected} / ${totalStars}`;

      if (collected >= totalStars) {
        gameActive = false;
        showGameOver(true);
      }
    }
  }

  requestAnimationFrame(gameLoop);
}

function showGameOver(won) {
  gameOverScreen.classList.remove('hidden');
  if (won) {
    resultIcon.textContent = 'military_tech';
    resultIcon.className = 'material-symbols-outlined text-star-gold text-9xl mb-8 block';
    resultTitle.textContent = 'انتصار كبير! 🌟';
    finalStars.textContent = collected;
  } else {
    resultIcon.textContent = 'sentiment_dissatisfied';
    resultIcon.className = 'material-symbols-outlined text-red-400 text-9xl mb-8 block';
    resultTitle.textContent = 'انتهت الطاقة...';
    finalStars.textContent = collected;
  }
}

window.addEventListener('keydown', e => {
  if (!gameActive || paused) return;

  switch(e.key.toLowerCase()) {
    case 'arrowup': case 'w': velocityY = -speed; break;
    case 'arrowdown': case 's': velocityY = speed; break;
    case 'arrowleft': case 'a': velocityX = -speed; break;
    case 'arrowright': case 'd': velocityX = speed; break;
  }
});

pauseBtn.addEventListener('click', () => {
  paused = !paused;
  pauseBtn.querySelector('span').textContent = paused ? 'play_arrow' : 'pause';
  if (!paused) requestAnimationFrame(gameLoop);
});

exitBtn.addEventListener('click', () => {
  if (confirm('هل تريد الخروج من اللعبة؟')) {
    window.location.href = gamesPageUrl;
  }
});

playAgainBtn.addEventListener('click', initGame);

initGame();
requestAnimationFrame(gameLoop);
</script>

<!-- hidden progress form: submit collected stars as points on game over -->
<form id="progressForm" method="POST" action="{{ route('progress.store') }}" style="display:none">
  @csrf
  <input type="hidden" name="points" id="progressPoints" value="0">
  <input type="hidden" name="reason" value="game3">
  <input type="hidden" name="type" value="earn">
</form>

<script>
// submit when game over shows (use collected variable)
const _origShowGameOver = showGameOver;
function submitGame3Points(won) {
  try {
    const pts = Math.max(0, collected * 5);
    const pointsInput = document.getElementById('progressPoints');
    const form = document.getElementById('progressForm');
    if (pointsInput && form) {
      pointsInput.value = pts;
      form.submit();
    }
  } catch (e) { console.error(e); }
}

showGameOver = function(won) {
  _origShowGameOver(won);
  submitGame3Points(won);
}
</script>

</body>
</html>
