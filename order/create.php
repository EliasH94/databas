<form action="#" method="post" class="list">
        <div class="col-md-4 form-group">
            <input name="namn" type="text" required="" class="form-control" placeholder="Namn">
        </div>        
        
        <div class="col-md-4 form-group">
            <input name="telefonnummer" type="text" required="" class="form-control" placeholder="Telefonnummer">
        </div>       
        
        <div class="col-md-4 form-group">
            <input name="epostadress" type="email" required="" class="form-control" placeholder="E-post">
        </div>     

        <div class="col-md-4 form-group">
            <input name="leveransadress" type="text" required="" class="form-control" placeholder="Leveransadress">
        </div>
  
        <div class="col-md-3 form-group">
        <input type="submit" value="Skicka beställningen" class="btn btn-success form-control">
        </div>
    </form>

<?php
 if($_SERVER['REQUEST_METHOD'] === 'POST'){

$stmt = $db->prepare("INSERT INTO customer (namn, telefonnummer, epostadress, leveransadress) 
VALUES (:namn, :telefonnummer, :epostadress, :leveransadress)");
$stmt->bindParam(':namn', $namn); 
$stmt->bindParam(':telefonnummer' , $telefonnummer);
$stmt->bindParam(':epostadress' , $epostadress);
$stmt->bindParam(':leveransadress' , $leveransadress);

$namn = $_POST['namn']; 
$telefonnummer = $_POST['telefonnummer'];
$epostadress = $_POST['epostadress'];
$leveransadress = $_POST['leveransadress'];

if(empty($namn) || empty($telefonnummer) || empty($epostadress) || empty($leveransadress)):
echo '<div class="alert alert-danger">
<h3>ERROR! empty name</h3></div>';
return;
endif;

echo "Tack, din order har beställts!";

$stmt->execute();
}
?>