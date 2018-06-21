
<?php 
    include('../inc/pre-header.php'); 

    include("config.php");

    try{
        $bdd = new PDO("mysql:host=$dbHost;dbname=$dbBdd;charset=utf8", $dbUser, $dbPass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $lettre = $_GET['lettre'];

    $request = "SELECT * FROM alphabet WHERE `lettre`= '$lettre' ";
    $a = $bdd->prepare($request);
    $a->execute();
    $data = $a->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // print_r ($data);
    // echo '</pre>';
    
?>


<header>
   <div class="logo"></div>
</header>


<div class="wrapper">
    <div class="back">
        <a href="http://6abcd.gslab.fr">Retour à l'accueil</a>
    </div>

    <div class="container-img">

<?php
   

    foreach($data as $value){
        echo "<img src='/img/{$value['thumbnail']}' class='vignette' data-show-id='{$value['id']}'>";
    }
    ?>

<!--     
    <div class="vignette"><img src="../img/apple-mot.jpg" alt="" data-show-id="1"></div>
    <div class="vignette"><img src="../img/apricot-mot.jpg" alt="" data-show-id="2"></div>
    <div class="vignette"><img src="../img/arm-mot.jpg" alt="" data-show-id="3"></div> -->
        
    </div>
</d iv>


<div class="frame-img">

<?php

foreach($data as $value){
    echo "<img src='/img/{$value['image']}' data-basiclightbox data-id='{$value['id']}'>";
}

?>

     <!-- <img src="../img/apple-image.jpg" alt="" data-basiclightbox data-id="1">
     <img src="../img/apricot-image.jpg" alt="" data-basiclightbox data-id="2">
     <img src="../img/arm-image.jpg" alt="" data-basiclightbox data-id="3"> -->

</div>

 <!-- Début footer -->
 <?php include('../inc/footer.php'); ?>
 <!-- Fin footer -->