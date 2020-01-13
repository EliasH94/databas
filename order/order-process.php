<?php
require "header.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'):
    $product_id= htmlspecialchars($_POST['product_id']);
    $email= htmlspecialchars($_POST['email']);

require_once 'db.php';
$sql= "SELECT * FROM customer WHERE email LIKE '$email'";
$stmt= $db->prepare($sql);
$stmt->bindParam('email', $email, PDO::PARAM_INT);
$stmt->execute();

$row= $stmt->fetch(PDO::FETCH_ASSOC);
    $customer_id = $row['id'];
    $customer_name = $row['name'];
    $message= "<div class='alert alert-success'><h3>Tack $customer_name</h3>";
    echo "$message";

    $sql= "INSERT INTO orders (product, customer) VALUES (:product, :customer)";
    $stmt= $db->prepare($sql);
    $stmt->bindParam(':product', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':customer', $customer_id, PDO::PARAM_INT);
    $stmt->execute();

endif;
require "footer.php";
?>