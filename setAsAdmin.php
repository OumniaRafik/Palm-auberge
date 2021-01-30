<?php
session_start();
require 'db.php';
$id = $_GET['id'];

  $sql = 'UPDATE hassna SET admin=1 WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id' => $id])) {
    header("location:dashboard.php");
  
}


 ?>