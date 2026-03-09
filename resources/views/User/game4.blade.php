<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>لعبة الاستدامة - إيكو ستارز</title>
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
    background: linear-gradient(135deg, #e0f2f1 0%, #c8e6c9 100%);
    color: #0b3d0b;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 15px;
}

h1 {
    font-size: 2.8rem;
    font-weight: 900;
    color: #1b5e20;
    margin: 20px 0 8px;
    text-shadow: 0 3px 10px rgba(27,94,32,0.25);
}

h3 {
    font-size: 1.35rem;
    font-weight: 600;
    color: #2e7d32;
    margin-bottom: 30px;
}

#game {
    width: 100%;
    max-width: 420px;
    margin: 0 auto 25px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    perspective: 1100px;
}

.item {
    font-size: 2.6rem;
    aspect-ratio: 1 / 1;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 18px;
    background: linear-gradient(145deg, #f1f8e9, #e8f5e9);
    box-shadow: 
        6px 6px 12px rgba(0,0,0,0.12),
        -6px -6px 12px rgba(255,255,255,0.7);
    transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    transform-style: preserve-3d;
    user-select: none;
}

.item:hover {
    transform: translateY(-8px) rotateX(10deg) rotateY(10deg) scale(1.08);
    box-shadow: 
        10px 10px 20px rgba(0,0,0,0.18),
        -10px -10px 20px rgba(255,255,255,0.9);
}

.good {
    background: linear-gradient(145deg, #66bb6a, #43a047);
    color: white;
    box-shadow: 
        6px 6px 14px rgba(38,105,44,0.4),
        -6px -6px 14px rgba(120,190,130,0.6);
}

.good:hover {
    background: linear-gradient(145deg, #81c784, #66bb6a);
}

.bad {
    background: linear-gradient(145deg, #ffffff, #f5f5f5);
    border: 3px solid #2e7d32;
    color: #1b5e20;
    box-shadow: 
        inset 4px 4px 8px rgba(0,0,0,0.06),
        6px 6px 12px rgba(0,0,0,0.10);
}

#info {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(10px);
    padding: 18px 28px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    margin-top: 15px;
    width: 100%;
    max-width: 420px;
    text-align: center;
}

#info p {
    font-size: 1.25rem;
    margin: 8px 0;
    font-weight: 600;
}

#info span {
    font-weight: 900;
    color: #1b5e20;
}

#exitBtn {
    margin-top: 20px;
    padding: 12px 32px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 14px;
    font-family: 'Cairo', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s;
}

#exitBtn:hover {
    background: #dc2626;
}
</style>
</head>

<body>

<form id="progressForm" method="POST" action="{{ route('progress.store') }}" style="display:none">
    @csrf
    <input type="hidden" name="points" id="progressPoints" value="0">
    <input type="hidden" name="reason" value="game4">
    <input type="hidden" name="type" value="earn">
</form>

<h1>🌱 لعبة الاستدامة</h1>
<h3>اختار كل الحاجات الصح عشان تعدي الليفل</h3>

<div id="game"></div>

<div id="info">
    <p>الليفل: <span id="level">1</span> / 10</p>
    <p>النقاط: <span id="score">0</span></p>
</div>

<button id="exitBtn">🚪 خروج للألعاب</button>

<script>
const gamesPageUrl = "{{ route('games') }}";
let level = 1;
let score = 0;
let correctClicks = 0;

const game = document.getElementById("game");
const levelText = document.getElementById("level");
const scoreText = document.getElementById("score");

const goodItems = ["🌱", "🌳", "🚲", "☀️", "♻️"];
const badItems = ["🗑️", "🏭", "🚗", "🔥"];

function shuffle(array) {
    return array.sort(() => Math.random() - 0.5);
}

function loadLevel() {
    game.innerHTML = "";
    levelText.textContent = level;
    correctClicks = 0;

    let goodCount = 2 + Math.floor(level / 2);
    let badCount = 3 + level;
    let totalItems = [];

    for (let i = 0; i < goodCount; i++) {
        totalItems.push({ type: "good", icon: goodItems[Math.floor(Math.random() * goodItems.length)] });
    }

    for (let i = 0; i < badCount; i++) {
        totalItems.push({ type: "bad", icon: badItems[Math.floor(Math.random() * badItems.length)] });
    }

    shuffle(totalItems);

    totalItems.forEach(item => {
        let div = document.createElement("div");
        div.classList.add("item");
        div.textContent = item.icon;

        if (item.type === "good") {
            div.classList.add("good");
            div.onclick = () => {
                div.style.visibility = "hidden";
                score += 5;
                correctClicks++;
                scoreText.textContent = score;

                if (correctClicks === goodCount) {
                    setTimeout(nextLevel, 500);
                }
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
    if (level < 10) {
        level++;
        loadLevel();
    } else {
        // finished all levels: submit points and redirect to achievements
        try {
            const pointsInput = document.getElementById('progressPoints');
            const form = document.getElementById('progressForm');
            if (pointsInput && form) {
                pointsInput.value = score;
                form.submit();
                return;
            }
        } catch (e) {
            console.error(e);
        }
        alert("🏆 مبروك! خلصت كل الليفلز وبقيت صديق للبيئة");
    }
}

document.getElementById("exitBtn").addEventListener("click", () => {
    if (confirm("هل تريد الخروج من اللعبة؟")) {
        window.location.href = gamesPageUrl;
    }
});

loadLevel();
</script>

<p style="margin-top:40px; color:#2e7d32; font-weight:700;">مع تحيات دكتوره سما شعيب</p>

</body>
</html>