<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):// Hämta och rensa data från POST-Arrayen
    $product_id= htmlspecialchars($_POST['product_id']);
    $price= htmlspecialchars($_POST['price']);
    $email= htmlspecialchars($_POST['email']);

require_once 'db.php';
$sql= "SELECT * FROM customer WHERE email LIKE '%email%'";
$stmt= $db->prepare($sql);
$stmt->bindParam('email', $email, PDO::PARAM_INT);
$stmt->execute();
echo "hello";
if($stmt->rowCount() == 0) {
    $message= "<div class='alert alert-warning'>OBS! Felaktigt kundnummer!</div>";
    echo "$message";
    } 
    else {
    $row= $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $message= "<div class='alert alert-success'><h3>Tack $id</h3>";
    echo "$message";
}

endif;
?>