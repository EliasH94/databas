  <?php
  require "header.php";
  require "db.php";
  require "productinfo.php";
  if(empty($_GET['id'])){
    header('Location: /shop/index.php');
} else {

  $id= htmlspecialchars($_GET['id']);
    $sql= "SELECT * FROM product WHERE id=:id"; 
  $stmt= $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row= $stmt->fetch(PDO::FETCH_ASSOC);
  $title= $row['productname'];
  $price= $row['price'];
}

?>

  <form action="registration.php" method="post" class="list">
        
        <div class="col-md-4 form-group">
            <h4>Ny kund</h4>
        </div>

        <div class="col-md-4 form-group">
            <input name="name" type="name" pattern="^\D*$" required="" class="form-control" placeholder="Namn">
        </div>        
        
        <div class="col-md-4 form-group">
            <input name="number" type="tel" pattern="[0-9]{3}-[0-9]{3} [0-9]{2} [0-9]{2}" required="" class="form-control" placeholder="07X-XXX XX XX">
        </div>       
        
        <div class="col-md-4 form-group">
            <input name="email" type="email" required="" class="form-control" placeholder="E-post">
        </div>     

        <div class="col-md-4 form-group">
            <input name="address" type="text" required="" class="form-control" placeholder="Leveransadress">
        </div>
  
        <div class="col-md-3 form-group">
        <input type="submit" value="Skicka beställningen" class="btn btn-success form-control">
        </div>
        <input type="hidden" name="product_id" value="<?=$id?>">

    </form>

    <form action="order-process.php" method="post" class="list">
        <div class="col-md-4 form-group">
            <h4>Befintlig kund</h4>
        </div>

        <div class="col-md-4 form-group">
            <input name="email" type="email" required="" class="form-control" placeholder="E-post">
        </div>     

        <div class="col-md-3 form-group">
        <input type="submit" value="Skicka beställningen" class="btn btn-success form-control">
        </div>

        <input type="hidden" name="product_id" value="<?=$id?>">

    </form>


  <?php
  
  require "../footer.php";
  ?>
