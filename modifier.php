<?php
require 'dbconnexion.php';
require "session.php";

$stmt = $pdo->query("SELECT * FROM region");
$regions = $stmt->fetchAll();

$bdd = new PDO('mysql:host=localhost;dbname=minddevel;', 'root', '');
$sql = $bdd->query("SELECT nom_region, datecreation, cec.code, region.code_region, localite, nbrregnais, nbrregmar, nbrregdec, nbrregpara, nbrregclot, nbractmar, nbractnai, nbractdec, fonctionnel, commentaire FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code where true");

if(isset($_GET['region'])){
    $region = htmlspecialchars($_GET['region']);
    $sql = $bdd->query("SELECT statistique.id, datecreation, cec.code, region.code_region, localite, nbrregnais, nbrregmar, nbrregdec, nbrregpara, nbrregclot, nbractmar, nbractnai, nbractdec, fonctionnel, commentaire FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code  WHERE region.code_region = '$region' ");
}

if(isset($_GET['localite'])){
    $etat = htmlspecialchars($_GET['localite']);
    $sql = $bdd->query("SELECT * FROM statistique INNER JOIN cec ON statistique.code=cec.code where cec.localite  ='$etat'");
}
$stmt = $pdo->query("SELECT SUM(nbrregnais) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbrregmar) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme2 = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbrregdec) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme3 = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbrregpara) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme4 = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbrregclot) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme5 = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbractmar) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme7 = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT SUM(nbractnai) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme6 = $stmt->fetchColumn();


$stmt = $pdo->query("SELECT SUM(nbractdec) FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'");
$somme8 = $stmt->fetchColumn();

?> 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tableau.css">
    <title>GECEC MINDDEVEL | Collecte</title>
</head>

<body class="img js-fullheight" style="background-image: url(img/img1.jpg);">
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">GECEC MINDDEVEL</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="dashboard.php">
                    <i class='bx bxs-grid-alt'></i>
                    <span class="links_name">Tableau de Bord</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Dashboard</span>
            </li>
            <?php if($_SESSION['user']['role']=="collecteur"){?>
            <li>
                <a href="collecte.php">
                    <i class='bx bxs-pen'></i>
                    <span class="links_name">Collecte</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Collecte</span>
            </li>
            <?php } ?>
            <?php if($_SESSION['user']['role']=="administrateur"){?>
            <li>
                <a href="nouveau_cec.php">
                    <i class='bx bx-plus'></i>
                    <span class="links_name">Nouveau CEC</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Nouveau CEC</span>
            </li>
            <?php } ?>
            <?php if($_SESSION['user']['role']=="administrateur"){?>
            <li>
                <a href="nouveau_oec.php">
                    <i class='bx bx-plus'></i>
                    <span class="links_name">Nouveau OEC</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Nouveau OEC</span>
            </li>
            <?php } ?>
            <?php if($_SESSION['user']['role']=="administrateur" || $_SESSION['user']['role']=="departement" || $_SESSION['user']['role']=="region"){?>
            <li>
                <a href="cartectd.php">
                    <i class='bx bx-map'></i>
                    <span class="links_name">Carte CTD</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Carte CTD</span>
            </li>
            <?php } ?>
            <li>
                <a href="historique_collecte.php">
                    <i class='bx bx-edit'></i>
                    <span class="links_name">Edition</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Edition</span>
            </li>
    
            <?php if($_SESSION['user']['role']=="administrateur" ){?>
            <li>
                <a href="utilisateur.php">
                    <i class='bx bxs-user'></i>
                    <span class="links_name">Utilisateurs</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Utilisateurs</span>
            </li>
            <?php } ?>
            <li>
                <a href="parametres.php">
                    <i class='bx bxs-cog'></i>
                    <span class="links_name">Parametres</span>
                </a>
                <!-- Tooltip -->

                <span class="tooltip">Parametres</span>
            </li>
        </ul>

        <div class="profile-content">
            <div class="profile">
                <div class="profile-details">
                    <img src="img/cmr.png" alt="">
                    <div class="name-job">
                        <div class="name">GECEC</div>
                        <div class="job">MINDDEVEL</div>
                    </div>
                </div>
                <a href="deconnexion.php"><i class='bx bx-log-out' id="log-out" title="deconnexion"></i></a>
            </div>
        </div>
    </div>
    <div class="home-content ">
        <div class="title-dashboard">HISTORIQUES DES COLLECTES REGION  <?php $stmt = $pdo->query("SELECT DISTINCT nom_region FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$region'"); $zu = $stmt->fetchColumn();print_r($zu);?> 
        </div>
        <button class='btn-print'>
            <a href="fpdf/regionale.php?region=<?= $region ?>" id='btn-print'>Imprimer</a>
        </button>
        <div class="Scroll">
            <table class="table table-striped bg-tableau ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                        <th scope="col">Date Enregistrement</th>
                        <th scope="col">Localite</th>
                        <th scope="col">Code</th>
                        <th scope="col">Reg.Naissance</th>
                        <th scope="col">Reg.Mariage</th>
                        <th scope="col">Reg.Deces</th>
                        <th scope="col">Reg.Paraphe</th>
                        <th scope="col">Reg.Cloture</th>
                        <th scope="col">Acte Naissance</th>
                        <th scope="col">Acte Mariage</th>
                        <th scope="col">Acte Deces</th>
                        <th scope="col">Observation</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($sql->rowCount() > 0){
                        while($user = $sql->fetch()){
                    ?>
                        <tr>
                            <td><?= $user['id'];?></td>
                            <td><?= $user['datecreation'];?></td>
                            <td><?= $user['localite'];?></td>
                            <td><?= $user['code'];?></td>
                            <td><?= $user['nbrregnais'];?></td>
                            <td><?= $user['nbrregmar'];?></td>
                            <td><?= $user['nbrregdec'];?></td>
                            <td><?= $user['nbrregpara'];?></td>
                            <td><?= $user['nbrregclot'];?></td>
                            <td><?= $user['nbractnai'];?></td>
                            <td><?= $user['nbractmar'];?></td>
                            <td><?= $user['nbractdec'];?></td>
                            <td><?= $user['commentaire'];?></td>
                            <td><?= $user['fonctionnel'];?></td>
                            <td class="action-tab">
                                <a href="mise_a_jour.php?code=<?= $user['code'] ?>" ><img src="./img/info.png" style="width:20px" title="Details"></a>
                                <a onclick="return confirm('Voulez vous vraiment supprimer cette information ?')" href="supprimer.php?id=<?= $user['id'] ?>"><img src="./img/delete.png" style="width:20px;" title="supprimer"></a>
                            </td>
                        </tr>
                    <?php
                    }
                    }
                    else{
                    ?>
                    <p>Aucun resultat trouve</p>
                    <?php
                    }
                    ?>
                        
                </tbody>
            </table>
        
        </div> 
    </div>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchbtn = document.querySelector(".bx-search");

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        searchbtn.onclick = function() {
            sidebar.classList.toggle('active');
        }
    </script>
</body>

</html>