<?php

if(empty($_GET['id'])){
    header('Location: index.php');
}
$id= $_GET['id'];

$id= $_GET['id'];
$id = htmlspecialchars($_GET['id']);
require 'db.php';
$stmt= $db->prepare("SELECT * FROM product WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if($stmt->rowCount() > 0){
    $row= $stmt->fetch(PDO::FETCH_ASSOC);
    $productname= $row['productname'];
    $price= $row['price'];
} else {
    header('Location: index.php');
}
?>

<div class="col-sm-4">
<div class="card">
<img src="/shop/bild.jpg" class="card-img-top" alt="bild.jpg">
<div class="card-body">
<h5 class="card-title"> <?php echo $productname ?> </h5>
<p class="card-text">Pris: <?php echo $price ?> kr.</p>
</div>
</div>
</div>
<br>