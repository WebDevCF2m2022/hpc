<?php

require_once "../view/publicView/accueilView.php";


if (isset ($_Get['p'])){

    switch ($_Get['p']){

        case "acceuil":
            include_once "../publicView/acceuilView.php";
            break;

        case "service":
            include_once "../publicView/serviceView.php";
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
            include_once "../publicView/404Error.php";
            
    }
}

