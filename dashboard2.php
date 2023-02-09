<?php
require "session.php";
require "dbconnexion.php";

$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
$ada = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
$centre = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
$est = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
$ext = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
$litto = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
$nord = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
$nord_ou = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
$ouest = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
$sud = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
$sud_ou = $stmt->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>GECEC MINDDEVEL | Tableau de Bord</title>
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
        <div class="title-dashboard">TABLEAU DE STATISTIQUE DES COLLECTES 2 / 2
            <a href="dashboard.php" title="Precedent"><img src="img/previous.png" class="img-next"></a>
        </div>
           <div class="graphe-dashboard">
                <div class="naissance">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Region', 'Chiffre'],
                        ['Adamaoua', <?php echo $ada;?>],
                        ['Centre', <?php echo $centre;?>],
                        ['Est', <?php echo $est;?>],
                        ['Extreme Nord', <?php echo $ext;?>],
                        ['Littoral', <?php echo $litto;?>],
                        ['Nord', <?php echo $nord;?>],
                        ['Nord-Ouest', <?php echo $nord_ou;?>],
                        ['Ouest', <?php echo $ouest;?>],
                        ['Sud', <?php echo $sud;?>],
                        ['Sud-Ouest', <?php echo $sud_ou;?>],          
                        ]);

                        var options = {
                        title: 'Nombre de registre de Deces par Region',
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
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                    $ada = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                    $centre = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                    $est = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                    $ext = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                    $litto = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                    $nord = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                    $nord_ou = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                    $ouest = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                    $sud = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
                    $sud_ou = $stmt->fetchColumn();
                ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Regions', 'deces par region'],
                        ['Adamaoua', <?php echo $ada;?>],
                        ['Centre', <?php echo $centre;?>],
                        ['Est', <?php echo $est;?>],
                        ['Extreme Nord', <?php echo $ext;?>],
                        ['Littoral', <?php echo $litto;?>],
                        ['Nord', <?php echo $nord;?>],
                        ['Nord-Ouest', <?php echo $nord_ou;?>],
                        ['Ouest', <?php echo $ouest;?>],
                        ['Sud', <?php echo $sud;?>],
                        ['Sud-Ouest', <?php echo $sud_ou;?>],
                        ]);

                        var options = {
                        title: 'Nombre acte de Deces par Region',
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
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                        $ada = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                        $centre = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                        $est = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                        $ext = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                        $litto = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                        $nord = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                        $nord_ou = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                        $ouest = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                        $sud = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
                        $sud_ou = $stmt->fetchColumn();
                    ?>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Regions', 'paraphe par region'],
                            ['Adamaoua', <?php echo $ada;?>],
                            ['Centre', <?php echo $centre;?>],
                            ['Est', <?php echo $est;?>],
                            ['Extreme Nord', <?php echo $ext;?>],
                            ['Littoral', <?php echo $litto;?>],
                            ['Nord', <?php echo $nord;?>],
                            ['Nord-Ouest', <?php echo $nord_ou;?>],
                            ['Ouest', <?php echo $ouest;?>],
                            ['Sud', <?php echo $sud;?>],
                            ['Sud-Ouest', <?php echo $sud_ou;?>],
                        ]);

                        var options = {
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        title:'Nombre de Registre Paraphe par region'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donut_single" style="width:48vw; height: 49vh;"></div>
            </div>
            <div class="acte-mar">
                    <?php  
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                       $ada = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                       $centre = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                       $est = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                       $ext = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                       $litto = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                       $nord = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                       $nord_ou = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                       $ouest = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                       $sud = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
                       $sud_ou = $stmt->fetchColumn();
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Regions', 'Mariage par region'],
                            ['Adamaoua', <?php echo $ada;?>],
                            ['Centre', <?php echo $centre;?>],
                            ['Est', <?php echo $est;?>],
                            ['Extreme Nord', <?php echo $ext;?>],
                            ['Littoral', <?php echo $litto;?>],
                            ['Nord', <?php echo $nord;?>],
                            ['Nord-Ouest', <?php echo $nord_ou;?>],
                            ['Ouest', <?php echo $ouest;?>],
                            ['Sud', <?php echo $sud;?>],
                            ['Sud-Ouest', <?php echo $sud_ou;?>],
                        ]);

                        var options = {
                            title: 'Nombre acte de Mariage par Region',
                            pieStartAngle: 100,
                        };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="piechart" style="width:48vw; height:49vh;"></div>
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