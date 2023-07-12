<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menuCSS.css">
    <title>Formulaire de connexion</title>
</head>

<body>
    <nav>
        <?php 
        require_once "src/menu.php";
        ?>
    </nav>
    <h1>Connectez-vous</h1>
    <form action="" method="POST" id="connexionForm">
        <label for="mail">e-mail</label>
        <input type="text" name="mail" required>

        <label for="pwd">Mot de passe :</label>
        <input type="password" name="pwd" required>

        <input type="checkbox" placeholder="Connecter">
        <button type="submit" id="buttonAdmin">Se connecter</button>



    </form>



</body>
</html>