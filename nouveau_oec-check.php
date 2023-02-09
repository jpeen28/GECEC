<?php
   require_once("dbconnexion.php");
    
    $region = $_POST["region"];
    $departement = $_POST["departement"];
    $arrondissement = $_POST["ctd"];
    $localite = $_POST["cec"];
    $nomoec = $_POST["nomoec"];
    $datenaissance = $_POST["datenaissance"];
    $lieunaissance = $_POST["lieunaissance"];
    $sexe = $_POST["sexe"];
    $diplome = $_POST["diplome"];
    $poste = $_POST["poste"];
    $reference = $_POST["reference"];
      $arrete = $_POST["arrete"];
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sthcec = $dbco->prepare("
            INSERT INTO nouveauoec(region, departement, arrondissement, localite, nomoec, datenaissance, lieunaissance, sexe, diplome, poste, reference, arrete)
            VALUES( :region, :departement,  :ctd, :cec, :nomoec, :datenaissance, :lieunaissance, :sexe, :diplome, :poste, :reference, :arrete )"
        );


        $sthcec->bindParam(':region',$region);
        $sthcec->bindParam(':departement',$departement);
        $sthcec->bindParam(':ctd',$arrondissement);
        $sthcec->bindParam(':cec',$localite);
        $sthcec->bindParam(':nomoec',$nomoec);
        $sthcec->bindParam(':datenaissance',$datenaissance);
        $sthcec->bindParam(':lieunaissance',$lieunaissance);
        $sthcec->bindParam(':sexe',$sexe);
        $sthcec->bindParam(':diplome',$diplome);
        $sthcec->bindParam(':poste',$poste);
        $sthcec->bindParam(':reference',$reference);
        $sthcec->bindParam(':arrete',$arrete);
        $sthcec->execute();
        header("Location:nouveau_oec.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>

