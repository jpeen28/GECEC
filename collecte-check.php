<?php
   require_once("dbconnexion.php");
    
    $code = $_POST["code"];
    $etat = $_POST["etat"];
    $regnaissance = $_POST["regnaissance"];
    $regmariage = $_POST["regmariage"];
    $regdeces = $_POST["regdeces"];
    $regparaphe = $_POST["regparaphe"];
    $regclot = $_POST["regclot"]; 
    $actnais = $_POST["nbractnai"]; 
    $actmar = $_POST["nbractmar"];
    $actdec = $_POST["nbractdec"];  
    $observation = $_POST["observation"]; 
 
 

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sthcec = $dbco->prepare("
            INSERT INTO statistique(code, fonctionnel, nbrregnais, nbrregmar, nbrregdec, nbrregpara, nbrregclot, nbractnai, nbractmar, nbractdec, commentaire)
            VALUES( :code, :etat, :regnaissance, :regmariage, :regdeces, :regparaphe, :regclot, :nbractnai, :nbractmar, :nbractdec, :observation)"
        );


        $sthcec->bindParam(':code',$code);
        $sthcec->bindParam(':etat',$etat);
        $sthcec->bindParam(':regnaissance',$regnaissance);
        $sthcec->bindParam(':regmariage',$regmariage);
        $sthcec->bindParam(':regdeces',$regdeces);
        $sthcec->bindParam(':regparaphe',$regparaphe);
        $sthcec->bindParam(':regclot',$regclot);
        $sthcec->bindParam(':nbractnai',$actnais);
        $sthcec->bindParam(':nbractmar',$actmar);
        $sthcec->bindParam(':nbractdec',$actdec);
        $sthcec->bindParam(':observation',$observation);
      
      
        
    
        $sthcec->execute();
        header("Location:collecte.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
