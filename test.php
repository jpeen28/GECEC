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