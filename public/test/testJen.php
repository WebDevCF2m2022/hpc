<?php

use model\MappingModel\FaqMapping;

use model\MappingModel\AdminMapping;


use model\MappingModel\MedecinMapping;

use model\MappingModel\ServiceMapping;

use model\ManagerModel\MedecinManager;
use model\ManagerModel\ServiceManager;

$jen = new ServiceManager($pdo);

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







$testCocojen = new ServiceMapping([]);
