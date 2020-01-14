<?php
require "../db.php";

$sql = "TRUNCATE TABLE contacts";
$stmt = $db->prepare($sql);
$stmt->execute();
header('Location: index.php');
?>