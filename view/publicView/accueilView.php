<?php

use model\MappingModel\FaqMapping;
use model\MappingModel\MedecinMapping;
use model\MappingModel\serviceMapping;
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
var_dump($testjen);
