<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM hassna WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("location:dashboard.php");
}