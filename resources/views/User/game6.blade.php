@extends('layouts.app')

@section('title','لعبة البازل - Eco Stars')

@section('content')
<div class="max-w-5xl mx-auto p-6">
  <header class="flex items-center justify-center gap-4 bg-white/80 p-4 rounded-lg shadow-md mb-6">
    <img src="/assets/img/logo.png" alt="Eco Stars" class="w-12">
    <h1 class="text-2xl font-black text-emerald-700">Eco Stars</h1>
  </header>

  <p class="text-lg font-semibold text-emerald-700 mb-6">🧩 ركّب صورة البيئة</p>

  <div class="game flex flex-col md:flex-row items-start gap-8 justify-center">
    <div class="board grid grid-cols-3 gap-3">
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="1"></div>
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="2"></div>
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="3"></div>
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="4"></div>
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="5"></div>
      <div class="slot bg-white/80 rounded-lg border-2 border-emerald-200" data-id="6"></div>
    </div>

    <div class="pieces grid grid-cols-3 gap-3">
      <div class="piece p3 bg-cover bg-center h-40" draggable="true" data-id="3" style="background-image:url('/assets/img/puzzle.jpg'); background-position:-340px 0"></div>
      <div class="piece p1 bg-cover bg-center h-40" draggable="true" data-id="1" style="background-image:url('/assets/img/puzzle.jpg'); background-position:0 0"></div>
      <div class="piece p6 bg-cover bg-center h-40" draggable="true" data-id="6" style="background-image:url('/assets/img/puzzle.jpg'); background-position:-340px -170px"></div>
      <div class="piece p2 bg-cover bg-center h-40" draggable="true" data-id="2" style="background-image:url('/assets/img/puzzle.jpg'); background-position:-170px 0"></div>
      <div class="piece p5 bg-cover bg-center h-40" draggable="true" data-id="5" style="background-image:url('/assets/img/puzzle.jpg'); background-position:-170px -170px"></div>
      <div class="piece p4 bg-cover bg-center h-40" draggable="true" data-id="4" style="background-image:url('/assets/img/puzzle.jpg'); background-position:0 -170px"></div>
    </div>
  </div>

  <div class="success hidden mt-6 text-center text-2xl font-black text-emerald-700 bg-white/80 p-4 rounded-lg">🌱 أحسنت! كده بنحافظ على البيئة</div>
</div>

<script>
let draggedPiece = null;
document.querySelectorAll(".piece").forEach(piece => { piece.addEventListener("dragstart", () => { draggedPiece = piece; }); });
document.querySelectorAll(".slot").forEach(slot => {
  slot.addEventListener("dragover", e => e.preventDefault());
  slot.addEventListener("drop", () => { if (!slot.hasChildNodes()) slot.appendChild(draggedPiece); checkWin(); });
});
function checkWin(){ let correct=0; document.querySelectorAll(".slot").forEach(slot=>{ const piece = slot.firstElementChild; if(piece && piece.dataset.id===slot.dataset.id) correct++; }); document.querySelector(".success").classList.toggle('hidden', correct!==6); }
</script>

@endsection