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
            include_once "../publicView/agendaView.php";
            break;

        case "contc":
            include_once "../publicView/contactView.php";
            break;

        case "faq":
            include_once "../publicView/faqView.php";
            break;
            
        case "admin":
            include_once "../publicView/adminView.php";
            break;
        
        default:
            include_once "../publicView/404View.php";
            
    }
}

