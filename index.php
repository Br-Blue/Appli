<?php
    //CECI EST LE FRONT CONTROLLER !
    //C'est le seul fichier de dialogue avec l'utilisateur
    require "vendor/autoload.php";

    use App\Service\RouterService;

    session_start();    
    /**
     * $response est le retour du contrôleur nécessaire à la requète du client
     */
    $response = RouterService::handleRequest($_GET);

/*-----CHARGEMENT DE LA REPONSE AU CLIENT-----*/
    include "template/store/".$response["view"];