<?php
    session_start();    
    require_once "MessageService.php";//j'intègre le code présent dans MessageService.php ici
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Ajout produit</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>

        <form action="traitement.php?action=add" method="post">
            <h1>Ajouter un produit</h1>
            <p>
                <label>Nom du produit&nbsp;: </label>
                <input type="text" name="name">
            </p>
            <p>
                <label>Prix du produit&nbsp;: </label>
                <input type="number" step="any" name="price">
            </p>
            <p>
                <label>Quantité désirée&nbsp;:  </label>
                <input type="number" name="qtt" value="1">
            </p>
            <p class="submit-row">
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>
        
    </body>
</html>