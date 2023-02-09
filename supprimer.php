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
