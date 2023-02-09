<?php
require 'dbconnexion.php';
    $poste = $_POST["poste"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];
    $sexe = $_POST["sexe"];
    $profil = $_POST["profil"];
    $identifiant = $_POST["identifiant"];
    $password = md5($_POST["password"]);
 
 

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $dbco->prepare("
            INSERT INTO user(poste, nom, prenom, role, sexe, photo, identifiant, password)
            VALUES( :poste, :nom, :prenom, :role, :sexe, :profil, :identifiant, :password)"
        );


        $sth->bindParam(':poste',$poste);
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':role',$role);
        $sth->bindParam(':sexe',$sexe);
        $sth->bindParam(':profil',$profil);
        $sth->bindParam(':identifiant',$identifiant);
        $sth->bindParam(':password',$password);
       
       
       
       
        $sth->execute();
        header("Location:add_user.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>