<?php
   require_once("dbconnexion.php");
    
    $codenew = $_POST["coden"];
    $region = $_POST["region"];
    $departement = $_POST["departement"];
    $arr = $_POST["ctd"];
    $cec = $_POST["cec"];
    $nomcec = $_POST["centre"];
    $piece = $_POST["arrete"];

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sthcec = $dbco->prepare("
            INSERT INTO cec(code, code_region, code_cec, libelle, localite)
            VALUES( :coden, :region,  :ctd, :cec, :centre)"
        );


        $sthcec->bindParam(':coden',$codenew);
        $sthcec->bindParam(':region',$region);
        $sthcec->bindParam(':ctd',$arr);
        $sthcec->bindParam(':cec',$cec);
        $sthcec->bindParam(':centre',$nomcec);
       
        $sthcec->execute();
        header("Location:nouveau_cec-check.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>

<?php
    $codenew = $_POST["coden"];
    $region = $_POST["region"];
    $departement = $_POST["departement"];
    $arr = $_POST["ctd"];
    $cec = $_POST["cec"];
    $nomcec = $_POST["centre"];
    $piece = $_POST["arrete"];

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbco->prepare("
            INSERT INTO nouveaucec(code, code_region, code_cec, rattachement, localite, pieces)
            VALUES( :coden, :region,  :ctd, :cec, :centre, :arrete)"
        );


        $sth->bindParam(':coden',$codenew);
        $sth->bindParam(':region',$region);
        $sth->bindParam(':ctd',$arr);
        $sth->bindParam(':cec',$cec);
        $sth->bindParam(':centre',$nomcec);
        $sth->bindParam(':arrete',$piece);
       
        $sth->execute();
        header("Location:nouveau_cec-check.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>