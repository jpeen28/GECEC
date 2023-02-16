<?php
  $dateNaissance = "15-06-1995";
  $aujourdhui = date("Y-m-d");
  $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
  echo 'Votre age est '.$diff->format('%y');
?>