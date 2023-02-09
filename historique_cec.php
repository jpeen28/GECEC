<?php
require "dbconnexion.php";
require "session.php";
$bdd = new PDO('mysql:host=localhost;dbname=minddevel;', 'root', '');
$sql = $bdd->query('select *  from nouveaucec');
if(isset($_GET['region'])){
    $coderegion = htmlspecialchars($_GET['region']);
    $sql = $bdd->query("SELECT * FROM nouveaucec where code_region = '$coderegion'");
}
if(isset($_GET['code'])){
    $code = htmlspecialchars($_GET['code']);
    $sql = $bdd->query("SELECT * FROM nouveaucec where code = '$code'");
}
if(isset($_GET['nomcentre'])){
    $localite = htmlspecialchars($_GET['nomcentre']);
    $sql = $bdd->query("SELECT * FROM nouveaucec where localite = '$localite'");
}
if(isset($_GET['etat'])){
    $etat = htmlspecialchars($_GET['etat']);
    $sql = $bdd->query("SELECT * FROM nouveaucec where etat = '$etat'");
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
                <a href="historique_cec.php">
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
        <div class="title-dashboard">HISTORIQUE DE CREATION DES CENTRES D'ETAT CIVIL
        </div>

        <div class="search-zone">
            <form action="" class="search-oec" method='get'>
                <div class="form-search">
                    <select name="etat" id="input-cec"  onChange="this.form.submit();">
                        <option value disabled selected>Etat du Centre</option>
                        <option value="Fonctionnel">Fonctionnel</option>
                        <option value="Non Fonctionnel">Non Fonctionnel</option>
                    </select>
                    <select name="region" id="region"  onChange="this.form.submit();">
                        <option value disabled selected>Selectionner Region</option>
                        <?php foreach ($regions as $region) { ?>
                                <option value="<?= $region['code_region'] ?>"><?= $region['FR'] ?></option>
                            <?php }?>
                    </select>
                </div>
            </form>
            <form action="" class="search-oec" method='get'>
                <div class="form-search">
                    <input id="input-cec" name="code" onChange="this.form.submit();" placeholder="Code du centre">
                    <input id="input-cec" name="nomcentre" onChange="this.form.submit();" placeholder="Nom du centre">
                </div>
            </form>
        </div>
        <button class='btn-print'>
            <a href="fpdf/historique_cec.php" id='btn-print'>Imprimer</a>
        </button>


        <div class="Scroll">
            <table class="table table-striped bg-tableau ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Region</th>
                    <th scope="col">Departement</th>
                    <th scope="col">arrondissement</th>
                    <th scope="col">Centre de Rattachement</th>
                    <th scope="col">Nom du Centre</th>
                    <th scope="col">Coordonnees</th>
                    <th scope="col">Etat</th>
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
                        <td><?=   $user['code'];?></td>
                        <td><?= $user['code_region'];?></td>
                        <td><?= $user['departement'];?></td>
                        <td><?= $user['code_cec'];?></td>
                        <td><?= $user['rattachement'];?></td>
                        <td><?= $user['localite'];?></td>
                        <td><?= $user['coordonnees'];?></td>
                        <td><?= $user['etat'];?></td>
                        <td><?= $user['pieces'];?></td>
                        <td>
                            <a href="details-cec.php?id=<?= $user['id'] ?>" ><img src="./img/info.png" style="width:20px" title="imprimer"></a>
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