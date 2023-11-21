const tanah = document.querySelectorAll('.tanah');
const tikus = document.querySelectorAll('.tikus');
const papanSkor = document.querySelector('.papan-skor');

const pop = document.querySelector('#pop');
const backsong = document.querySelector('#backsong');

// musik otomatis menyala
let music_condition = false;

let tanahSebelumnya;
let selesai;
let skor;

function music() {
  const off = document.querySelector('#off');
  const on = document.querySelector('#on');

  if (music_condition) {
    tylon.se.display = 'none';
    off.style.display = 'block';
    music_condition = false;
    backsong.pause();
  } else {
    on.style.display = 'block';
    off.style.display = 'none';
    music_condition = true;
    backsong.play();

  }
}

function randomTanah(tanah) {
  const t = Math.floor(Math.random() * tanah.length);
  const tRandom = tanah[t];
  if (tRandom == tanahSebelumnya) {
    randomTanah(tanah);
  }
  tanahSebelumnya = tRandom;
  return tRandom;
}

function randomWaktu(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

function munculkanTikus() {
  const tRandom = randomTanah(tanah);
  const wRandom = randomWaktu(250, 750);
  tRandom.classList.add('muncul');

  setTimeout(() => {
    tRandom.classList.remove('muncul');
    if (!selesai) {
      munculkanTikus();
    }
  }, wRandom);
}

function mulai() {
  if (music_condition) {
    backsong.play(); 
  }
  selesai = false;
  skor = 0;
  papanSkor.textContent = 0;

  munculkanTikus();
  setTimeout(() => {
    selesai = true;
    // backsong.pause();
    window.location.href = `./score.php?score=${skor}`;
  }, 60000);
}

function pukul() {
  skor++;
  this.parentNode.classList.remove('muncul');
  pop.play();
  papanSkor.textContent = skor;
}

tikus.forEach(t => {
  t.addEventListener('click', pukul);
});