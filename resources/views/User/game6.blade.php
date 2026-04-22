<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eco Stars - لعبة البازل</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
* { margin:0; padding:0; box-sizing:border-box; }
:root { --green-dark:#1b5e20; --green-mid:#2e7d32; --green-light:#66bb6a; --sz:150px; }

body {
  font-family:'Cairo',sans-serif; min-height:100vh;
  background:linear-gradient(135deg,#e8f5e9,#c8e6c9 50%,#a5d6a7);
  color:var(--green-dark); text-align:center; overflow-x:hidden;
}

header {
  position:sticky; top:0; z-index:20;
  display:flex; justify-content:center; align-items:center; gap:14px;
  padding:16px 20px; background:rgba(255,255,255,0.88);
  backdrop-filter:blur(14px); border-bottom:3px solid #81c784;
  box-shadow:0 6px 25px rgba(0,0,0,0.1);
}
.logo-icon { width:52px; height:52px; filter:drop-shadow(0 4px 8px rgba(76,175,80,0.4)); }
header h1  { color:var(--green-mid); font-size:2rem; font-weight:900; letter-spacing:1px; }

.subtitle { margin:28px 0 10px; font-size:1.3rem; font-weight:700; color:var(--green-mid); }

.progress-wrap  { margin:0 auto 28px; max-width:480px; padding:0 16px; }
.progress-label { font-size:.9rem; font-weight:600; color:var(--green-mid); margin-bottom:6px; }
.progress-bar-bg   { background:rgba(255,255,255,0.6); border-radius:999px; height:12px; overflow:hidden; box-shadow:inset 0 2px 4px rgba(0,0,0,0.1); }
.progress-bar-fill { height:100%; background:linear-gradient(90deg,#66bb6a,#2e7d32); border-radius:999px; transition:width .4s; width:0%; }

.game {
  display:flex; justify-content:center; align-items:flex-start; gap:50px;
  margin:0 auto; max-width:1100px; padding:0 16px; flex-wrap:wrap;
}
.section-label { font-size:1rem; font-weight:700; color:var(--green-mid); margin-bottom:12px; opacity:.85; }

.board {
  display:grid; grid-template-columns:repeat(3,var(--sz)); gap:6px;
  background:rgba(255,255,255,0.5); border-radius:20px; padding:10px;
  box-shadow:0 20px 60px rgba(0,0,0,0.15),0 0 0 3px rgba(102,187,106,0.4);
}
.slot {
  width:var(--sz); height:var(--sz);
  border:2.5px dashed #81c784;
  background:linear-gradient(145deg,#f1f8e9cc,#e8f5e9cc);
  border-radius:12px; transition:all .25s; overflow:hidden;
}
.slot.drag-over { border-color:var(--green-light); background:rgba(102,187,106,0.18); transform:scale(1.04); }
.slot.correct   { border-color:var(--green-light); border-style:solid; box-shadow:0 0 0 3px rgba(102,187,106,0.6) inset; }

.pieces-wrap { display:flex; flex-direction:column; align-items:center; }
.pieces {
  display:grid; grid-template-columns:repeat(3,var(--sz)); gap:6px;
  background:rgba(255,255,255,0.45); border-radius:20px; padding:10px;
  box-shadow:0 12px 40px rgba(0,0,0,0.12),0 0 0 2px rgba(102,187,106,0.3);
  min-height:calc(var(--sz) * 2 + 26px);
}

.piece {
  width:var(--sz); height:var(--sz);
  border:2.5px solid #388e3c; border-radius:12px;
  cursor:grab; background-size:450px 300px;
  box-shadow:5px 5px 12px rgba(0,0,0,0.2),-4px -4px 10px rgba(255,255,255,0.7);
  transition:transform .25s cubic-bezier(0.34,1.56,0.64,1),box-shadow .25s,opacity .2s;
  user-select:none; touch-action:none;
}
.piece:hover   { transform:translateY(-6px) scale(1.06); box-shadow:8px 14px 28px rgba(0,0,0,0.25),-6px -6px 14px rgba(255,255,255,.85); }
.piece.dragging{ opacity:.4; transform:scale(.95); cursor:grabbing; }

.p1{background-position:0px 0px}    .p2{background-position:-150px 0px}   .p3{background-position:-300px 0px}
.p4{background-position:0px -150px} .p5{background-position:-150px -150px} .p6{background-position:-300px -150px}

.success {
  display:none; margin:36px auto; font-size:1.8rem; font-weight:900; color:var(--green-mid);
  background:rgba(255,255,255,0.88); backdrop-filter:blur(12px);
  padding:22px 44px; border-radius:28px;
  box-shadow:0 10px 40px rgba(46,125,50,0.28); max-width:90%;
  border:3px solid var(--green-light);
  animation:popIn .5s cubic-bezier(0.34,1.56,0.64,1);
}
@keyframes popIn{from{transform:scale(.7);opacity:0}to{transform:scale(1);opacity:1}}
.success .stars{font-size:2.2rem;display:block;margin-bottom:6px;animation:bounce 1s infinite alternate}
@keyframes bounce{from{transform:translateY(0)}to{transform:translateY(-8px)}}

.buttons{display:flex;justify-content:center;gap:14px;margin:10px 0 40px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:8px;padding:13px 30px;border:none;border-radius:14px;font-family:'Cairo',sans-serif;font-size:1.05rem;font-weight:700;cursor:pointer;text-decoration:none;transition:transform .15s,box-shadow .15s;box-shadow:0 4px 14px rgba(0,0,0,0.15)}
.btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,0.2)}
.btn-red{background:#ef4444;color:#fff} .btn-red:hover{background:#dc2626}
.btn-green{background:var(--green-mid);color:#fff} .btn-green:hover{background:var(--green-dark)}

.confetti-piece{position:fixed;opacity:0;pointer-events:none;z-index:100;animation:fall linear forwards}
@keyframes fall{0%{transform:translateY(-20px) rotate(0deg);opacity:1}100%{transform:translateY(100vh) rotate(720deg);opacity:0}}
</style>
</head>
<body>

<header>
  <svg class="logo-icon" viewBox="0 0 52 52" fill="none">
    <circle cx="26" cy="26" r="26" fill="#e8f5e9"/>
    <rect x="24" y="34" width="4" height="10" rx="2" fill="#5d4037"/>
    <polygon points="26,8 38,30 14,30" fill="#388e3c"/>
    <polygon points="26,14 40,36 12,36" fill="#2e7d32"/>
    <circle cx="32" cy="19" r="3" fill="#a5d6a7" opacity="0.7"/>
  </svg>
  <h1>Eco Stars 🌿</h1>
</header>

<p class="subtitle">🧩 ركّب صورة البيئة</p>

<div class="progress-wrap">
  <div class="progress-label" id="progressLabel">0 / 6 قطع صحيحة</div>
  <div class="progress-bar-bg"><div class="progress-bar-fill" id="progressFill"></div></div>
</div>

<div class="game">
  <div>
    <p class="section-label">📍 ضع القطع هنا</p>
    <div class="board" id="board">
      <div class="slot" data-id="1"></div>
      <div class="slot" data-id="2"></div>
      <div class="slot" data-id="3"></div>
      <div class="slot" data-id="4"></div>
      <div class="slot" data-id="5"></div>
      <div class="slot" data-id="6"></div>
    </div>
  </div>
  <div class="pieces-wrap">
    <p class="section-label">🖐️ اسحب من هنا</p>
    <div class="pieces" id="tray">
      <div class="piece p3" draggable="true" data-id="3"></div>
      <div class="piece p1" draggable="true" data-id="1"></div>
      <div class="piece p6" draggable="true" data-id="6"></div>
      <div class="piece p2" draggable="true" data-id="2"></div>
      <div class="piece p5" draggable="true" data-id="5"></div>
      <div class="piece p4" draggable="true" data-id="4"></div>
    </div>
  </div>
</div>

<div class="success" id="successMsg">
  <span class="stars">⭐⭐⭐</span>
  🌱 أحسنت! كده بنحافظ على البيئة
</div>

<div class="buttons">
  <button class="btn btn-green" onclick="resetGame()">🔄 إعادة اللعب</button>
  <a href="{{ route('games') }}" class="btn btn-red">🚪 خروج للألعاب</a>
</div>

<form id="progressForm" method="POST" action="{{ route('progress.store') }}" style="display:none">
  @csrf
  <input type="hidden" name="points" id="progressPoints" value="0">
  <input type="hidden" name="reason" value="game6">
  <input type="hidden" name="type" value="earn">
</form>

<canvas id="puzzleCanvas" width="450" height="300" style="display:none"></canvas>

<script>
// ============================================================
//  Draw nature scene on canvas
// ============================================================
function drawNature(canvas) {
  const ctx = canvas.getContext('2d');
  const W = 450, H = 300;

  // Sky
  const sky = ctx.createLinearGradient(0,0,0,H*0.65);
  sky.addColorStop(0,'#1565c0'); sky.addColorStop(0.4,'#42a5f5'); sky.addColorStop(1,'#b3e5fc');
  ctx.fillStyle = sky; ctx.fillRect(0,0,W,H);

  // Sun glow
  const sg = ctx.createRadialGradient(75,60,5,75,60,55);
  sg.addColorStop(0,'#fff9c4'); sg.addColorStop(0.4,'#ffee58'); sg.addColorStop(1,'rgba(255,238,88,0)');
  ctx.fillStyle = sg; ctx.beginPath(); ctx.arc(75,60,55,0,Math.PI*2); ctx.fill();

  // Sun disk
  ctx.fillStyle = '#ffee58';
  ctx.beginPath(); ctx.arc(75,60,26,0,Math.PI*2); ctx.fill();

  // Sun rays
  ctx.strokeStyle='rgba(255,238,88,0.6)'; ctx.lineWidth=2.5;
  for(let a=0;a<Math.PI*2;a+=Math.PI/8){
    ctx.beginPath();
    ctx.moveTo(75+Math.cos(a)*30,60+Math.sin(a)*30);
    ctx.lineTo(75+Math.cos(a)*44,60+Math.sin(a)*44);
    ctx.stroke();
  }

  // Clouds helper
  function cloud(cx,cy,r){
    ctx.fillStyle='rgba(255,255,255,0.93)';
    [[0,0,1],[1.1,-0.5,.8],[2.1,0,.9],[-.8,-0.3,.65],[3,0,.65]].forEach(([dx,dy,s])=>{
      ctx.beginPath(); ctx.arc(cx+dx*r*0.9,cy+dy*r,r*s,0,Math.PI*2); ctx.fill();
    });
  }
  cloud(210,55,22); cloud(340,45,18);

  // Birds
  ctx.strokeStyle='#1a237e'; ctx.lineWidth=1.5;
  [[300,85],[318,74],[336,82]].forEach(([x,y])=>{
    ctx.beginPath(); ctx.moveTo(x-7,y); ctx.quadraticCurveTo(x,y-6,x+7,y); ctx.stroke();
  });

  // Far hills
  const fh = ctx.createLinearGradient(0,H*0.45,0,H*0.7);
  fh.addColorStop(0,'#a5d6a7'); fh.addColorStop(1,'#4caf50');
  ctx.fillStyle=fh;
  ctx.beginPath(); ctx.moveTo(0,H*0.72);
  ctx.bezierCurveTo(90,H*0.46,180,H*0.6,270,H*0.52);
  ctx.bezierCurveTo(360,H*0.44,420,H*0.6,W,H*0.5);
  ctx.lineTo(W,H); ctx.lineTo(0,H); ctx.closePath(); ctx.fill();

  // Ground
  const gnd = ctx.createLinearGradient(0,H*0.63,0,H);
  gnd.addColorStop(0,'#4caf50'); gnd.addColorStop(1,'#1b5e20');
  ctx.fillStyle=gnd;
  ctx.beginPath(); ctx.moveTo(0,H*0.7);
  ctx.bezierCurveTo(120,H*0.62,270,H*0.73,390,H*0.66);
  ctx.bezierCurveTo(420,H*0.64,440,H*0.68,W,H*0.65);
  ctx.lineTo(W,H); ctx.lineTo(0,H); ctx.closePath(); ctx.fill();

  // Tree helper
  function tree(x,baseY,h){
    // trunk
    ctx.fillStyle='#5d4037';
    ctx.fillRect(x-5,baseY,10,h*0.32);
    // 3 canopy tiers
    const tiers=[{r:h*0.52,oy:0},{r:h*0.42,oy:h*0.18},{r:h*0.32,oy:h*0.33}];
    tiers.forEach(({r,oy})=>{
      const g=ctx.createRadialGradient(x,baseY-r*0.35-oy,r*0.08,x,baseY-r*0.2-oy,r*0.58);
      g.addColorStop(0,'#81c784'); g.addColorStop(0.5,'#388e3c'); g.addColorStop(1,'rgba(27,94,32,0)');
      ctx.fillStyle=g;
      ctx.beginPath(); ctx.ellipse(x,baseY-r*0.35-oy,r*0.48,r*0.58,0,0,Math.PI*2); ctx.fill();
    });
  }
  tree(55,  H*0.7-5, 95);
  tree(135, H*0.68-5,85);
  tree(225, H*0.65-5,105);
  tree(318, H*0.67-5,88);
  tree(405, H*0.7-5, 78);

  // Stream
  const sw = ctx.createLinearGradient(0,H*0.78,250,H*0.78);
  sw.addColorStop(0,'rgba(129,212,250,0.8)'); sw.addColorStop(1,'rgba(129,212,250,0)');
  ctx.fillStyle=sw;
  ctx.beginPath();
  ctx.moveTo(0,H*0.77); ctx.bezierCurveTo(50,H*0.73,100,H*0.79,180,H*0.75); ctx.lineTo(220,H*0.82);
  ctx.bezierCurveTo(130,H*0.86,50,H*0.82,0,H*0.86); ctx.closePath(); ctx.fill();

  // Flowers
  function flower(x,y,c1,c2){
    ctx.fillStyle=c1;
    for(let a=0;a<Math.PI*2;a+=Math.PI/3){
      ctx.beginPath(); ctx.ellipse(x+Math.cos(a)*5.5,y+Math.sin(a)*5.5,4.5,3,a,0,Math.PI*2); ctx.fill();
    }
    ctx.fillStyle=c2; ctx.beginPath(); ctx.arc(x,y,4,0,Math.PI*2); ctx.fill();
  }
  [[85,H-32,'#f48fb1','#fff176'],[148,H-28,'#ef9a9a','#ffee58'],[200,H-35,'#ce93d8','#fff176'],
   [265,H-30,'#80cbc4','#ffeb3b'],[325,H-33,'#f48fb1','#fff176'],[385,H-29,'#ef9a9a','#ffee58']]
  .forEach(([x,y,c1,c2])=>flower(x,y,c1,c2));

  // Butterfly
  function butterfly(x,y,c){
    ctx.fillStyle=c;
    ctx.beginPath(); ctx.ellipse(x-8,y,9,5.5,-0.35,0,Math.PI*2); ctx.fill();
    ctx.beginPath(); ctx.ellipse(x+8,y,9,5.5, 0.35,0,Math.PI*2); ctx.fill();
    ctx.beginPath(); ctx.ellipse(x-6,y+6,6,4,-0.65,0,Math.PI*2); ctx.fill();
    ctx.beginPath(); ctx.ellipse(x+6,y+6,6,4, 0.65,0,Math.PI*2); ctx.fill();
    ctx.fillStyle='rgba(0,0,0,0.2)';
    ctx.beginPath(); ctx.ellipse(x,y+3,1.5,5,0,0,Math.PI*2); ctx.fill();
  }
  butterfly(355,H*0.37,'rgba(255,193,7,0.9)');
  butterfly(182,H*0.29,'rgba(240,98,146,0.85)');

  // Subtle grid guides
  ctx.strokeStyle='rgba(255,255,255,0.25)'; ctx.lineWidth=1.5;
  [150,300].forEach(x=>{ctx.beginPath();ctx.moveTo(x,0);ctx.lineTo(x,H);ctx.stroke()});
  ctx.beginPath();ctx.moveTo(0,150);ctx.lineTo(W,150);ctx.stroke();
}

// ============================================================
//  Apply canvas image to all puzzle pieces
// ============================================================
window.addEventListener('DOMContentLoaded', () => {
  const canvas = document.getElementById('puzzleCanvas');
  drawNature(canvas);
  const dataURL = canvas.toDataURL('image/png');
  document.querySelectorAll('.piece').forEach(p => {
    p.style.backgroundImage = `url("${dataURL}")`;
  });
  attachDragEvents();
  attachTouchEvents();
});

// ============================================================
//  Desktop Drag & Drop
// ============================================================
let draggedPiece = null;

function attachDragEvents() {
  document.querySelectorAll('.piece').forEach(piece => {
    piece.addEventListener('dragstart', e => {
      draggedPiece = piece; piece.classList.add('dragging');
      e.dataTransfer.effectAllowed = 'move';
    });
    piece.addEventListener('dragend', () => { piece.classList.remove('dragging'); draggedPiece = null; });
  });
  document.querySelectorAll('.slot').forEach(slot => {
    slot.addEventListener('dragover',  e => { e.preventDefault(); slot.classList.add('drag-over'); });
    slot.addEventListener('dragleave', () => slot.classList.remove('drag-over'));
    slot.addEventListener('drop', e => { e.preventDefault(); slot.classList.remove('drag-over'); dropOnSlot(slot); });
  });
  const tray = document.getElementById('tray');
  tray.addEventListener('dragover', e => e.preventDefault());
  tray.addEventListener('drop', e => { e.preventDefault(); if(draggedPiece) tray.appendChild(draggedPiece); updateProgress(); });
}

function dropOnSlot(slot) {
  if (!draggedPiece) return;
  if (slot.firstElementChild) document.getElementById('tray').appendChild(slot.firstElementChild);
  slot.appendChild(draggedPiece);
  updateProgress();
}

// ============================================================
//  Touch Drag (mobile)
// ============================================================
let touchPiece=null, touchClone=null, touchOffX=0, touchOffY=0;

function attachTouchEvents() {
  document.querySelectorAll('.piece').forEach(piece => {
    piece.addEventListener('touchstart', e => {
      touchPiece=piece; piece.classList.add('dragging');
      const t=e.touches[0], r=piece.getBoundingClientRect();
      touchOffX=t.clientX-r.left; touchOffY=t.clientY-r.top;
      touchClone=piece.cloneNode(true);
      touchClone.style.cssText=`position:fixed;pointer-events:none;z-index:999;
        width:${r.width}px;height:${r.height}px;opacity:.85;border-radius:12px;
        background-image:${piece.style.backgroundImage};background-size:450px 300px;
        background-position:${getComputedStyle(piece).backgroundPosition};
        left:${t.clientX-touchOffX}px;top:${t.clientY-touchOffY}px;transition:none;`;
      document.body.appendChild(touchClone);
    },{passive:true});

    piece.addEventListener('touchmove', e => {
      if(!touchClone)return; e.preventDefault();
      const t=e.touches[0];
      touchClone.style.left=(t.clientX-touchOffX)+'px';
      touchClone.style.top=(t.clientY-touchOffY)+'px';
    },{passive:false});

    piece.addEventListener('touchend', e => {
      if(!touchClone||!touchPiece)return;
      const t=e.changedTouches[0];
      touchClone.style.display='none';
      const el=document.elementFromPoint(t.clientX,t.clientY);
      touchClone.remove(); touchClone=null; touchPiece.classList.remove('dragging');
      const target=el?el.closest('.slot,#tray'):null;
      if(target&&target.classList.contains('slot')){ draggedPiece=touchPiece; dropOnSlot(target); }
      else if(target&&target.id==='tray'){ document.getElementById('tray').appendChild(touchPiece); updateProgress(); }
      touchPiece=null; draggedPiece=null;
    });
  });
}

// ============================================================
//  Progress & Win
// ============================================================
function updateProgress() {
  let correct=0;
  document.querySelectorAll('.slot').forEach(slot=>{
    const p=slot.firstElementChild;
    const ok=p&&p.dataset.id===slot.dataset.id;
    slot.classList.toggle('correct',!!ok);
    if(ok) correct++;
  });
  document.getElementById('progressFill').style.width=(correct/6*100)+'%';
  document.getElementById('progressLabel').textContent=`${correct} / 6 قطع صحيحة`;
  if(correct===6) triggerWin();
  else document.getElementById('successMsg').style.display='none';
}

function triggerWin(){
  document.getElementById('successMsg').style.display='block';
  spawnConfetti();
  try{
    const f=document.getElementById('progressForm');
    if(f){document.getElementById('progressPoints').value=60; setTimeout(()=>f.submit(),2200);}
  }catch(e){console.error(e);}
}

function spawnConfetti(){
  const colors=['#66bb6a','#2e7d32','#ffeb3b','#ef5350','#42a5f5','#ab47bc'];
  for(let i=0;i<60;i++){
    const c=document.createElement('div'); c.className='confetti-piece';
    c.style.cssText=`left:${Math.random()*100}vw;background:${colors[~~(Math.random()*6)]};
      width:${6+Math.random()*8}px;height:${6+Math.random()*8}px;
      animation-duration:${1.5+Math.random()*2}s;animation-delay:${Math.random()*.6}s;
      border-radius:${Math.random()>.5?'50%':'3px'};`;
    document.body.appendChild(c); c.addEventListener('animationend',()=>c.remove());
  }
}

function resetGame(){
  const tray=document.getElementById('tray');
  const pieces=Array.from(document.querySelectorAll('.piece'));
  pieces.forEach(p=>tray.appendChild(p));
  for(let i=pieces.length-1;i>0;i--){const j=~~(Math.random()*(i+1));tray.appendChild(pieces[j]);}
  document.querySelectorAll('.slot').forEach(s=>s.classList.remove('correct'));
  document.getElementById('successMsg').style.display='none';
  document.getElementById('progressFill').style.width='0%';
  document.getElementById('progressLabel').textContent='0 / 6 قطع صحيحة';
  attachDragEvents(); attachTouchEvents();
}
</script>
</body>
</html>
