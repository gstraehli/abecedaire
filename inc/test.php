<?php
    require_once("config.php");

    try{
        $bdd = new PDO("mysql:host=$dbHost;dbname=$dbBdd;charset=utf8", $dbUser, $dbPass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = "SELECT * FROM alphabet WHERE `lettre`= 'A' ";
    $a = $bdd->prepare($request);
    $a->execute();
    $data = $a->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r ($data);
    echo '</pre>';

    foreach($data as $key=>$value){
        echo "<img src='/img/{$value['image']}'>";
    }
    
    