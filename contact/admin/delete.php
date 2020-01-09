<?php
require "db.php";

$id = $_GET['id'];
$sql = "DELETE FROM contacts WHERE id = :id"; 
$stmt = $db->prepare($sql); 
$stmt->bindParam(':id', $id); 
$stmt->execute();
header('Location: index.php');
?>