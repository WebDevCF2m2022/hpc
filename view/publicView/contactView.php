<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Contact</title>
  <link href="css/contact.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
</head>

</head>
<body>
<?php
include_once "../view/publicView/src/menu.php"
?>
  <br><br>
  <h1 id="titreContact">CONTACT</h1>
  <hr>
  <br><br>

  <div id="contener">
    <p id="t1"> INFORMATION</p>
    <div id="contLeft">
      <br>
      <h3>HORAIRES</h3>
      <p> Lundi au Dimanche 8h30 - 20h00</p>
      <h3>ADRESSE</h3>
      <p class="p1">Avenue Charf 422,</p>
      <p>TANGER, Morocco</p>
      <h3>TRANSPORT</h3>
      <p>BUS -> 44, 255 and 275</p>
      <br>
    </div>
    <div id="map"></div>
    <p id="t2">OUR PARTNERS</p><br>
    <div id="contBottom">
      <img src="img/logo.png" alt="cmc">
      <img src="img/unicef.png" alt="unicef">
      <img src="img/cf2000.jpg" alt="cf2000">
      <img src="img/ordreDoc.jpg" alt="ONDM">
      <img src="img/chirec.jpg" alt="chirec">
    </div>
  </div>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
  <script src="js/js.js"></script>
<?php
include_once "../view/publicView/src/foot.php"
?>
</body>
</html>