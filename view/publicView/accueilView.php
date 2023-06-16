<?php

use model\MappingModel\FaqMapping;

use model\MappingModel\AdminMapping;


use model\MappingModel\MedecinMapping;

use model\MappingModel\ServiceMapping;

use model\ManagerModel\MedecinManager;
use model\ManagerModel\ServiceManager;

$jen = new ServiceManager($pdo);
$testCoco = new MedecinManager($pdo);
//test de la classe ServiceManager avec try catch + GetOneById

try {
    
    $service = $jen->getOneById(1);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($service);


//test de la classe ServiceManager avec try catch + GetAll
$jen2 = [];
try {

   $jen2= $service = $jen->getAll();
   
} catch (Exception $e) {
    echo $e->getMessage();
}


var_dump($service);
echo "<hr>";



echo "<hr>";
echo "Test Coco";






//test de la classe MedecinManager avec un try catch et la fonction GetOneById
try {
    
    $medecin = $testCoco->getOneById(3);
   
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

$testCocojen = new ServiceMapping([]);




$testCoco1 = new FaqMapping([]);
$testCoco2 = new MedecinMapping([]);

try{
    $testCoco2 = new MedecinMapping(
        [
            "medecinID" => 1,
            "Name" => "test",
            "nickName" => "test",
            "lang" => "test",
            "info" => "test",
            "imgMed" => "test"

        ]
        );
}
catch(Exception $e){
}




try{
    $testCoco2 = new FaqMapping([
        "faqID" => 1,
        "faqTitle" => "test",
        "faqText" => "texttrrzreee",
        "lulu" => "lala"
    ]);
}catch(Exception $e){
    echo $e->getMessage();
}

try {
    $testCoco3 = new FaqMapping([
        "faqID" => 1,
        "faqTitle" => " testtesttesttesttesttesttesttesttest",
        "faqText" => "textertyuio",
        "lulu" => "lala"
    ]);



} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $testCoco4 = new FaqMapping([
        "faqID" => 7,
        "faqTitle" => "test",
        "faqText" => "texhbdiuehfbejt",
        "lulu" => "lala dfgrfggh rthgh"
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}

//var_dump($testCoco2);


/*try{
    $testCocojen = new ServiceMapping(
        [
            "serviceID" => 1,
            "soins" => "test",
            "info_soins" => "test",
            "imgSoins" => "test",

        ]
        );
}
catch(Exception $e){
    echo $e->getMessage();
}
//var_dump($testCocojen);*/

try{
    $testCoco3 = new AdminMapping([
        "userID" => 3,
    ]);
}
 catch (Exception $e) {
    echo $e->getMessage();
}

//var_dump($testCoco3);

//var_dump($testCoco2);

echo "<hr>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <a href="?disconnect">Deconnexion</a>
    <?php
    try {

        $medecins2 = $testCoco->getAll();
       // var_dump($medecins2);
        //echo"<hr>";
        
        foreach($medecins2 as $item) {

            ?>
            <form action="?=updateMedecin=<?$item['medecinID']?>" method="post">
            <input type="text" name="Name" value="<?= $item->getName() ?>">
            <input type="text" name="nickName" value="<?= $item->getNickName() ?>">
            <input type="text" name="lang" value="<?= $item->getLang() ?>">
            <input type="text" name="info" value="<?= $item->getInfo() ?>">
            <input type="text" name="imgMed" value="<?= $item->getImgMed() ?>">
            <input type="submit" name="update" value="Modifier">
            </form>

    <?php
            var_dump($item);
        }
       
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    //test de la classe MedecinManager avec un foreach et la fonction updateMedecin
    

    
    ?>
   
</body>
</html>