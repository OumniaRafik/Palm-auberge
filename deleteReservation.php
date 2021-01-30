<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM reservation WHERE id_res=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("location:gestionReservation.php");
}