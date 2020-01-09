<?php

require "header.php";
require "db.php";

$stmt= $db->prepare("SELECT * FROM product"); 
$stmt->execute();

$info= '<div class="row">';

while($row= $stmt->fetch(PDO::FETCH_ASSOC)) { 
    $info.= '<div class="col-sm-4">';
    $info.= '<div class="card">';    
    $info.= '<img src="bild.jpg" class="card-img-top" alt="bild.jpg">';  
    $info.= '<div class="card-body">';     
    $info.= '<h5 class="card-title">'. $row['productname'] .'</h5>';
    $info.= '<p class="card-text">Pris: '. $row['price'] .'kr.</p>';
    $id = $row['id'];
    $info.= '<a href="order/index.php?id='. $id .'" class="btn btn-success">Köp</a>';
    $info.= '</div>';
    $info.= '</div>';
    $info.= '</div>';
}

$info.= '</div>';   
    echo $info;

require "footer.php";

?>