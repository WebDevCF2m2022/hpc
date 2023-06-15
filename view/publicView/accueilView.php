<?php

use model\MappingModel\FaqMapping;

use model\MappingModel\AdminMapping;


use model\MappingModel\MedecinMapping;

use model\MappingModel\ServiceMapping;

use model\ManagerModel\MedecinManager;
use model\ManagerModel\ServiceManager;

$jen = new ServiceManager($pdo);
$test = new MedecinManager($pdo);
//test de la classe ServiceManager avec try catch + GetOneById

try {
    
    $service = $jen->getOneById(1);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($service);


//test de la classe ServiceManager avec try catch + GetAll
try {

    $service = $jen->getAll();
   
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<hr>";
var_dump($service);
echo "<hr>";






//test de la classe MedecinManager avec un try catch et la fonction GetOneById
/*try {
    
    $medecin = $test->getOneById(3);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($medecin);

*/

//test de la classe MedecinManager avec un try catch et la fonction GetAll
try {

    $medecins = $test->getAll();
   
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<hr>";
var_dump($medecins);
echo "<hr>";

$testjen = new ServiceMapping([]);




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


/*try{
    $testjen = new ServiceMapping(
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
//var_dump($testjen);*/

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
