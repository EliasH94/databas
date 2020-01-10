<?php

require "../db.php";
$id= $_GET['id'];
$sql = "UPDATE orders SET done = '1' WHERE orders.id = $id";
$stmt= $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: index.php');



?>