<?php
#var_dump($_SESSION);

// https://github.com/verot/class.upload.php
use Verot\Upload\Upload;
use model\ManagerModel\MedecinManager;
use model\MappingModel\MedecinMapping;

if (isset($_GET['update']) && ctype_digit($_GET['update'])){
   // echo "ID = ".$_GET['id'];
    $upMed = updateMedecin($pdo, $_POST['name'], $_POST['nickName'], $_POST['lang'], $_POST['info'], $_POST['imgMed']);
    header('Location: ./');
    die();

}elseif(isset($_GET['delete']) && ctype_digit($_GET['delete'])) {
    $suppInstru = deleteInstrument($pdo, $_GET['delete']);
    if($suppInstru===1){
        header('Location: ./');
        die();
    }
}elseif(isset($_GET['insert'])) {
          $dataCateg = getAllCategories($pdo);   
    include_once '../view/private_view/insertView.php';

    if(isset($_POST['name']) && isset($_POST['nickName']) && isset($_POST['lang']) && isset($_POST['info']) && isset($_POST['imgMed'])){ //on appelle la fonction addInstrument 

        $addInstru = addInstrument($pdo, $_POST['name'], $_POST['nickName'], $_POST['lang'], $_POST['info'], $_POST['imgMed'], $_POST['categorie_id']); //var_dump($addInstru); 
        //si la fonction retourne 1 on redirige vers la page admin 
        //if($addInstru===1){ header('Location: ./'); die(); 
        //}
        echo 'Instrument ajouté avec succès !';

        $nameTemps = date('YmdHis').mt_rand(1000, 9999);
        $imgInsertPath = 'img/upload/';

        $pourDB = $imgInsertPath.$nameTemps.'.';
       //créer une condition avec un if pour vérifier si le fichier est bien une image avec imagetypes
        if(!in_array(exif_imagetype($_FILES['image_field']['tmp_name']), [IMAGETYPE_JPEG, IMAGETYPE_PNG , IMAGETYPE_GIF,IMAGETYPE_WEBP])){
            echo 'Le fichier n\'est pas une image';
            die();
        }

        $handle = new Upload($_FILES['image_field']);
        if ($handle->uploaded) {
            $handle->file_new_name_body   = $nameTemps;
            $handle->image_resize         = true;
            $handle->image_x              = 400;
            $handle->image_ratio_y        = true;
            $handle->process($imgInsertPath);
            if ($handle->processed) {
                echo 'Image envoyée avec succès !';
                $handle->clean();
            } else {
                echo 'error : ' . $handle->error;
            }
        }

        // on insert l'image dans la table image avec info chemin et l'id de l'instrument
        $insertImg = insertImg($pdo, $pourDB, $addInstru);


}
}else{

    // on récupére les données de la table instruments
    $upMedments = getAllInstruments($pdo);
    include_once "../view/private_view/adminView.php";
}