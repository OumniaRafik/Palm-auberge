<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM message WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("location:gestionMessage.php");
}