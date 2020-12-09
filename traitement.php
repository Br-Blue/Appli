<?php
    session_start();
    require_once "MessageService.php";

    if(isset($_GET['action'])){

        switch($_GET['action']){
            //ajout de produit
            case "add": 
                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
                        
                        $product = [
                            "name"  => $name,
                            "price" => $price,
                            "qtt"   => $qtt,
                            "total" => $price*$qtt
                        ];
                        MessageService::setMessage("success", "Produit ajouté avec succès !!");
                        $_SESSION['products'][] = $product;
                    }
                    else MessageService::setMessage("error", "Formulaire mal rempli, réessayez !");
                }
                else MessageService::setMessage("error", "Vous n'avez pas soumis le formulaire...");
                header("Location:index.php");
                die;

            //supprimer un produit avec son index
            case "delete":
                if(isset($_SESSION['products'][$_GET['index']])){
                    $indexProduit = $_GET['index'];
                    unset($_SESSION['products'][$indexProduit]);
                    MessageService::setMessage("success", "Produit supprimé avec succès !!");
                }
                else MessageService::setMessage("error", "Le produit demandé n'existe pas...");
                break;

            //vider la session
            case "clear": 
                if(!empty($_SESSION['products'])){
                    unset($_SESSION['products']);
                    MessageService::setMessage("success", "Liste des produits effacée !!");
                }
                break;
                
        }//fin du switch
        //dans le cas où l'action n'a redirigé nulle part
        header("Location:recap.php");
        die;
    }
    //on redirige vers index dans ces deux cas de figure : 
    // - soit on est arrivé ici sans $_GET['action']
    // - soit on a une $_GET['action'] qui ne correspond à aucune action prévue
    header("Location:index.php");    
    