<?php
require 'session.php';
require 'dbconnexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM nouveaucec WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:nouveau_cec.php");
}
?>

<?php
require 'session.php';
require 'dbconnexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM statistique WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:historique_collecte.php");
}
?>

<?php
require 'session.php';
require 'dbconnexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM nouveauoec WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:historique_oec.php");
}
?>
