<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Eco Stars - لعبة البازل</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Cairo', sans-serif;
  min-height: 100vh;
  background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
  color: #1b5e20;
  text-align: center;
  overflow-x: hidden;
}

/* ===== Header ===== */
header {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 14px;
  padding: 20px 15px;
  background: rgba(255,255,255,0.82);
  backdrop-filter: blur(12px);
  border-bottom: 3px solid #81c784;
  box-shadow: 0 6px 25px rgba(0,0,0,0.12);
  position: sticky;
  top: 0;
  z-index: 10;
}

header img {
  width: 52px;
  filter: drop-shadow(0 4px 8px rgba(76,175,80,0.4));
}

header h1 {
  margin: 0;
  color: #2e7d32;
  font-size: 2.1rem;
  font-weight: 900;
  text-shadow: 0 2px 8px rgba(46,125,50,0.25);
}

/* ===== Text ===== */
p {
  margin: 30px 0 40px;
  font-size: 1.45rem;
  font-weight: 600;
  color: #2e7d32;
}

/* ===== Game ===== */
.game {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 60px;
  margin: 0 auto;
  max-width: 1000px;
  padding: 0 20px;
  perspective: 1400px;
}

/* Board & Pieces */
.board, .pieces {
  display: grid;
  grid-template-columns: repeat(3, 170px);
  gap: 12px;
  transform-style: preserve-3d;
}

/* Empty slots */
.slot {
  width: 170px;
  height: 170px;
  border: 3px dashed #81c784;
  background: linear-gradient(145deg, #f1f8e9, #e8f5e9);
  border-radius: 16px;
  box-shadow: 
    8px 8px 16px rgba(0,0,0,0.12),
    -8px -8px 16px rgba(255,255,255,0.8);
  transition: all 0.4s ease;
  transform: translateZ(10px);
}

.slot:hover {
  transform: translateZ(30px) scale(1.04);
  box-shadow: 
    12px 12px 24px rgba(0,0,0,0.18),
    -12px -12px 24px rgba(255,255,255,0.9);
}

/* Puzzle pieces */
.piece {
  width: 170px;
  height: 170px;
  border: 3px solid #388e3c;
  border-radius: 16px;
  cursor: grab;
  background-image: url("puzzle.jpg");
  background-size: 510px 340px; /* 170×3 , 170×2 */
  box-shadow: 
    6px 6px 14px rgba(0,0,0,0.18),
    -6px -6px 14px rgba(255,255,255,0.7);
  transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  transform-style: preserve-3d;
}

.piece:active {
  cursor: grabbing;
  transform: translateY(-12px) rotateX(15deg) rotateY(15deg) scale(1.08) translateZ(40px);
  box-shadow: 
    14px 14px 30px rgba(0,0,0,0.25),
    -14px -14px 30px rgba(255,255,255,1);
}

/* Correct image slicing */
.p1 { background-position:    0px    0px; }
.p2 { background-position: -170px    0px; }
.p3 { background-position: -340px    0px; }

.p4 { background-position:    0px -170px; }
.p5 { background-position: -170px -170px; }
.p6 { background-position: -340px -170px; }

/* Success message */
.success {
  display: none;
  margin: 40px auto;
  font-size: 2rem;
  font-weight: 900;
  color: #2e7d32;
  background: rgba(255,255,255,0.8);
  backdrop-filter: blur(10px);
  padding: 20px 40px;
  border-radius: 30px;
  box-shadow: 0 10px 35px rgba(46,125,50,0.3);
  max-width: 90%;
  border: 3px solid #66bb6a;
}

.back-btn {
  display: inline-block;
  margin: 20px auto;
  padding: 12px 32px;
  background: #ef4444;
  color: white;
  border: none;
  border-radius: 14px;
  font-family: 'Cairo', sans-serif;
  font-size: 1.1rem;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  transition: background 0.2s;
}

.back-btn:hover {
  background: #dc2626;
}
</style>
</head>

<body>

<header>
  <img src="logo.jpg" alt="Eco Stars Logo">
  <h1>Eco Stars</h1>
</header>

<p>🧩 ركّب صورة البيئة</p>

<div class="game">

  <!-- Puzzle Board -->
  <div class="board">
    <div class="slot" data-id="1"></div>
    <div class="slot" data-id="2"></div>
    <div class="slot" data-id="3"></div>
    <div class="slot" data-id="4"></div>
    <div class="slot" data-id="5"></div>
    <div class="slot" data-id="6"></div>
  </div>

  <!-- Puzzle Pieces -->
  <div class="pieces">
    <div class="piece p3" draggable="true" data-id="3"></div>
    <div class="piece p1" draggable="true" data-id="1"></div>
    <div class="piece p6" draggable="true" data-id="6"></div>
    <div class="piece p2" draggable="true" data-id="2"></div>
    <div class="piece p5" draggable="true" data-id="5"></div>
    <div class="piece p4" draggable="true" data-id="4"></div>
  </div>

</div>

<div class="success">🌱 أحسنت! كده بنحافظ على البيئة</div>

<a href="{{ route('games') }}" class="back-btn">🚪 خروج للألعاب</a>

<script>
let draggedPiece = null;

document.querySelectorAll(".piece").forEach(piece => {
  piece.addEventListener("dragstart", () => {
    draggedPiece = piece;
  });
});

document.querySelectorAll(".slot").forEach(slot => {
  slot.addEventListener("dragover", e => e.preventDefault());

  slot.addEventListener("drop", () => {
    if (!slot.hasChildNodes()) {
      slot.appendChild(draggedPiece);
    }
    checkWin();
  });
});

function checkWin() {
  let correct = 0;

  document.querySelectorAll(".slot").forEach(slot => {
    const piece = slot.firstElementChild;
    if (piece && piece.dataset.id === slot.dataset.id) {
      correct++;
    }
  });

  if (correct === 6) {
    document.querySelector(".success").style.display = "block";
  } else {
    document.querySelector(".success").style.display = "none";
  }
}
</script>

</body>
</html>