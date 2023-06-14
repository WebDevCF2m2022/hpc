<?php

use model\MappingModel\FaqMapping;

use model\MappingModel\AdminMapping;


use model\MappingModel\MedecinMapping;

use model\MappingModel\serviceMapping;

use model\ManagerModel\MedecinManager;


//test de la classe MedecinManager avec un try catch et la fonction GetOneById
try {
    $test = new MedecinManager($pdo);
    $medecin = $test->getOneById(1);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($medecin);



//test de la classe MedecinManager avec un try catch et la fonction getAll
try {
    $test = new MedecinManager($pdo);
   $affiche = $test->getAll();
   
} catch (Exception $e) {
    echo $e->getMessage();
}
var_dump($affiche);

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
        "faqText" => "text",
        "lulu" => "lala"
    ]);
}catch(Exception $e){
    echo $e->getMessage();
}

try {
    $test3 = new FaqMapping([
        "faqID" => 1,
        "faqTitle" => " testtesttesttesttesttesttesttesttest testtesttesttesttesttesttesttesttesttesttesttesttesttesttest testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttest testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest",
        "faqText" => "text",
        "lulu" => "lala"
    ]);
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $test4 = new FaqMapping([
        "faqID" => 7,
        "faqTitle" => "test",
        "faqText" => "text",
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
            "soins" => "testfghyjkgytgyuyhuyhuihy§yudfhsuiezresdgkluhgkgtyftyfyggjjdhsjkhfcjkerjfhjrhjghrghjrhjcjedcjje",
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
