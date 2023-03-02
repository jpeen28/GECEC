<?php
require "session.php";
require "dbconnexion.php";

$stmt = $pdo->query("SELECT COALESCE  (COUNT(sexe),0) FROM nouveauoec WHERE sexe ='Masculin'");
$ada = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (COUNT(sexe),0) FROM nouveauoec WHERE sexe ='Feminin'");
$centre = $stmt->fetchColumn();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>GECEC MINDDEVEL | Tableau de Bord OEC</title>
</head>

<div class="img js-fullheight" style="background-image: url(img/img1.jpg);">
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
        <div class="title-dashboard">TABLEAU DE BORD DES OFFICIERS ETAT CIVIL
        </div>
           <div class="graphe-dashboard">
                <div class="naissance">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Masculin', <?php echo $ada;?>],
                        ['Feminin', <?php echo $centre;?>],          
                        ]);

                        var options = {
                        title: 'SEXE',
                        is3D: true,
                        };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart_3d" style="width:48vw; height: 47vh;"></div>
                </div>

                <div class="act-naiss">

                <?php  
                    $stmt = $pdo->query("SELECT COALESCE  (COUNT(poste),0) FROM nouveauoec WHERE poste ='officier'");
                    $ada = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (COUNT(poste),0) FROM nouveauoec WHERE poste ='secretaire'");
                    $centre = $stmt->fetchColumn();
                ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Regions', 'Naissance par region'],
                        ['Officier ', <?php echo $ada;?>],
                        ['Secretaire', <?php echo $centre;?>],
                       
                        ]);

                        var options = {
                        title: 'Poste Officier Etat Civil',
                        pieHole: 0.4,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donutchart" style="width: 48vw; height: 47vh;"></div>
                </div>

           </div>
           <div class="graphe-dashboard">
            <div class="mariage">
                    <?php  
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='bepc'");
                        $bepc = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='probatoire'");
                        $probatoire = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='baccalaureat'");
                        $bac = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='licence'");
                        $licence = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='master 1'");
                        $master = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='master 2'");
                        $master2 = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (COUNT(diplome),0) FROM nouveauoec WHERE diplome ='doctorat'");
                        $doctorat = $stmt->fetchColumn();
                        
                    ?>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Regions', 'Mariage par region'],
                            ['BEPC', <?php echo $bepc;?>],
                            ['PROBATOIRE', <?php echo $probatoire;?>],
                            ['BACCALAUREAT', <?php echo $bac;?>],
                            ['LICENCE', <?php echo $licence;?>],
                            ['MASTER 1', <?php echo $master;?>],
                            ['MASTER 2', <?php echo $master2;?>],
                            ['DOCTORAT', <?php echo $doctorat;?>],
                        ]);

                        var options = {
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        title:'Niveau Etude'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donut_single" style="width:48vw; height: 49vh;"></div>
                </div>
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