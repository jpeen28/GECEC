<?php
require "session.php";
require "dbconnexion.php";

$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
$ada = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
$centre = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
$est = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
$ext = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
$litto = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
$nord = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
$nord_ou = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
$ouest = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
$sud = $stmt->fetchColumn();
$stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <?php if($_SESSION['user']['role']=="administrateur" ){?>
    <div class="home-content">
        <div class="title-dashboard">TABLEAU DE STATISTIQUE DES COLLECTES 1 / 2
            <a href="dashboard2.php" title="Suivant"><img src="img/next.png" class="img-next"></a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GECEC MINDDEVEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Tableau de Bord</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard_cec.php"> CEC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboardoec.php">OEC</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
           <div class="graphe-dashboard">
                <div class="naissance">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                           
                        ['Task','Hours per Day'],
                        ["Adamaoua", <?php echo $ada;?>],
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
                        title: 'REGISTRE DE NAISSANCE',
                        is3D: true,
                        };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart_3d" style="width:48vw; height: 49vh;"></div>
                </div>

                <div class="act-naiss">

                <?php  
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                    $ada = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                    $centre = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                    $est = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                    $ext = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                    $litto = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                    $nord = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                    $nord_ou = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                    $ouest = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                    $sud = $stmt->fetchColumn();
                    $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
                    $sud_ou = $stmt->fetchColumn();
                ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Regions', 'Naissance par region'],
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
                        title: 'Nombre acte de Naissance par Region',
                        pieHole: 0.4,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donutchart" style="width: 48vw; height: 49vh;"></div>
                </div>

           </div>
           <div class="graphe-dashboard">
            <div class="mariage">
                    <?php  
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                        $ada = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                        $centre = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                        $est = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                        $ext = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                        $litto = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                        $nord = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                        $nord_ou = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                        $ouest = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                        $sud = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
                        $sud_ou = $stmt->fetchColumn();
                    ?>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
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
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        title:'Nombre de Registre de Mariage par region'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donut_single" style="width:48vw; height: 49vh;"></div>
            </div>
            <div class="acte-mar">
                    <?php  
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='AD'");
                       $ada = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='CE'");
                       $centre = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='ES'");
                       $est = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='EX'");
                       $ext = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='LT'");
                       $litto = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NO'");
                       $nord = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='NW'");
                       $nord_ou = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='OU'");
                       $ouest = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SU'");
                       $sud = $stmt->fetchColumn();
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE code_region='SW'");
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
    <?php } ?>
 
    <?php if($_SESSION['user']['role']=="collecteur" ){?>    
    <div class="home-content">
        <?php if($cec = $_SESSION['user']['code']){
            $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregnais),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $ada = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $mar = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $dec = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE  (sum(nbractnai),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $actn = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $actm = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE  (sum(nbractdec),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
            $actd = $stmt->fetchColumn();

            $stmt2 = $pdo->query("SELECT DISTINCT nom_region, localite,libelle,code FROM cec INNER JOIN  region ON cec.code_region=region.code_region  WHERE cec.code ='$cec'");
            $loc = $stmt2->fetchAll();
            } 
        ?>
        <div class="title-dashboard">TABLEAU DE STATISTIQUE DES COLLECTES <?php $stmt = $pdo->query("SELECT DISTINCT localite FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE cec.code ='$cec'"); $zu = $stmt->fetchColumn();print_r($zu);?>
        </div>
           <div class="graphe-dashboard">
                <div class="naissance">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                           
                        ['Region','Registre de Naissance'],
                        ["Registre de Naissance", <?php echo $ada;?>],
                        ["Registre de Mariage", <?php echo $mar;?>],
                        ["Registre de Decès", <?php echo $dec;?>],     
                        ]);

                        var options = {
                        title: 'ETAT DES REGISTRES',
                        is3D: true,
                        };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart_3d" style="width:48vw; height: 47vh;"></div>
                </div>

                <div class="act-naiss">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Regions', 'Etat sur les actes'],
                        ['Acte de Naissance',<?php echo $actn;?>],
                        ['Acte de Mariage',<?php echo $actm;?>],
                        ['Acte de Deces',<?php echo $actd;?>],
                     
                        ]);

                        var options = {
                        title: 'ETAT DES ACTES',
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
                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregpara),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
                        $par = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE  (sum(nbrregclot),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
                        $clo = $stmt->fetchColumn();
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Regions', 'Mariage par region'],
                            ['Registre Paraphés', <?php echo $par;?>],
                            ['Registre Cloturés', <?php echo $clo;?>],
                        ]);

                        var options = {
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        title:'Registre Paraphés & Cloturés'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="donut_single" style="width:48vw; height: 49vh;"></div>
            </div>
            <div class="acte-mar">
                    <?php  
                       $stmt = $pdo->query("SELECT COALESCE  (sum(nbractmar),0) FROM statistique INNER JOIN cec ON statistique.code=cec.code WHERE cec.code='$cec'");
                       $actmar = $stmt->fetchColumn();  
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Regions', 'Mariage par region'],
                            ['',0],
                          
                        ]);

                        var options = {
                            title: '',
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
    <?php } ?>

    <?php if($_SESSION['user']['role']=="region" )
        if($region = $_SESSION['user']['code_region']){?>
        <div class="home-content">
        <div class="title-dashboard">TABLEAU DE STATISTIQUE DES COLLECTES <?php $stmt = $pdo->query("SELECT DISTINCT nom_region FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE cec.code_region ='$region'"); $zu = $stmt->fetchColumn();print_r($zu);?> 1/2
            <a href="dashboard2.php" title="Suivant"><img src="img/next.png" class="img-next"></a>
        </div>
        <?php  
            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD1' AND cec.code_region='AD'");
            $vina = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD2' AND cec.code_region='AD'");
            $djerem = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD3' AND cec.code_region='AD'");
            $mbere = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD4' AND cec.code_region='AD'");
            $faro = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD5' AND cec.code_region='AD'");
            $maro = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE1' AND cec.code_region='CE'");
            $haute = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE2' AND cec.code_region='CE'");
            $lekie = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE3' AND cec.code_region='CE'");
            $mbam = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE4' AND cec.code_region='CE'");
            $inoubou = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE5' AND cec.code_region='CE'");
            $afamba = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE6' AND cec.code_region='CE'");
            $akono = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE7' AND cec.code_region='CE'");
            $mfoundi = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE8' AND cec.code_region='CE'");
            $ekelle = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE9' AND cec.code_region='CE'");
            $mfoumou = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE10' AND cec.code_region='CE'");
            $soo = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES1' AND cec.code_region='ES'");
            $mbouma = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES2' AND cec.code_region='ES'");
            $hnyong = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES3' AND cec.code_region='ES'");
            $kadey = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES4' AND cec.code_region='ES'");
            $lom = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN1' AND cec.code_region='EN'");
            $diamare = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN2' AND cec.code_region='EN'");
            $tsanaga = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN3' AND cec.code_region='EN'");
            $kani = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN4' AND cec.code_region='EN'");
            $sava = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN5' AND cec.code_region='EN'");
            $danay = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN6' AND cec.code_region='EN'");
            $logone = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT1' AND cec.code_region='LT'");
            $wouri = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT2' AND cec.code_region='LT'");
            $nkam = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT3' AND cec.code_region='LT'");
            $sanaga = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT4' AND cec.code_region='LT'");
            $moungo = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO1' AND cec.code_region='NO'");
            $benoue = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO2' AND cec.code_region='NO'");
            $louti = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO3' AND cec.code_region='NO'");
            $rey = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO4' AND cec.code_region='NO'");
            $nfaro = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW1' AND cec.code_region='NW'");
            $mezam = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW2' AND cec.code_region='NW'");
            $menchum = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW3' AND cec.code_region='NW'");
            $mantung = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW4' AND cec.code_region='NW'");
            $bui = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW5' AND cec.code_region='NW'");
            $momo = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW6' AND cec.code_region='NW'");
            $ngoketunjia = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW7' AND cec.code_region='NW'");
            $boyo = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU1' AND cec.code_region='OU'");
            $mifi = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU2' AND cec.code_region='OU'");
            $menoua = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU3' AND cec.code_region='OU'");
            $bamboutos = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU4' AND cec.code_region='OU'");
            $nde = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU5' AND cec.code_region='OU'");
            $noun = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU6' AND cec.code_region='OU'");
            $hautnkam = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU7' AND cec.code_region='OU'");
            $kounng = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU8' AND cec.code_region='OU'");
            $hautplateaux = $stmt->fetchColumn();


            
            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW1' AND cec.code_region='SW'");
            $sfako = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW2' AND cec.code_region='SW'");
            $ndian = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW3' AND cec.code_region='SW'");
            $meme = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW4' AND cec.code_region='SW'");
            $lebialem = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW5' AND cec.code_region='SW'");
            $koupe = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW6' AND cec.code_region='SW'");
            $manyu = $stmt->fetchColumn();


            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SU1' AND cec.code_region='SU'");
            $dja = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SU2' AND cec.code_region='SU'");
            $ocean = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SU3' AND cec.code_region='SU'");
            $vallee = $stmt->fetchColumn();

            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregnais),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SU4' AND cec.code_region='SU'");
            $mvila = $stmt->fetchColumn();


        ?>

        <div class="graphe-dashboard">
                    <div class="naissance">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            <?php if($_SESSION['user']['code_region']=="AD" ){?>
                         
                            ['Task','Hours per Day'],
                            ["VINA", <?php echo $vina;?>],
                            ["DJEREM", <?php echo $djerem;?>],
                            ["MBERE", <?php echo $mbere;?>],
                            ["FARO ET DEO", <?php echo $faro;?>],
                            ["MARO BANYO", <?php echo $maro;?>],
                            <?php }?>

                            <?php if($_SESSION['user']['code_region']=="CE" ){?>
                           
                            
                            ['Task','Hours per Day'],
                            ["HAUTE SANAGA", <?php echo $haute;?>],
                            ["LIKIE", <?php echo $lekie;?>],
                            ["MBAM ET KIM", <?php echo $mbam;?>],
                            ["MBAM ET INOUBOU", <?php echo $inoubou;?>],
                            ["MEFOU AFAMBA", <?php echo $afamba;?>],
                            ["MEFOU ET AKONO", <?php echo $akono;?>],
                            ["MFOUNDI", <?php echo $mfoundi;?>],
                            ["NYONG ET EKELLE", <?php echo $ekelle;?>],
                            ["NYONG ET MFOUMOU", <?php echo $mfoumou;?>],
                            ["NYONG ET SO'O", <?php echo $soo;?>],
                        
                            <?php }?>


                            <?php if($_SESSION['user']['code_region']=="ES" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MBOUMA ET NGOKO ", <?php echo $mbouma;?>],
                           ["HAUT NYONG", <?php echo $hnyong;?>],
                           ["KADEY", <?php echo $kadey;?>],
                           ["LOM ET DJEREM", <?php echo $lom;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="EN" ){?>
                           
                           ['Task','Hours per Day'],
                           ["DIAMARE ", <?php echo $diamare;?>],
                           ["MAYO TSANAGA", <?php echo $tsanaga;?>],
                           ["MAYO KANI", <?php echo $kani;?>],
                           ["MAYO SAVA", <?php echo $sava;?>],
                           ["MAYO DANAY", <?php echo $kani;?>],
                           ["LOGONE ET CHARI", <?php echo $logone;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="LT" ){?>
                           
                           ['Task','Hours per Day'],
                           ["WOURI ", <?php echo $wouri;?>],
                           ["NKAM", <?php echo $nkam;?>],
                           ["SANAGA MARITME", <?php echo $sanaga;?>],
                           ["MOUNGO", <?php echo $moungo;?>],
                           
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="NO" ){?>
                           
                           ['Task','Hours per Day'],
                           ["BENOUE ", <?php echo $benoue;?>],
                           ["MAYO LOUTI", <?php echo $louti;?>],
                           ["MAYO REY", <?php echo $rey;?>],
                           ["FARO", <?php echo $nfaro;?>],
                           
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="NW" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MEZAM ", <?php echo $mezam;?>],
                           ["MENCHUM", <?php echo $menchum;?>],
                           ["DONGA-MANTUNG", <?php echo $mantung;?>],
                           ["BUI", <?php echo $bui;?>],
                           ["MOMO", <?php echo $momo;?>],
                           ["NGOKETUNJIA", <?php echo $ngoketunjia;?>],
                           ["BOYO", <?php echo $boyo;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="OU" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MIFI ", <?php echo $mifi;?>],
                           ["MEMOUA", <?php echo $menoua;?>],
                           ["BAMBOUTOS", <?php echo $bamboutos;?>],
                           ["NDE", <?php echo $nde;?>],
                           ["NOUN", <?php echo $noun;?>],
                           ["HAUT NKAM", <?php echo $hautnkam;?>],
                           ["KOUNG-KHI", <?php echo $kounng;?>],
                           ["HAUT-PLATEAUX", <?php echo $hautplateaux;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="SW" ){?>
                           
                           ['Task','Hours per Day'],
                           ["FAKO ", <?php echo $sfako;?>],
                           ["NDIAN", <?php echo $ndian;?>],
                           ["MEME", <?php echo $meme;?>],
                           ["LEBIALEM", <?php echo $lebialem;?>],
                           ["KOUPE MANENGOUM", <?php echo $koupe;?>],
                           ["MANYU", <?php echo $manyu;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="SU" ){?>
                           
                           ['Task','Hours per Day'],
                           ["DJA ET LOBO ", <?php echo $dja;?>],
                           ["OCEAN", <?php echo $ocean;?>],
                           ["VALLEE DU NTEM", <?php echo $vallee;?>],
                           ["MVILA", <?php echo $mvila;?>],
                           <?php }?>
                          
                            ]);

                            var options = {
                            title: 'REGISTRE DE NAISSANCE PAR DEPARTEMENT',
                            is3D: true,
                            };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div id="piechart_3d" style="width:48vw; height: 49vh;"></div>
                    </div>

                    <div class="act-naiss">

                    <?php
                         $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD1' AND cec.code_region='AD'");
                         $vina = $stmt->fetchColumn();
             
                         $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD2' AND cec.code_region='AD'");
                         $djerem = $stmt->fetchColumn();
             
                         $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD3' AND cec.code_region='AD'");
                         $mbere = $stmt->fetchColumn();
             
                         $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD4' AND cec.code_region='AD'");
                         $faro = $stmt->fetchColumn();
             
                         $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD5' AND cec.code_region='AD'");
                         $maro = $stmt->fetchColumn();

                                 
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE1' AND cec.code_region='CE'");
                        $haute = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE2' AND cec.code_region='CE'");
                        $lekie = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE3' AND cec.code_region='CE'");
                        $mbam = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE4' AND cec.code_region='CE'");
                        $inoubou = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE5' AND cec.code_region='CE'");
                        $afamba = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE6' AND cec.code_region='CE'");
                        $akono = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE7' AND cec.code_region='CE'");
                        $mfoundi = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE8' AND cec.code_region='CE'");
                        $ekelle = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE9' AND cec.code_region='CE'");
                        $mfoumou = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE10' AND cec.code_region='CE'");
                        $soo = $stmt->fetchColumn();
                       

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES1' AND cec.code_region='ES'");
                        $mbouma = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES2' AND cec.code_region='ES'");
                        $hnyong = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES3' AND cec.code_region='ES'");
                        $kadey = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES4' AND cec.code_region='ES'");
                        $lom = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN1' AND cec.code_region='EN'");
                        $diamare = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN2' AND cec.code_region='EN'");
                        $tsanaga = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN3' AND cec.code_region='EN'");
                        $kani = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN4' AND cec.code_region='EN'");
                        $sava = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN5' AND cec.code_region='EN'");
                        $danay = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN6' AND cec.code_region='EN'");
                        $logone = $stmt->fetchColumn();
                        

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT1' AND cec.code_region='LT'");
                        $wouri = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT2' AND cec.code_region='LT'");
                        $nkam = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT3' AND cec.code_region='LT'");
                        $sanaga = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT4' AND cec.code_region='LT'");
                        $moungo = $stmt->fetchColumn();


                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO1' AND cec.code_region='NO'");
                        $benoue = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO2' AND cec.code_region='NO'");
                        $louti = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO3' AND cec.code_region='NO'");
                        $rey = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO4' AND cec.code_region='NO'");
                        $nfaro = $stmt->fetchColumn();


                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW1' AND cec.code_region='NW'");
                        $mezam = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW2' AND cec.code_region='NW'");
                        $menchum = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW3' AND cec.code_region='NW'");
                        $mantung = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW4' AND cec.code_region='NW'");
                        $bui = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW5' AND cec.code_region='NW'");
                        $momo = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW6' AND cec.code_region='NW'");
                        $ngoketunjia = $stmt->fetchColumn();
            
                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW7' AND cec.code_region='NW'");
                        $boyo = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU1' AND cec.code_region='OU'");
                        $mifi = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU2' AND cec.code_region='OU'");
                        $menoua = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU3' AND cec.code_region='OU'");
                        $bamboutos = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU4' AND cec.code_region='OU'");
                        $nde = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU5' AND cec.code_region='OU'");
                        $noun = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU6' AND cec.code_region='OU'");
                        $hautnkam = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU7' AND cec.code_region='OU'");
                        $kounng = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU8' AND cec.code_region='OU'");
                        $hautplateaux = $stmt->fetchColumn();


                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW1' AND cec.code_region='SW'");
                        $sfako = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW2' AND cec.code_region='SW'");
                        $ndian = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW3' AND cec.code_region='SW'");
                        $meme = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW4' AND cec.code_region='SW'");
                        $lebialem = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW5' AND cec.code_region='SW'");
                        $koupe = $stmt->fetchColumn();

                        $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW6' AND cec.code_region='SW'");
                        $manyu = $stmt->fetchColumn();
                                
                    ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([

                     
                            <?php if($_SESSION['user']['code_region']=="AD" ){?>
                            ['Regions', 'Naissance par region'],
                            ['VINA', <?php echo $vina;?>],
                            ['DJEREM', <?php echo $djerem;?>],
                            ['MBERE', <?php echo $mbere;?>],
                            ['FARO ET DEO', <?php echo $faro;?>],
                            ['MARO BANYO', <?php echo $maro;?>],
                            <?php }?>

                            <?php if($_SESSION['user']['code_region']=="CE" ){?>
                           
                            
                           ['Task','Hours per Day'],
                           ["HAUTE SANAGA", <?php echo $haute;?>],
                           ["LIKIE", <?php echo $lekie;?>],
                           ["MBAM ET KIM", <?php echo $mbam;?>],
                           ["MBAM ET INOUBOU", <?php echo $inoubou;?>],
                           ["MEFOU AFAMBA", <?php echo $afamba;?>],
                           ["MEFOU ET AKONO", <?php echo $akono;?>],
                           ["MFOUNDI", <?php echo $mfoundi;?>],
                           ["NYONG ET EKELLE", <?php echo $ekelle;?>],
                           ["NYONG ET MFOUMOU", <?php echo $mfoumou;?>],
                           ["NYONG ET SO'O", <?php echo $soo;?>],
                       
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="ES" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MBOUMA ET NGOKO ", <?php echo $mbouma;?>],
                           ["HAUT NYONG", <?php echo $hnyong;?>],
                           ["KADEY", <?php echo $kadey;?>],
                           ["LOM ET DJEREM", <?php echo $lom;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="EN" ){?>
                           
                           ['Task','Hours per Day'],
                           ["DIAMARE ", <?php echo $diamare;?>],
                           ["MAYO TSANAGA", <?php echo $tsanaga;?>],
                           ["MAYO KANI", <?php echo $kani;?>],
                           ["MAYO SAVA", <?php echo $sava;?>],
                           ["MAYO DANAY", <?php echo $kani;?>],
                           ["LOGONE ET CHARI", <?php echo $logone;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="LT" ){?>
                           
                           ['Task','Hours per Day'],
                           ["WOURI ", <?php echo $wouri;?>],
                           ["NKAM", <?php echo $nkam;?>],
                           ["SANAGA MARITIME", <?php echo $sanaga;?>],
                           ["MOUNGO", <?php echo $moungo;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="NO" ){?>
                           
                           ['Task','Hours per Day'],
                           ["BENOUE ", <?php echo $benoue;?>],
                           ["MAYO LOUTI", <?php echo $louti;?>],
                           ["MAYO REY", <?php echo $rey;?>],
                           ["FARO", <?php echo $nfaro;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="NW" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MEZAM ", <?php echo $mezam;?>],
                           ["MENCHUM", <?php echo $menchum;?>],
                           ["DONGA-MANTUNG", <?php echo $mantung;?>],
                           ["BUI", <?php echo $bui;?>],
                           ["MOMO", <?php echo $momo;?>],
                           ["NGOKETUNJIA", <?php echo $ngoketunjia;?>],
                           ["BOYO", <?php echo $boyo;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="OU" ){?>
                           
                           ['Task','Hours per Day'],
                           ["MIFI ", <?php echo $mifi;?>],
                           ["MEMOUA", <?php echo $menoua;?>],
                           ["BAMBOUTOS", <?php echo $bamboutos;?>],
                           ["NDE", <?php echo $nde;?>],
                           ["NOUN", <?php echo $noun;?>],
                           ["HAUT NKAM", <?php echo $hautnkam;?>],
                           ["KOUNG-KHI", <?php echo $kounng;?>],
                           ["HAUT-PLATEAUX", <?php echo $hautplateaux;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="SW" ){?>
                           
                           ['Task','Hours per Day'],
                           ["FAKO ", <?php echo $sfako;?>],
                           ["NDIAN", <?php echo $ndian;?>],
                           ["MEME", <?php echo $meme;?>],
                           ["LEBIALEM", <?php echo $lebialem;?>],
                           ["KOUPE MANENGOUM", <?php echo $koupe;?>],
                           ["MANYU", <?php echo $manyu;?>],
                           <?php }?>

                           <?php if($_SESSION['user']['code_region']=="SU" ){?>
                           
                           ['Task','Hours per Day'],
                           ["DJA ET LOBO ", <?php echo $dja;?>],
                           ["OCEAN", <?php echo $ocean;?>],
                           ["VALLEE DU NTEM", <?php echo $vallee;?>],
                           ["MVILA", <?php echo $mvila;?>],
                           <?php }?>
                         
                            ]);

                            var options = {
                            title: 'NOMBRE ACTE DE NAISSANCE PAR DEPARTEMENT',
                            pieHole: 0.4,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="donutchart" style="width: 48vw; height: 49vh;"></div>
                    </div>

            </div>
            <div class="graphe-dashboard">
                <div class="mariage">
                        <?php  
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD1' AND cec.code_region='AD'");
                            $vina = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD2' AND cec.code_region='AD'");
                            $djerem = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD3' AND cec.code_region='AD'");
                            $mbere = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD4' AND cec.code_region='AD'");
                            $faro = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD5' AND cec.code_region='AD'");
                            $maro = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE1' AND cec.code_region='CE'");
                            $haute = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE2' AND cec.code_region='CE'");
                            $lekie = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE3' AND cec.code_region='CE'");
                            $mbam = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE4' AND cec.code_region='CE'");
                            $inoubou = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE5' AND cec.code_region='CE'");
                            $afamba = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE6' AND cec.code_region='CE'");
                            $akono = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE7' AND cec.code_region='CE'");
                            $mfoundi = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE8' AND cec.code_region='CE'");
                            $ekelle = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE9' AND cec.code_region='CE'");
                            $mfoumou = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE10' AND cec.code_region='CE'");
                            $soo = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES1' AND cec.code_region='ES'");
                            $mbouma = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES2' AND cec.code_region='ES'");
                            $hnyong = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES3' AND cec.code_region='ES'");
                            $kadey = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES4' AND cec.code_region='ES'");
                            $lom = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN1' AND cec.code_region='EN'");
                            $diamare = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN2' AND cec.code_region='EN'");
                            $tsanaga = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN3' AND cec.code_region='EN'");
                            $kani = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='4' AND cec.code_region='EN'");
                            $sava = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN5' AND cec.code_region='EN'");
                            $danay = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN6' AND cec.code_region='EN'");
                            $logone = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT1' AND cec.code_region='LT'");
                            $wouri = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT2' AND cec.code_region='LT'");
                            $nkam = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT3' AND cec.code_region='LT'");
                            $sanaga = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT4' AND cec.code_region='LT'");
                            $moungo = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO1' AND cec.code_region='NO'");
                            $benoue = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO2' AND cec.code_region='NO'");
                            $louti = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO3' AND cec.code_region='NO'");
                            $rey = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO4' AND cec.code_region='NO'");
                            $nfaro = $stmt->fetchColumn();
                           

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW1' AND cec.code_region='NW'");
                            $mezam = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW2' AND cec.code_region='NW'");
                            $menchum = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW3' AND cec.code_region='NW'");
                            $mantung = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW4' AND cec.code_region='NW'");
                            $bui = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW5' AND cec.code_region='NW'");
                            $momo = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW6' AND cec.code_region='NW'");
                            $ngoketunjia = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW7' AND cec.code_region='NW'");
                            $boyo = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU1' AND cec.code_region='OU'");
                            $mifi = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU2' AND cec.code_region='OU'");
                            $menoua = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractnai),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU3' AND cec.code_region='OU'");
                            $bamboutos = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU4' AND cec.code_region='OU'");
                            $nde = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU5' AND cec.code_region='OU'");
                            $noun = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU6' AND cec.code_region='OU'");
                            $hautnkam = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU7' AND cec.code_region='OU'");
                            $kounng = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU8' AND cec.code_region='OU'");
                            $hautplateaux = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW1' AND cec.code_region='SW'");
                            $sfako = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW2' AND cec.code_region='SW'");
                            $ndian = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW3' AND cec.code_region='SW'");
                            $meme = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW4' AND cec.code_region='SW'");
                            $lebialem = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW5' AND cec.code_region='SW'");
                            $koupe = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbrregmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW6' AND cec.code_region='SW'");
                            $manyu = $stmt->fetchColumn();
    
                        ?>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                <?php if($_SESSION['user']['code_region']=="AD" ){?>
                                ['Regions', 'Mariage par region'],
                                ['VINA', <?php echo $vina;?>],
                                ['DJEREM', <?php echo $djerem;?>],
                                ['MBERE', <?php echo $mbere;?>],
                                ['FARO ET DEO', <?php echo $faro;?>],
                                ['MARO BANYO', <?php echo $maro;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="CE" ){?>
                            
                                ['Task','Hours per Day'],
                                ["HAUTE SANAGA", <?php echo $haute;?>],
                                ["LIKIE", <?php echo $lekie;?>],
                                ["MBAM ET KIM", <?php echo $mbam;?>],
                                ["MBAM ET INOUBOU", <?php echo $inoubou;?>],
                                ["MEFOU AFAMBA", <?php echo $afamba;?>],
                                ["MEFOU ET AKONO", <?php echo $akono;?>],
                                ["MFOUNDI", <?php echo $mfoundi;?>],
                                ["NYONG ET EKELLE", <?php echo $ekelle;?>],
                                ["NYONG ET MFOUMOU", <?php echo $mfoumou;?>],
                                ["NYONG ET SO'O", <?php echo $soo;?>],
                            
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="ES" ){?>
                           
                                ['Task','Hours per Day'],
                                ["MBOUMA ET NGOKO ", <?php echo $mbouma;?>],
                                ["HAUT NYONG", <?php echo $hnyong;?>],
                                ["KADEY", <?php echo $kadey;?>],
                                ["LOM ET DJEREM", <?php echo $lom;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="EN" ){?>
                           
                                ['Task','Hours per Day'],
                                ["DIAMARE ", <?php echo $diamare;?>],
                                ["MAYO TSANAGA", <?php echo $tsanaga;?>],
                                ["MAYO KANI", <?php echo $kani;?>],
                                ["MAYO SAVA", <?php echo $sava;?>],
                                ["MAYO DANAY", <?php echo $kani;?>],
                                ["LOGONE ET CHARI", <?php echo $logone;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="LT" ){?>
                           
                                ['Task','Hours per Day'],
                                ["WOURI ", <?php echo $wouri;?>],
                                ["NKAM", <?php echo $nkam;?>],
                                ["SANAGA MARITIME", <?php echo $sanaga;?>],
                                ["MOUNGO", <?php echo $moungo;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="NO" ){?>
                                
                                ['Task','Hours per Day'],
                                ["BENOUE ", <?php echo $benoue;?>],
                                ["MAYO LOUTI", <?php echo $louti;?>],
                                ["MAYO REY", <?php echo $rey;?>],
                                ["FARO", <?php echo $nfaro;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="NW" ){?>
                           
                                ['Task','Hours per Day'],
                                ["MEZAM ", <?php echo $mezam;?>],
                                ["MENCHUM", <?php echo $menchum;?>],
                                ["DONGA-MANTUNG", <?php echo $mantung;?>],
                                ["BUI", <?php echo $bui;?>],
                                ["MOMO", <?php echo $momo;?>],
                                ["NGOKETUNJIA", <?php echo $ngoketunjia;?>],
                                ["BOYO", <?php echo $boyo;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="OU" ){?>
                           
                                ['Task','Hours per Day'],
                                ["MIFI ", <?php echo $mifi;?>],
                                ["MEMOUA", <?php echo $menoua;?>],
                                ["BAMBOUTOS", <?php echo $bamboutos;?>],
                                ["NDE", <?php echo $nde;?>],
                                ["NOUN", <?php echo $noun;?>],
                                ["HAUT NKAM", <?php echo $hautnkam;?>],
                                ["KOUNG-KHI", <?php echo $kounng;?>],
                                ["HAUT-PLATEAUX", <?php echo $hautplateaux;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="SW" ){?>
                           
                                ['Task','Hours per Day'],
                                ["FAKO ", <?php echo $sfako;?>],
                                ["NDIAN", <?php echo $ndian;?>],
                                ["MEME", <?php echo $meme;?>],
                                ["LEBIALEM", <?php echo $lebialem;?>],
                                ["KOUPE MANENGOUM", <?php echo $koupe;?>],
                                ["MANYU", <?php echo $manyu;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="SU" ){?>
                           
                                ['Task','Hours per Day'],
                                ["DJA ET LOBO ", <?php echo $dja;?>],
                                ["OCEAN", <?php echo $ocean;?>],
                                ["VALLEE DU NTEM", <?php echo $vallee;?>],
                                ["MVILA", <?php echo $mvila;?>],
                                <?php }?>
                                
                                
                            ]);

                            var options = {
                            pieHole: 0.5,
                            pieSliceTextStyle: {
                                color: 'black',
                            },
                            title:'NOMBRE DE REGISTRE DE MARIAGE PAR DEPARTEMENT'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
                            chart.draw(data, options);
                        }
                        </script>
                        <div id="donut_single" style="width:48vw; height: 49vh;"></div>
                </div>
                <div class="acte-mar">
                        <?php  
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD1' AND cec.code_region='AD'");
                            $vina = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD2' AND cec.code_region='AD'");
                            $djerem = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD3' AND cec.code_region='AD'");
                            $mbere = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD4' AND cec.code_region='AD'");
                            $faro = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='AD5' AND cec.code_region='AD'");
                            $maro = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE1' AND cec.code_region='CE'");
                            $haute = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE2' AND cec.code_region='CE'");
                            $lekie = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE3' AND cec.code_region='CE'");
                            $mbam = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE4' AND cec.code_region='CE'");
                            $inoubou = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE5' AND cec.code_region='CE'");
                            $afamba = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE6' AND cec.code_region='CE'");
                            $akono = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE7' AND cec.code_region='CE'");
                            $mfoundi = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE8' AND cec.code_region='CE'");
                            $ekelle = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE9' AND cec.code_region='CE'");
                            $mfoumou = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='CE10' AND cec.code_region='CE'");
                            $soo = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES1' AND cec.code_region='ES'");
                            $mbouma = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES2' AND cec.code_region='ES'");
                            $hnyong = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES3' AND cec.code_region='ES'");
                            $kadey = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='ES4' AND cec.code_region='ES'");
                            $lom = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN1' AND cec.code_region='EN'");
                            $diamare = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN2' AND cec.code_region='EN'");
                            $tsanaga = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN3' AND cec.code_region='EN'");
                            $kani = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN4' AND cec.code_region='EN'");
                            $sava = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN5' AND cec.code_region='EN'");
                            $danay = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='EN6' AND cec.code_region='EN'");
                            $logone = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT1' AND cec.code_region='LT'");
                            $wouri = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT2' AND cec.code_region='LT'");
                            $nkam = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT3' AND cec.code_region='LT'");
                            $sanaga = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='LT4' AND cec.code_region='LT'");
                            $moungo = $stmt->fetchColumn();
                           

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO1' AND cec.code_region='NO'");
                            $benoue = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO2' AND cec.code_region='NO'");
                            $louti = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO3' AND cec.code_region='NO'");
                            $rey = $stmt->fetchColumn();

                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NO4' AND cec.code_region='NO'");
                            $nfaro = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW1' AND cec.code_region='NW'");
                            $mezam = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW2' AND cec.code_region='NW'");
                            $menchum = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW3' AND cec.code_region='NW'");
                            $mantung = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW4' AND cec.code_region='NW'");
                            $bui = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW5' AND cec.code_region='NW'");
                            $momo = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW6' AND cec.code_region='NW'");
                            $ngoketunjia = $stmt->fetchColumn();
                
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='NW7' AND cec.code_region='NW'");
                            $boyo = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU1' AND cec.code_region='OU'");
                            $mifi = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU2' AND cec.code_region='OU'");
                            $menoua = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU3' AND cec.code_region='OU'");
                            $bamboutos = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU4' AND cec.code_region='OU'");
                            $nde = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU5' AND cec.code_region='OU'");
                            $noun = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU6' AND cec.code_region='OU'");
                            $hautnkam = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU7' AND cec.code_region='OU'");
                            $kounng = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='OU8' AND cec.code_region='OU'");
                            $hautplateaux = $stmt->fetchColumn();


                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW1' AND cec.code_region='SW'");
                            $sfako = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW2' AND cec.code_region='SW'");
                            $ndian = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW3' AND cec.code_region='SW'");
                            $meme = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW4' AND cec.code_region='SW'");
                            $lebialem = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW5' AND cec.code_region='SW'");
                            $koupe = $stmt->fetchColumn();
    
                            $stmt = $pdo->query("SELECT COALESCE (SUM(nbractmar),0) FROM cec INNER JOIN statistique ON cec.code=statistique.code WHERE statistique.codedept='SW6' AND cec.code_region='SW'");
                            $manyu = $stmt->fetchColumn();



                        ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                <?php if($_SESSION['user']['code_region']=="AD" ){?>
                                ['Regions', 'Mariage par region'],
                                ['VINA', <?php echo $vina;?>],
                                ['DJEREM', <?php echo $djerem;?>],
                                ['MBERE', <?php echo $mbere;?>],
                                ['FARO ET DEO', <?php echo $faro;?>],
                                ['MARO BANYO', <?php echo $maro;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="CE" ){?>
                            
                                ['Task','Hours per Day'],
                                ["HAUTE SANAGA", <?php echo $haute;?>],
                                ["LIKIE", <?php echo $lekie;?>],
                                ["MBAM ET KIM", <?php echo $mbam;?>],
                                ["MBAM ET INOUBOU", <?php echo $inoubou;?>],
                                ["MEFOU AFAMBA", <?php echo $afamba;?>],
                                ["MEFOU ET AKONO", <?php echo $akono;?>],
                                ["MFOUNDI", <?php echo $mfoundi;?>],
                                ["NYONG ET EKELLE", <?php echo $ekelle;?>],
                                ["NYONG ET MFOUMOU", <?php echo $mfoumou;?>],
                                ["NYONG ET SO'O", <?php echo $soo;?>],
                            
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="ES" ){?>
                                
                                ['Task','Hours per Day'],
                                ["MBOUMA ET NGOKO ", <?php echo $mbouma;?>],
                                ["HAUT NYONG", <?php echo $hnyong;?>],
                                ["KADEY", <?php echo $kadey;?>],
                                ["LOM ET DJEREM", <?php echo $lom;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="EN" ){?>
                           
                                ['Task','Hours per Day'],
                                ["DIAMARE ", <?php echo $diamare;?>],
                                ["MAYO TSANAGA", <?php echo $tsanaga;?>],
                                ["MAYO KANI", <?php echo $kani;?>],
                                ["MAYO SAVA", <?php echo $sava;?>],
                                ["MAYO DANAY", <?php echo $kani;?>],
                                ["LOGONE ET CHARI", <?php echo $logone;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="LT" ){?>
                           
                                ['Task','Hours per Day'],
                                ["WOURI ", <?php echo $wouri;?>],
                                ["NKAM", <?php echo $nkam;?>],
                                ["SANAGA MARITIME", <?php echo $sanaga;?>],
                                ["MOUNGO", <?php echo $moungo;?>],
                                
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="NO" ){?>
                                
                                ['Task','Hours per Day'],
                                ["BENOUE ", <?php echo $benoue;?>],
                                ["MAYO LOUTI", <?php echo $louti;?>],
                                ["MAYO REY", <?php echo $rey;?>],
                                ["FARO", <?php echo $nfaro;?>],
                                
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="NW" ){?>
                                
                                ['Task','Hours per Day'],
                                ["MEZAM ", <?php echo $mezam;?>],
                                ["MENCHUM", <?php echo $menchum;?>],
                                ["DONGA-MANTUNG", <?php echo $mantung;?>],
                                ["BUI", <?php echo $bui;?>],
                                ["MOMO", <?php echo $momo;?>],
                                ["NGOKETUNJIA", <?php echo $ngoketunjia;?>],
                                ["BOYO", <?php echo $boyo;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="OU" ){?>
                           
                                ['Task','Hours per Day'],
                                ["MIFI ", <?php echo $mifi;?>],
                                ["MEMOUA", <?php echo $menoua;?>],
                                ["BAMBOUTOS", <?php echo $bamboutos;?>],
                                ["NDE", <?php echo $nde;?>],
                                ["NOUN", <?php echo $noun;?>],
                                ["HAUT NKAM", <?php echo $hautnkam;?>],
                                ["KOUNG-KHI", <?php echo $kounng;?>],
                                ["HAUT-PLATEAUX", <?php echo $hautplateaux;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="SW" ){?>
                           
                                ['Task','Hours per Day'],
                                ["FAKO ", <?php echo $sfako;?>],
                                ["NDIAN", <?php echo $ndian;?>],
                                ["MEME", <?php echo $meme;?>],
                                ["LEBIALEM", <?php echo $lebialem;?>],
                                ["KOUPE MANENGOUM", <?php echo $koupe;?>],
                                ["MANYU", <?php echo $manyu;?>],
                                <?php }?>

                                <?php if($_SESSION['user']['code_region']=="SU" ){?>
                           
                                ['Task','Hours per Day'],
                                ["DJA ET LOBO ", <?php echo $dja;?>],
                                ["OCEAN", <?php echo $ocean;?>],
                                ["VALLEE DU NTEM", <?php echo $vallee;?>],
                                ["MVILA", <?php echo $mvila;?>],
                                <?php }?>
                    
                           
                                
                            ]);

                            var options = {
                                title: 'NOMBRE ACTE DE NAISSANCE PAR DEPARTEMENT',
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
    </div>
    <?php } ?>
 
   

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