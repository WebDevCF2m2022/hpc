<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/form.css">
    <title>Formulaire de connexion</title>
</head>

<body>
<?php
include_once "../view/publicView/src/menu.php"
?>

<h1 class="h1Form" >Connectez-vous</h1>

<br><hr><br><br>

<div class="login-box">
  <h2>Bienvenue</h2>
  <form action="" method="POST" id="connexionForm">
    <div class="user-box">
      <input type="text" name="mail" required>
      <label for="mail">Mail</label>
    </div>
    <div class="user-box">
      <input type="password" name="pwd" required>
      <label for="pwd">Mot de passe</label>
    </div>
    <button type="submit" id="buttonAdmin">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Connexion
    </button>
  </form>
</div>

<?php
include_once "../view/publicView/src/foot.php"
?>


</body>
</html>