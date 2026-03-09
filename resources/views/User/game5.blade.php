@extends('layouts.app')

@section('title','سباق الاستدامة - Eco Stars')

@section('content')
<div class="max-w-md mx-auto p-6 text-center">
    <h1 class="text-3xl font-black">🌱 سباق الاستدامة</h1>
    <p class="mt-2 font-semibold text-emerald-700">سُق عربية الأطفال وتفادى المخلفات</p>

    <canvas id="game" width="320" height="440" class="mx-auto mt-6 rounded-xl border-4 border-emerald-700 shadow-lg" ></canvas>

    <div id="info" class="mt-4 inline-block bg-white/80 p-3 rounded-lg border-2 border-emerald-200 font-bold">النقاط: <span id="score">0</span></div>
</div>

<script>
const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

let car = { x: 135, y: 340, width: 50, height: 80 };
let obstacles = [];
let score = 0;
let speed = 2.5;
let gameOver = false;
const trashTypes = ["🍌", "🧴", "🥫", "🛍️", "📄", "🧃"];

document.addEventListener("keydown", e => {
    if (e.key === "ArrowLeft" && car.x > 10) car.x -= 30;
    if (e.key === "ArrowRight" && car.x < canvas.width - car.width - 10) car.x += 30;
});

canvas.addEventListener("touchstart", e => {
    let x = e.touches[0].clientX - canvas.offsetLeft;
    if (x < canvas.width / 2) car.x -= 30; else car.x += 30;
});

function drawCar() {
    ctx.fillStyle = "#43a047";
    ctx.fillRect(car.x, car.y + 15, car.width, 50);
    ctx.fillStyle = "#2e7d32";
    ctx.fillRect(car.x + 8, car.y, car.width - 16, 25);
    ctx.fillStyle = "#000";
    ctx.beginPath(); ctx.arc(car.x + 10, car.y + 70, 7, 0, Math.PI * 2); ctx.arc(car.x + car.width - 10, car.y + 70, 7, 0, Math.PI * 2); ctx.fill();
}

function createObstacle() { obstacles.push({ x: Math.random() * (canvas.width - 40), y: -40, size: 40, icon: trashTypes[Math.floor(Math.random() * trashTypes.length)] }); }
function drawObstacles() { ctx.font = "36px Arial"; obstacles.forEach(o => { ctx.fillText(o.icon, o.x, o.y); o.y += speed; }); }
function hit(o) { return ( car.x < o.x + o.size && car.x + car.width > o.x && car.y < o.y + o.size && car.y + car.height > o.y ); }

function update() {
    if (gameOver) return;
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawCar(); drawObstacles();
    obstacles.forEach((o, i) => {
        if (hit(o)) { gameOver = true; alert("❌ خبطت في المخلفات! خلي بالك من البيئة"); location.reload(); }
        if (o.y > canvas.height) { obstacles.splice(i, 1); score++; document.getElementById("score").textContent = score; if (score % 5 === 0) speed += 0.4; }
    });
    requestAnimationFrame(update);
}

setInterval(createObstacle, 900);
update();
</script>

@endsection