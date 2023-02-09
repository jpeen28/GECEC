<?php
require "session.php";
require "dbconnexion.php";

if($user = $_SESSION['user']['code_region']){
    $stmt = $pdo->query("SELECT FR FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE region.code_region ='$user'");
    $regions = $stmt->fetchAll();
}
if($dept = $_SESSION['user']['identifiant']){
    $stmt = $pdo->query("SELECT * FROM departements where dept ='$dept' ");
    $depart = $stmt->fetchAll();
} 

if($arr = $_SESSION['user']['code_cec']){
    $stmt = $pdo->query("SELECT * FROM ctd where id ='$arr' ");
    $arron = $stmt->fetchAll();
   
} 
if($cec = $_SESSION['user']['code']){
    $stmt = $pdo->query("SELECT DISTINCT fr, localite,libelle, code,code FROM cec INNER JOIN  region ON cec.code_region=region.code_region inner JOIN departements ON departements.code_region=region.code_region WHERE cec.code ='$cec'");
    $loc = $stmt->fetchAll();
} 


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
    <div class="home-content">
    <div class="title-dashboard">FICHE DE COLLECTE  <?php $stmt = $pdo->query("SELECT DISTINCT localite FROM cec INNER JOIN  region ON cec.code_region=region.code_region INNER join statistique ON statistique.code = cec.code WHERE cec.code ='$cec'"); $zu = $stmt->fetchColumn();print_r($zu);?>
    </div>

    <form id="myForm" action="collecte-check.php" method="POST">
	  <div class="tab">
	  <div class="collecte">
        <?php 
            $stmt = $pdo->query("SELECT code FROM cec INNER JOIN  region ON cec.code_region=region.code_region inner JOIN departements ON departements.code_region=region.code_region WHERE cec.code ='$cec'");
            $codec = $stmt->fetchAll();
        ?>
			<div class="elmt-collecte">
				<label for="">Code Region</label>
				<input id="code" name="code" class="select-elmt" readonly value="<?php print_r($codec['0']['code']) ?>">
			</div>
			<div class="elmt-collecte">
                <label for="">Etat du Centre</label>
				<select id="etat" name="etat"  class="select-elmt" required>
					<option value disabled selected>Etat du Centre</option>
					<option value="Fonctionnel">Fonctionnel</option>
                    <option value="Non Fonctionnel">Non Fonctionnel</option>
				</select>
			</div>
		</div>
		<div class="collecte">
			<div class="elmt-collecte">
				<label for="">Region</label>
				<select id="region" name="region" class="select-elmt"onchange="getDepartement(this.value)">
                    <?php foreach ($regions as $region) { ?>
                    <option value="<?= $region['code_region'] ?>"><?= $region['FR'] ?></option>
                    <?php }?>
                    <?php foreach ($depart as $departe) { ?>
                    <option value="<?= $departe['code_region'] ?>"><?= $departe['code_region'] ?></option>
                    <?php } ?>
                    <?php foreach ($arron as $arrond) { ?>
                    <option value="<?= $arrond['code_region'] ?>"><?= $arrond['FR'] ?></option>
                    <?php } ?>
                    <?php foreach ($loc as $local) { ?>
                    <option value="<?= $local['fr'] ?>"><?= $local['fr'] ?></option>
                    <?php } ?>
				</select>
			</div>
			<div class="elmt-collecte">
				<label for="">Departement</label>
				<select id="departement" name="departement"  class="select-elmt">
                    <?php foreach ($depart as $departe) { ?>
                        <option value="<?= $departe['code_dept'] ?>"><?= $departe['FR'] ?></option>
                    <?php } ?>
                    <?php foreach ($arron as $arrond) { ?>
                        <option value="<?= $arrond['code_dept'] ?>"><?= $arrond['FR'] ?></option>
                    <?php } ?>

                    <?php foreach ($loc as $local) { ?>
                        <option value="<?= $local['code'] ?>"><?= $local['code'] ?></option>
                    <?php } ?>
				</select>
			</div>
		</div>

		<div class="collecte">
			<div class="elmt-collecte">
				<label for="">Arrondissement</label>
				<select id="arrondissement" name="ctd"  class="select-elmt" onchange="getCec(this.value)">
                <?php foreach ($arron as $arrond) { ?>
                    <option value="<?= $arrond['code_cec'] ?>"><?= $arrond['FR'] ?></option>
                <?php } ?>

                <?php foreach ($loc as $local) { ?>
                    <option value="<?= $local['code_cec'] ?>"><?= $local['libelle'] ?></option>
                <?php } ?>
				</select>
			</div>
			<div class="elmt-collecte">
				<label for="">Commune</label>
				<select id="cec" name="cec"  class="select-elmt">
                <?php foreach ($loc as $local) { ?>
                    <option value="<?= $local['code'] ?>"><?= $local['localite'] ?></option>
                <?php } ?>
				</select>
			</div>
		</div>
	
	  </div>
	  <div class="tab">
	  	<div class="collecte">
			<div class="elmt-collecte">
				<label for="">Registre Naissance</label>
				<input type="text" name="regnaissance" id="regnaissance" onchange="getTotal()"required class="select-elmt">
			</div>
			<div class="elmt-collecte">
				<label for="">Registre Mariage</label>
				<input type="text"  name="regmariage" id="regmariage" onchange="getTotal()" required class="select-elmt">
			</div>
		</div>
		<div class="collecte">
			<div class="elmt-collecte">
				<label for="">Registre Deces</label>
				<input type="text"  name="regdeces" id="regdeces"onchange="getTotal()" required class="select-elmt">
			</div>
			<div class="elmt-collecte">
				<label for="">Registre Total</label>
				<input type="text" name="regtotal" id="regtotal" readonly class="select-elmt">
			</div>
		</div>
        <div class="collecte">
			<div class="elmt-collecte">
				<label for="">Registre Paraphe</label>
				<input id="regparaphe" name="regparaphe" required class="select-elmt">
			</div>
			<div class="elmt-collecte">
				<label for="">Registre Cloture</label>
				<input id="regcloture" name="regclot"class="select-elmt">
			</div>
		</div>
	  </div>
	  <div class="tab">
	  	<div class="collecte">
			<div class="elmt-collecte">
				<label for="">Acte Naissance</label>
				<input id="actnaissance" name="nbractnai" class="select-elmt">
			</div>
			<div class="elmt-collecte">
				<label for="">Acte Mariage</label>
				<input id="actmariage" name="nbractmar"class="select-elmt">
			</div>
		</div>
		<div id="actdec">
			<div class="elmt-collecte">
				<label for="">Acte Deces</label>
				<input id="actdeces" name="nbractdec" class="select-elmt">
			</div>
		</div>
	  </div>
	  <div class="tab">
		<textarea name="observation" id="" cols="80" rows="10" placeholder="Observation"></textarea>

	  </div>
	  <div style="overflow:auto;">
	    <div style="float:right; margin-top: 45px;">
	      	<button type="button" class="previous">Precedent</button>
	      	<button type="button" class="next">Suivant</button>
			<button type="button" class="submit">Soumettre</button>
	    </div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>
	    <span class="step">3</span>
	    <span class="step">4</span>
	  </div>
	</form>
       
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    function getDepartement(region) {
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                code_region: region
            },
            success: function (response) {
                document.getElementById("departement").innerHTML = response;
            }
        });
    }

    function getCtd(departement) {
        var region = document.getElementById("region").value;
        $.ajax({
            type: "POST",
            url: "api.php",
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
        var region = document.getElementById("region").value;
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                region: region,
                code_ctd: ctd
            },
            success: function (response) {
                document.getElementById("cec").innerHTML = response;
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
            url: "api.php",
            data: {
                IdType_cec: type
            },
            success: function (response) {
                console.log(type);
                document.getElementById("IdType_cec").innerHTML = response;
            }
        })
    }
    function getTotal(){
        var nai =document.getElementById("regnaissance").value;
        var mar = document.getElementById("regmariage").value;
        var dec = document.getElementById("regdeces").value;
        var total =parseInt(nai) + parseInt(mar) + parseInt(dec);
        console.log(total);
        document.getElementById("regtotal").value = total;
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


























	<link rel="stylesheet" type="text/css" href="css/collecte.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="./multi-form.js?v2"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.validator.addMethod('date', function(value, element, param) {
				return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
			}, 'Please enter a valid date!');
			$.validator.addMethod('month', function(value, element, param) {
				return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
			}, 'Please enter a valid month!');
			$.validator.addMethod('year', function(value, element, param) {
				return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
			}, 'Please enter a valid year not less than 1900!');
			$.validator.addMethod('username', function(value, element, param) {
				var nameRegex = /^[a-zA-Z0-9]+$/;
				return value.match(nameRegex);
			}, 'Only a-z, A-Z, 0-9 characters are allowed');

			var val	=	{
			    // Specify validation rules
			    rules: {
			      fname: "required",
			      email: {
					        required: true,
					        email: true
					      },
					phone: {
						required:true,
						minlength:10,
						maxlength:10,
						digits:true
					},
					date:{
						date:true,
						required:true,
						minlength:2,
						maxlength:2,
						digits:true
					},
					month:{
						month:true,
						required:true,
						minlength:2,
						maxlength:2,
						digits:true
					},
					year:{
						year:true,
						required:true,
						minlength:4,
						maxlength:4,
						digits:true
					},
					username:{
						username:true,
						required:true,
						minlength:4,
						maxlength:16,
					},
					password:{
						required:true,
						minlength:8,
						maxlength:16,
					}
			    },
			    // Specify validation error messages
			}
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				validations:val,
			}
			).navigateTo(0);
		});
	</script>

