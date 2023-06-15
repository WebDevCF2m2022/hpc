<?php

use model\MappingModel\FaqMapping;

use model\MappingModel\AdminMapping;


use model\MappingModel\MedecinMapping;

use model\MappingModel\serviceMapping;

use model\ManagerModel\MedecinManager;

$test = new MedecinManager($pdo);

//test de la classe MedecinManager avec un try catch et la fonction GetOneById
try {
    
    $medecin = $test->getOneById(3);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($medecin);



//test de la classe MedecinManager avec un try catch et la fonction GetAll
try {

    $medecins = $test->getAll();
   
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<hr>";
var_dump($medecins);
echo "<hr>";

$testjen = new serviceMapping([]);




$test1 = new FaqMapping([]);
$test2 = new MedecinMapping([]);

try{
    $test2 = new MedecinMapping(
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
    $test2 = new FaqMapping([
        "faqID" => 1,
        "faqTitle" => "test",
        "faqText" => "texttrrzreee",
        "lulu" => "lala"
    ]);
}catch(Exception $e){
    echo $e->getMessage();
}

try {
    $test3 = new FaqMapping([
        "faqID" => 1,
        "faqTitle" => " testtesttesttesttesttesttesttesttest",
        "faqText" => "textertyuio",
        "lulu" => "lala"
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $test4 = new FaqMapping([
        "faqID" => 7,
        "faqTitle" => "test",
        "faqText" => "texhbdiuehfbejt",
        "lulu" => "lala dfgrfggh rthgh"
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}

//var_dump($test2);


try{
    $testjen = new serviceMapping(
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
//var_dump($testjen);

try{
    $test3 = new AdminMapping([
        "userID" => 3,
    ]);
}
 catch (Exception $e) {
    echo $e->getMessage();
}

//var_dump($test3);

//var_dump($test2);
