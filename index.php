<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/index.css">    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<title>GECEC MINDDEVEL</title>
</head>
<body class="as">
    <nav class="bar-index">
        <div class="index-bar">
            <div class="img-index">
                <img src="img/cmr.png" class="img-index-pic">
                <a href="index.php" class="index-link">GECEC MINDDEVEL</a>
            </div>
            <a href="authentification.php" class="index-login">Se Connecter</a>
        </div>
    </nav>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="img/IMG_0236.JPG" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="img/slide1.png" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="img/slide2.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="hero">
        <div class="row">
            <div class="col">
                <div class="counter-box">
                    <i class="fa fa-map"></i>
                    <h2 class="counter">10</h2>
                    <h4>REGIONS</h4>
                </div>
            </div>
            <div class="col">
                <div class="counter-box">
                    <i class="fa fa-map-o"></i>
                    <h2 class="counter">58</h2>
                    <h4>DEPARTEMENTS</h4>
                </div>
            </div>
            <div class="col">
                <div class="counter-box">
                    <i class="fa fa-map-signs"></i>
                    <h2 class="counter">366</h2>
                    <h4>ARRONDISSEMENTS</h4>
                </div>
            </div>
        </div>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="jquery.counterup.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });

    </script>
    
</body>
</html>