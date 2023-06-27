<?php

require_once "../view/publicView/accueilView.php";


if (isset ($_GET['p'])){

    switch ($_GET['p']){

        case "acceuil":
            include_once "../view/publicView/acceuilView.php";
            break;

        case "service":
            include_once "../view/publicView/serviceView.php";
            break;

        case "agen":
            include_once "../view/publicView/agendaView.php";
            break;

        case "contc":
            include_once "../view/publicView/contactView.php";
            break;

        case "faq":
            include_once "../view/publicView/faqView.php";
            break;
            
        case "connexion":
            include_once "../view/publicView/connexion.php";
            break;
        
        default:
            include_once "../view/publicView/404View.php";
            
    }
}

