<?php
    require_once("dbconnexion.php");

    if(isset($_POST['code_region'])) {
        $code_region = $_POST['code_region'];

        $stmt = $pdo->prepare("SELECT * FROM departements WHERE code_region=:code_region");
        $stmt->execute(['code_region' => $code_region]);
        $departements = $stmt->fetchAll();
        echo"<option value disabled selected >Selectionner un departement</option>";

        foreach($departements as $departement) {
            echo "<option value='". $departement["code_dept"] ."'>". $departement["dept"] ."</option>";
        }
    }

    if(isset($_POST['code_dept']) && ($_POST['region'])) {
        $code_dept = $_POST['code_dept'];
        $code_region = $_POST['region'];
        
        $stmt = $pdo->prepare("SELECT * FROM ctd WHERE code_region=:region AND code_dept=:code_dept");
        $stmt->execute(['region' => $code_region , 'code_dept' => $code_dept ]);
        $ctds = $stmt->fetchAll();

        echo"<option value disabled selected>Arrondissement</option>";
        foreach($ctds as $ctd) {
            echo "<option value='". $ctd["code_cec"] ."'>". $ctd["FR"] ."</option>";
        }

    }

    if(isset($_POST['code_ctd']) && ($_POST['region'])) {
        $code_dept = $_POST['code_ctd'];
        $code_region = $_POST['region'];
        $stmt = $pdo->prepare("SELECT * FROM cec WHERE code_region=:region AND code_cec=:code_cec");
        $stmt->execute(['region' => $code_region ,'code_cec' => $code_dept ]);
        $cecs = $stmt->fetchAll();
        echo"<option value disabled selected>Centre d'Etat Civil</option>";
        foreach($cecs as $cec) {
            echo "<option value='". $cec["libelle"] ."'>". $cec["localite"] ."</option>";
        }

    }

    if(isset($_POST['numero']) && ($_POST['region'])) {
        $code_dept = $_POST['numero'];
        $code_region = $_POST['region'];
        $stmt = $pdo->prepare("SELECT COUNT(*)+1 FROM cec WHERE code_region=:region AND libelle=:libelle");
        $stmt->execute(['region' => $code_region ,'libelle' => $code_dept ]);
        $count = $stmt->fetchAll();
        echo"<option value disabled selected>Indice du code</option>";
        foreach($count as $counted) {

            $str = "" . $counted["COUNT(*)+1"];
            while(strlen($str) < 2)
            $str = "0" . $str;

            echo "<option value='". $str ."'>". $str ."</option>";
        }
       
        

    }


    


    