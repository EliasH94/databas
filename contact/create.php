<form action="#" method="post" class="row">
        <div class="col-md-6 form-group">
            <input name="name" type="text" required="" class="form-control" placeholder="Namn">
        </div>        
        
        <div class="col-md-6 form-group">
            <input name="epost" type="email" required="" class="form-control" placeholder="E-post">
        </div>       
        
        <div class="col-md-12 form-group">
            <textarea name="mymessage" cols="30" rows="5" required="" class="form-control" placeholder="Skriv ett meddelande"></textarea>
        </div>
        
        <div class="col-md-4 form-group">
        <input type="submit" value="Skicka meddelandet" class="btn btn-success form-control">
        </div>
    </form>

<?php
 if($_SERVER['REQUEST_METHOD'] === 'POST'){

// Förbered en SQL-sats och binda parametrar
$stmt = $db->prepare("INSERT INTO contacts (name, epost, mymessage) VALUES (:name, :epost, :mymessage)");
$stmt->bindParam(':name', $name); 
$stmt->bindParam(':epost' , $epost);
$stmt->bindParam(':mymessage' , $mymessage);

// Hämta data via post-arrayen
$name = $_POST['name']; 
$epost = $_POST['epost'];
$mymessage = $_POST['mymessage'];

if(empty($name) || empty($epost) || empty($mymessage)):
echo '<div class="alert alert-danger">
<h3>ERROR! empty name</h3></div>';
return;
endif;

echo "Tack, ditt meddelande har skickats!";

$stmt->execute();
}
?>