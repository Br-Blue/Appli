<?php

    $pdo = new PDO(
        "mysql:host=localhost:3306;dbname=appli",
        "root",
        "",
        [
            PDO:ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //les erreurs venant de MySQL seront des Exception
            PDO:ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on récupère les données de MySQL dans un tableau associatif 
            //ex : ['name' => 'Biscuit', 'price' => 25.5]
        ]
    );

    try{
        $sql = "SELECT * FROM product";

        $statement = $pdo->query($sql);
        $results = $statement->fetchll();

        var_dump($results);
    }
    catch(PDOException $error){
        echo $error->getMessage();
    }