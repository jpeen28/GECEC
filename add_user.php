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
    <link rel="stylesheet" href="css/tableau.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>GECEC MINDDEVEL | Nouveau utilisateur</title>
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

        <div class="title-dashboard">AJOUTER UN UTILISATEUR
        </div>
        <div class="user-form">
            <div class="add-user">
                <form action="add-user-check.php" class="user-form" method="post" enctype="multipart/form-data">
                    <div class="user">
                        <div class="elmtuser">
                            <label for="">Identifiant</label>
                            <input type="text" class="user-details" name="identifiant" placeholder="Identifiant">
                        </div>
                        <div class="elmtuser">
                            <label for="">Mot de passe</label>
                            <input type="password" class="user-details" name="password" placeholder="Mot de passe">
                        </div>
                   </div>
                   <div class="user">
                        <div class="elmtuser">
                            <label for="">Nom</label>
                            <input type="text" class="user-details" name="nom" placeholder="Saisir le Nom">
                        </div>
                        <div class="elmtuser">
                            <label for="">Prenom</label>
                            <input type="text" class="user-details" name="prenom" placeholder="Saisir le Prenom">
                        </div>
                   </div>

                   <div class="user">
                        <div class="elmtuser">
                            <label for="">Sexe</label>
                            <select type="text" class="user-details" name="sexe">
                                <option disabled selected>Sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
                        <div class="elmtuser">
                            <label for="">Role</label>
                            <select type="text" class="user-details" name="role">
                                <option value disabled selected>Role Utilisateur</option>
                                <option value="">Administrateur</option>
                                <option value="">Regional</option>
                                <option value="">Departemental</option>
                                <option value="">Arrondissement</option>
                                <option value="">Commmunal</option>
                            </select>
                        </div>
                   </div>
    
                    <div class="elmtnature">
                        <label for="" class="nature-title">Nature</label>
                        <div class="nature-user">
                            <div class="radio-user">
                                <input type="radio">
                                <label for="Region">Region</label>
                            </div>
                            <div class="radio-user">
                                <input type="radio">
                                <label for="Region">Departement</label>
                            </div>
                            <div class="radio-user">
                                <input type="radio">
                                <label for="Region">Arrondissement</label>
                            </div>
                            <div class="radio-user">
                                <input type="radio">
                                <label for="Region">Commune</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="user">
                        <div class="elmtuser">
                            <label for="">Poste</label>
                            <input type="text" class="user-details" name="poste" placeholder='Poste'>
                        </div>
                        <div class="elmtuser">
                            <label for="">Profil</label>
                            <input type="file" class="user-details" name="profil" placeholder="Photo de profil">
                        </div>
                   </div>

                   <div class="btn-add-user">
                        <input type="reset" value="Annuler" id="btn-reset">
                        <input type="submit" value="Sauvegarder" id="btn-sub">
                   </div>
                </form>
            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
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