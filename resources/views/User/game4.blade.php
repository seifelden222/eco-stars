@extends('layouts.app')

@section('title','لعبة الاستدامة - Eco Stars')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-black">🌱 لعبة الاستدامة</h1>
    <h3 class="mt-2 text-lg font-semibold text-emerald-700">اختار كل الحاجات الصح عشان تعدي الليفل</h3>

    <div id="game" class="grid grid-cols-4 gap-4 mt-6"></div>

    <div id="info" class="mt-6 bg-white/75 backdrop-blur rounded-lg p-4 text-center">
        <p class="font-bold">الليفل: <span id="level">1</span> / 10</p>
        <p class="font-bold">النقاط: <span id="score">0</span></p>
    </div>

    <p class="mt-8 text-sm text-emerald-700 font-bold">مع تحيات دكتوره سما شعيب</p>
</div>

<script>
let level = 1;
let score = 0;
let correctClicks = 0;

const game = document.getElementById("game");
const levelText = document.getElementById("level");
const scoreText = document.getElementById("score");

const goodItems = ["🌱", "🌳", "🚲", "☀️", "♻️"];
const badItems = ["🗑️", "🏭", "🚗", "🔥"];

function shuffle(array) { return array.sort(() => Math.random() - 0.5); }

function loadLevel() {
    game.innerHTML = "";
    levelText.textContent = level;
    correctClicks = 0;

    let goodCount = 2 + Math.floor(level / 2);
    let badCount = 3 + level;
    let totalItems = [];

    for (let i = 0; i < goodCount; i++) totalItems.push({ type: "good", icon: goodItems[Math.floor(Math.random() * goodItems.length)] });
    for (let i = 0; i < badCount; i++) totalItems.push({ type: "bad", icon: badItems[Math.floor(Math.random() * badItems.length)] });

    shuffle(totalItems);

    totalItems.forEach(item => {
        let div = document.createElement("div");
        div.classList.add("item", "p-6", "rounded-lg", "flex", "items-center", "justify-center");
        div.textContent = item.icon;

        if (item.type === "good") {
            div.classList.add("good");
            div.onclick = () => {
                div.style.visibility = "hidden";
                score += 5;
                correctClicks++;
                scoreText.textContent = score;

                if (correctClicks === goodCount) setTimeout(nextLevel, 500);
            };
        } else {
            div.classList.add("bad");
            div.onclick = () => {
                score -= 3;
                scoreText.textContent = score;
                alert("❌ دي حاجة مضرة بالبيئة");
            };
        }

        game.appendChild(div);
    });
}

function nextLevel() {
    if (level < 10) { level++; loadLevel(); } else { alert("🏆 مبروك! خلصت كل الليفلز وبقيت صديق للبيئة"); }
}

loadLevel();
</script>

@endsection