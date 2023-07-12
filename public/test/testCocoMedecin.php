<?php
use model\MappingModel\MedecinMapping;


use model\ManagerModel\MedecinManager;
// charge le fichier de configuration
require_once '../../config.php';

// autoload de nos classes depuis la racine PATH_ROOT en suivant l'arborescence
// des namespaces de nos classes
spl_autoload_register(
    function ($className) {
        $className = str_replace('\\', '/', $className);
        require_once '../../' . $className . '.php';


    });

// connexion à la base de données en PDO
try {
    $pdo = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT,
        DB_USER,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

$testCoco = new MedecinManager($pdo);

if (isset($_GET['addMedecin'])) {
    $medecin = new MedecinMapping($_POST);
    $testCoco->add($medecin);
}

//test de la classe MedecinManager avec un try catch et la fonction GetOneById
try {

    $medecin = $testCoco->getOneById(2);

} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($medecin);



//test de la classe MedecinManager avec un try catch et la fonction GetAll
try {

    $medecins = $testCoco->getAll();

} catch (Exception $e) {
    echo $e->getMessage();
}


var_dump($medecins);
echo "<hr>";

?>

<form action="?addMedecin" method="post" enctype="multipart/form-data">
    <td><input type="text" name="name" placeholder="name"></td>
    <td><input type="text" name="nickname" placeholder="nickName"></td>
    <td><input type="text" name="lang" placeholder="lang"></td>
    <td><input type="text" name="info" placeholder="info"></td>
    <td><input type="text" name="imgMed" placeholder="imgMed"></td>

    <td><button type="submit" name="submit" value="Ajouter">Ajoutez</button></td>

</form>
<?php
//verification si la variable get update existe
if (isset($_GET['updateMedecin'])) {
    //si oui on instancie un objet medecin avec les données du formulaire
    $medecin = new MedecinMapping($_POST);
    //on utilise la fonction update de la classe MedecinManager
    $testCoco->update($medecin, $_GET['updateMedecin']);
}

//verification si la variable get delete existe
if (isset($_GET['deleteMedecin'])) {
    //si oui on utilise la fonction delete de la classe MedecinManager
    $testCoco->delete($_GET['deleteMedecin']);
}

?>
//affichage de la liste des medecins
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>nickName</th>
            <th>lang</th>
            <th>info</th>
            <th>imgMed</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <style>
        table, th, td {
            border: 2px solid black; border-collapse: collapse;
        }
        th, td {
            padding: 5px; }

        h1{
            text-align: center;
        }
        a{
            text-decoration: none;
            padding: 5px;
        }
    </style>
        <?php foreach ($medecins as $medecin) : ?>
            <tr>
                <td>
                <form action="?updateMedecin=<?=$medecin->getMedecinID()?>" method="post" enctype="multipart/form-data">
                    <td><input type="text" name="name" placeholder="name" value="<?= $medecin->getName() ?>"></td>
                    <td><input type="text" name="nickname" placeholder="nickName" value="<?= $medecin->getNickName() ?>"></td>
                    <td><input type="text" name="lang" placeholder="lang" value="<?= $medecin->getLang() ?>"></td>
                    <td><input type="text" name="info" placeholder="info" value="<?= $medecin->getInfo() ?>"></td>
                    <td><input type="text" name="imgMed" placeholder="imgMed" value="<?= $medecin->getImgMed() ?>"></td>
                    <td><input type="submit" value="envoyer"></td>



                </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
