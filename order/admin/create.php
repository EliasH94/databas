<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $address = $_POST['address'];
    $id= $_GET['id'];
    $sql = "UPDATE customer SET address = $address WHERE id= :id";
    $stmt= $db->prepare($sql);
    $stmt->bindParam(':address', $address);
    $stmt->execute();
    endif;
?>