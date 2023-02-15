<?php
require "session.php";
require "dbconnexion.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>GECEC MINDDEVEL | Mise a jour</title>
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


    <div class="card-form" id="card-form">
        <?php 
        $id = $_GET['code'];
        $stmt = $pdo->prepare("SELECT * FROM statistique INNER JOIN cec ON statistique.code=cec.code where cec.code = '$id'");
        $stmt->execute([':code' => $id ]);
        $collecte = $stmt->fetchObject();
        if (isset ($_POST['regnais'])  && isset($_POST['regmariage']) && isset($_POST['regdeces']) && isset($_POST['regparaphe']) && isset($_POST['regcloture']) && isset($_POST['naissance']) && isset($_POST['mariage']) && isset($_POST['observation']) ) {
            $regnaissance = $_POST['regnaissance'];
            
            $sql = "UPDATE statistique SET regnaissance=:nbrregnais WHERE code=:'$id'";
            $statement = $connection->prepare($sql);
            if ($statement->execute([':nbrregnais' => $regnaissance, ])) {
              header("Location:dashboard.php");
            }
          }
        ?>
        <h3 class="card-title">Details des informations</h3>
        <form action="" class="card-collecte" method="post">
            <div class="card-details">
                <div class="card-desc">
                    <label for="">Code Region</label>
                    <input type="text" disabled id="card-css" value="<?= $collecte->code;?>">
                </div>
                <div class="card-desc">
                    <label for="">Localite</label>
                    <input type="text" disabled id="card-css" value="<?= $collecte->localite;?>">
                </div>
            </div>

            <div class="card-detail-info">
                <div class="card-desc">
                    <label for="">Nombre Registre Naissance</label>
                    <input type="text"  id="card-css" value="<?= $collecte->nbrregnais;?>" name="regnaissance">
                </div>
                <div class="card-desc">
                    <label for="">Nombre Registre Mariage</label>
                    <input type="text"  id="card-css" value="<?= $collecte->nbrregmar;?>" name="regmariage">
                </div>
                <div class="card-desc">
                    <label for="">Nombre Registre Deces</label>
                    <input type="text"  id="card-css" value="<?= $collecte->nbrregdec;?>" name="regdeces">
                </div>
            </div>
            <div class="card-detail-info">
                <div class="card-desc">
                    <label for="">Nombre Registre Paraphe</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->nbrregpara;?>" name="regparaphe">
                </div>
                <div class="card-desc">
                    <label for="">Nombre Registre Cloture</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->nbrregclot;?>" name="regcloture">
                </div>
                <div class="card-desc">
                    <label for="">Nombre Acte Naissance</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->nbractnai;?>" name="naissance">
                </div>
            </div>
            <div class="card-detail-info">
                <div class="card-desc">
                    <label for="">Nombre Acte Mariage</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->nbractmar;?>" name="mariage">
                </div>
                <div class="card-desc">
                    <label for="">Nombre Acte Deces</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->nbractdec;?>" name="deces">
                </div>
                <div class="card-desc">
                    <label for="">Commentaire</label>
                    <input type="text"  id="card-css"  value="<?= $collecte->commentaire;?>" name="observation">
                </div>
            </div>

            <div class="card-btn">
                <input type="reset" value="Annuler" id="card-btn-cancel">
                <input type="submit" value="Mettre a jour" id="card-btn-upd">
            </div>


        </form>
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