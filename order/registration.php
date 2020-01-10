<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):// Hämta och rensa data från POST-Arrayen
    $product_id= htmlspecialchars($_POST['product_id']);
    $price= htmlspecialchars($_POST['price']);
    $email= htmlspecialchars($_POST['email']);
    $name= htmlspecialchars($_POST['name']);
    $number= htmlspecialchars($_POST['number']);
    $address= htmlspecialchars($_POST['address']);
    

require_once 'db.php';
$sql= "SELECT * FROM customer WHERE email LIKE '$email'";
$stmt= $db->prepare($sql);
$stmt->bindParam('email', $email, PDO::PARAM_INT);
$stmt->execute();

if($stmt->rowCount() == 0) {
    $stmt = $db->prepare("INSERT INTO customer (name, number, email, address) 
VALUES (:name, :number, :email, :address)");
$stmt->bindParam(':name', $name); 
$stmt->bindParam(':number' , $number);
$stmt->bindParam(':email' , $email);
$stmt->bindParam(':address' , $address);

$namn = $_POST['name']; 
$telefonnummer = $_POST['number'];
$epostadress = $_POST['email'];
$leveransadress = $_POST['address'];

$stmt->execute();
    $message= "<div class='alert alert-warning'>OBS! Felaktigt kundnummer!</div>";
    echo "$message";
    header('Location: order-process.php');
    } else {
echo "Kund finns redan";
}

endif;
?>