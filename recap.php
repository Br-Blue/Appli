<?php
    session_start();
    require_once "MessageService.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>

        <?php
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>";
            }
            else{
                echo "<table id='recap'>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                $totalGeneral = 0;
                foreach($_SESSION['products'] as $index => $product){
                    echo "<tr>",
                            "<td class='text-center'><a href='traitement.php?action=delete&index=$index'>&times;</a></td>",
                            "<td>".$product['name']."</td>",
                            "<td class='text-right'>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td class='text-center'>".$product['qtt']."</td>",
                            "<td class='text-right'>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "</tr>";
                    $totalGeneral+= $product['total'];
                }
                echo "<tr>",
                        "<td colspan=4>Total général : </td>",
                        "<td class='text-right'><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
                "</table>";

                echo "<a href='traitement.php?action=clear'>Vider le panier</a>";
            }
        ?>
    </body>
</html>