<?php
require "session.php";
require "dbconnexion.php";
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
    <title>GECEC MINDDEVEL | Nouveau CEC</title>
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
        <div class="title-dashboard">NOUVEAU CENTRE D'ETAT CIVIL
            <a href="historique_cec.php" title="Voir Historique"><img src="img/historique.png" class="img-next"></a> 
        </div>
        <div class="form-cec">
            <form action="nouveau_cec-check.php" method="post" class="newcec-form">
                <div class="newcec-content">
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Region</label>
                        <select name="region" id="region" onchange="getDepartement(this.value)" required class="select-cec">
                            <option value disabled selected>Selectionnez Region</option>
                            <?php foreach ($regions as $region) { ?>
                                <option value="<?= $region['code_region'] ?>"><?= $region['nom_region'] ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Departement</label>
                        <select name="departement" id="departement" onchange="getCtd(this.value)" required class="select-cec">
                            <option value disabled selected>Selectionnez Departement</option>
                        </select>
                    </div>

                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Arrondissement</label>
                        <select name="ctd" id="ctd" onchange="getCec(this.value)" required class="select-cec">
                            <option value disabled selected>Selectionnez Arrondissement</option>
                        </select>
                    </div>
                </div>
                <div class="newcec-content">
                  
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Centre Rattachement</label>
                        <select name="cec" id="cec" onchange="getNumero(this.value)" required class="select-cec">
                            <option value disabled selected>Selectionnez Localite</option>
                        </select>
                    </div>
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Numero</label>
                        <select name="numero" id="numero" class="select-cec" onchange="getCode(this.value)"></select>
                    </div>
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Nouveau Code</label>
                        <input type="text" id="code" name="coden" readonly>
                    </div>

                </div>
                <div class="newcec-content">
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Nom du centre</label>
                        <input type="text" id="input-cec" name="centre" required>
                    </div>
                    <div class="newcec-elmt">
                        <label for="input-cec" class="cec-elm-desc">Arrete</label>
                        <input type="file" id="input-cec" name="arrete" required>
                    </div>
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Date de creation</label>
                        <input type="date" name="date" id="input-cec" class="select-cec" required>
                    </div>

                </div>
                
                <div class="newcec-content">
                    
                    <div class="newcec-elmt">
                        <label for="" class="cec-elm-desc">Ressort Territorial</label>
                        <textarea type="text" class="ressort" name="ressort" placeholder="Ressort territorial">
                        </textarea>
                    </div>
                    
                </div>
                <div class="newcec-btn">
                    <input type="reset" value="Annuler" id="cec-reset">
                    <input type="submit" value="Sauvegarder" id="cec-subm" onclick="return confirm('Voulez vous vraiment sauvegarder cette information ?')">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
    function getDepartement(region) {
        getCode()
        $.ajax({
            type: "POST",
            url: "apicode.php",
            data: {
                code_region: region
            },
            success: function (response) {
                document.getElementById("departement").innerHTML = response;
            }
        });
    }

    function getCtd(departement) {
        getCode()
        var region = document.getElementById("region").value;
        $.ajax({
            type: "POST",
            url: "apicode.php",
            data: {
                region: region,
                code_dept: departement
            },
            success: function (response) {

                document.getElementById("ctd").innerHTML = response;
            }
        });
    }

    function getCec(ctd) {
        getCode()
        var region = document.getElementById("region").value;
        $.ajax({
            type: "POST",
            url: "apicode.php",
            data: {
                region: region,
                code_ctd: ctd
            },
            success: function (response) {
                document.getElementById("cec").innerHTML = response;
            }
        });
    }


    function getNumero(numero) {
        var region = document.getElementById("region").value;
        $.ajax({
            type: "POST",
            url: "apicode.php",
            data: {
                region: region,
                numero: numero
            },
            success: function (response) {
                document.getElementById("numero").innerHTML = response;
            }
        });
    }
    function setCodeCec(code) {
        const last = code.value.toString().slice(-2);
        var principal = document.getElementById("Principal");
        var secondaire = document.getElementById("Secondaire");
        principal.checked = false;
        secondaire.checked = false;
        document.getElementById("code_cec").value = code.value;
        document.getElementById("code_cec_step2").value = code.value;
        document.getElementById("cec_step2").value = code.options[code.selectedIndex].innerHTML;
        if (last == "00" || last == "01") {
            principal.checked = true;
        } else {
            secondaire.checked = true;
        }
    }

    function getTypeActe(type) {
        $.ajax({
            type: "POST",
            url: "apicode.php",
            data: {
                IdType_cec: type
            },
            success: function (response) {
                console.log(type);
                document.getElementById("IdType_cec").innerHTML = response;
            }
        })
    }

    function getCode(){
        var reg = document.getElementById("region").value;
        var dept = document.getElementById("departement").value;
        var arr = document.getElementById("ctd").value;
        var newcode = document.getElementById("numero").value;
        document.getElementById('code').value = reg+arr+newcode;
    }
    </script>
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