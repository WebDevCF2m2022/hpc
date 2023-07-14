let img__slider = document.getElementsByClassName('img__slider');

let etape = 0;

let nbr__img = img__slider.length;

let precedent = document.querySelector('.precedent');
let suivant = document.querySelector('.suivant');

function enleverActiveImages() {
  for (let i = 0; i < nbr__img; i++) {
    img__slider[i].classList.remove('active');
  }
}

suivant.addEventListener('click', function() {
  etape++;
  if (etape >= nbr__img) {
    etape = 0;
  }
  enleverActiveImages();
  img__slider[etape].classList.add('active');
})

precedent.addEventListener('click', function() {
  etape--;
  if (etape < 0) {
    etape = nbr__img - 1;
  }
  enleverActiveImages();
  img__slider[etape].classList.add('active');
})

setInterval(function() {
  etape++;
  if (etape >= nbr__img) {
    etape = 0;
  }
  enleverActiveImages();
  img__slider[etape].classList.add('active');
}, 3000);

// map

var map = L.map('map').setView([35.759465, -5.833954], 13);
var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
	maxZoom: 20,
	attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});
Stadia_OSMBright.addTo(map);

var marker = L.marker([35.759465, -5.833954]).addTo(map);