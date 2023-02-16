<?php
require "dbconnexion.php";
require "session.php";
$bdd = new PDO('mysql:host=localhost;dbname=minddevel;', 'root', '');
$sql = $bdd->query('select *  from nouveauoec');
if(isset($_GET['region'])){
    $coderegion = htmlspecialchars($_GET['region']);
    $sql = $bdd->query("SELECT * FROM nouveauoec where region = '$coderegion'");
}
if(isset($_GET['sexe'])){
    $sexe = htmlspecialchars($_GET['sexe']);
    $sql = $bdd->query("SELECT * FROM nouveauoec where sexe = '$sexe'");
}
if(isset($_GET['diplome'])){
    $diplome = htmlspecialchars($_GET['diplome']);
    $sql = $bdd->query("SELECT * FROM nouveauoec where diplome = '$diplome'");
}
if(isset($_GET['poste'])){
    $poste = htmlspecialchars($_GET['poste']);
    $sql = $bdd->query("SELECT * FROM nouveauoec where poste = '$poste'");
}

$stmt = $pdo->query("SELECT * FROM region");
$regions = $stmt->fetchAll();


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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>GECEC MINDDEVEL | Historique OEC</title>
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
    <div class="home-content">
        <div class="title-dashboard">HISTORIQUE DE NOMINATION DES OFFICIERS D'ETAT CIVIL
            <a href="dashboardoec.php" title="Tableau de bord"><img src="img/tableau-de-bord.png" class="img-next"></a>
        </div>

        <div class="search-zone">
            <form action="" class="search-oec" method='get'>
                <div class="form-search">
                    <select name="region" id="region"  onChange="this.form.submit();">
                        <option value disabled selected>Selectionner Region</option>
                        <?php foreach ($regions as $region) { ?>
                                <option value="<?= $region['code_region'] ?>"><?= $region['FR'] ?></option>
                            <?php }?>
                    </select>
                        <select id="input-cec" name="sexe" onChange="this.form.submit();">
                            <option value disabled selected>Sexe</option>
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select>

                        <select id="input-cec" name="diplome" onChange="this.form.submit();">
                            <option value disabled selected>Diplome</option>
                            <option value="BEPC">BEPC</option>
                            <option value="PROBATOIRE">PROBATOIRE</option>
                            <option value="BACCALAUREAT">BACCALAUREAT</option>
                            <option value="LICENCE">LICENCE / BACC + 3</option>
                            <option value="MASTER 1">MASTER 1 / BACC + 4</option>
                            <option value="MASTER 2">MASTER 2 / BACC + 5</option>
                            <option value="DOCTORAT">DOCTORAT</option>
                        </select>
                        <select id="input-cec" name="poste" onChange="this.form.submit();">
                            <option value disabled selected>Poste</option>
                            <option value="Officier">Officier</option>
                            <option value="Secretaire">Secretaire</option>
                        </select>
                </div>
            </form>
        </div>
        <button class='btn-print'>
            <a href="fpdf/historique_oec.php" id='btn-print'>Imprimer</a>
        </button>


        <div class="Scroll">
            <table class="table table-striped bg-tableau ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Region</th>
                    <th scope="col">Departement</th>
                    <th scope="col">arrondissement</th>
                    <th scope="col">Localite</th>
                    <th scope="col">Nom Officer</th>
                    <th scope="col">Date Naissance</th>
                    <th scope="col">Age</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Lieu Naissance</th>
                    <th scope="col">Diplome</th>
                    <th scope="col">Poste</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Arrete</th>
                    <th scope="col">Modifier / Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       
                        if($sql->rowCount() > 0){
                        while($user = $sql->fetch()){
                    ?>
                        <tr>
                        <td><?= $user['id'];?></td>
                        <td><?=  $user['region'];?></td>
                        <td><?= $user['departement'];?></td>
                        <td><?= $user['arrondissement'];?></td>
                        <td><?= $user['localite'];?></td>
                        <td><?= $user['nomoec'];?></td>
                        <td><?= $user['datenaissance'];?></td>
                        <?php
                            $dateNaissance = $user['datenaissance'];
                            $aujourdhui = date("Y-m-d");
                            $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                            $age=($diff->format('%y')); 
                        ?>
                        <td><?=$age. 'ans'?></td>
                        <td><?= $user['sexe'];?></td>
                        <td><?= $user['lieunaissance'];?></td>
                        <td><?= $user['diplome'];?></td>
                        <td><?= $user['poste'];?></td>
                        <td><?= $user['reference'];?></td>
                        <td><?= $user['arrete'];?></td>
                        <td>
                            <a href="fpdf/ficheoec.php?id=<?= $user['id'] ?>" ><img src="./img/printer.png" style="width:20px" title="imprimer"></a>
                            <a href="modifier.php?id=<?= $user['id'] ?>" ><img src="./img/pen.png" style="width:20px" title="modifier"></a>
                            <a onclick="return confirm('Voulez vous vraiment supprimer cette information ?')" href="supprimer.php?id=<?= $user['id'] ?>"><img src="./img/delete.png" style="width:20px;" title="supprimer"></a>
                        </td>
                        </tr>
                    <?php
                    }
                    }
                    else{
                    ?>
                    <p class="result-search">Aucun resultat trouvé</p>
                    <?php
                    }
                    ?>
                        
                </tbody>
            <!-- </table> -->
        
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