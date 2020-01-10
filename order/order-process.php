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
    } 
    else {
    $row= $stmt->fetch(PDO::FETCH_ASSOC);
    $customer_id = $row['id'];
    $message= "<div class='alert alert-success'><h3>Tack $customer_id</h3>";
    echo "$message";

    $sql= "INSERT INTO orders (product, customer) VALUES (:product, :customer)";
    $stmt= $db->prepare($sql);
    $stmt->bindParam(':product', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':customer', $customer_id, PDO::PARAM_INT);
    $stmt->execute();

}

endif;
?>