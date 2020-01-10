<?php



if(empty($_GET['id'])){
    header('Location: index.php');
}


require '../db.php';

$id = htmlspecialchars($_GET['id']);

$stmt= $db->prepare("SELECT * FROM customer WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if($stmt->rowCount() > 0){
    $row= $stmt->fetch(PDO::FETCH_ASSOC);
    $address= $row['address'];
        
} else {
        header('Location: index.php');
}
require "../header.php";
?>

<form method="post" action="?id=<?php echo $id; ?>">
<div class="form-row">
<div class="col-md-4">
<input type="text" 
       name="address"value="<?php echo $address; ?>"
       class="form-control mt-2"
       placeholder="Ange ny adress">
</div>

<div class="col-md-4">
    <input type="submit"
           class="form-control mt-2 btn btn-outline-primary"
           value="Uppdatera">
</div>
</div>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $address = $_POST['address'];
        $id= $_GET['id'];
        $sql = "UPDATE customer SET address = :address WHERE id = :id";
        $stmt= $db->prepare($sql);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: index.php');
        endif;

    require "../footer.php";
?>