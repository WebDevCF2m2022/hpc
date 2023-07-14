<?php 
use model\MappingModel\serviceMapping;
use model\ManagerModel\ServiceManager;

//charger config
require_once "../../config.php";
//autoload des classes depuis la racine

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

$jen = new ServiceManager($pdo);

if (isset($_GET['addService'])){
    $service = new serviceMapping($_POST);
    $jen->addService($service);
}
//test GetOneById class servicemanager

try{

    $service = $jen->getOneById(8);
}catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($service);

//test getAll 
try{

    $service = $jen->getAll();

} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($service);
echo"<hr>";

?>

<form action="?addService" method="post" enctype="multipart/form-data">
    <td><input type="text" name="soins" placeholder="soins"></td>
    <td><input type="text" name="info_soins" placeholder="info_soins"></td>
    <td><input type="text" name="imgSoins" placeholder="imgSoins"></td>

    <td><button type="submit" name="submit" value="Ajouter">Ajoutez</button></td>

</form>
<?php
//verification si la variable get update existe
if (isset($_GET['updateService'])) {
    //si oui on instancie un objet medecin avec les données du formulaire
    $service = new serviceMapping($_POST);
    //on utilise la fonction update de la classe MedecinManager
    $jen->updateService($service, $_GET['updateService']);
}

//verification si la variable get delete existe
if (isset($_GET['deleteService'])) {
    //si oui on utilise la fonction delete de la classe MedecinManager
    $jen->delete($_GET['deleteService']);
}

?>
//affichage de la liste des services
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>soins</th>
            <th>info</th>
            <th>imgSoins</th>
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
        <?php foreach ($service as $service) : ?>
            <tr>
                <td>
                <form action="?updateService=<?=$service->getServiceID()?>" method="post" enctype="multipart/form-data">
                    <td><input type="text" name="soins" placeholder="soins" value="<?= $service->getSoins() ?>"></td>
                    <td><input type="text" name="info_soins" placeholder="info_soins" value="<?= $service->getInfo_soins() ?>"></td>
                    <td><input type="text" name="imgSoins" placeholder="imgSoins" value="<?= $service->getImgSoins() ?>"></td>
                    <td><input type="submit" value="envoyer"></td>



                </form>
            </tr>
        <?php endforeach; ?>
    </tbody>






