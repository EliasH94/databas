  <?php
  require "header.php";
  require "db.php";
  require "productinfo.php";
  $id= htmlspecialchars($_GET['id']);
    $sql= "SELECT * FROM product WHERE id=:id"; 
  $stmt= $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row= $stmt->fetch(PDO::FETCH_ASSOC);
  $title= $row['productname'];
  $price= $row['price'];
  ?>

  <!--<form action="order-process.php" method="post">
  
  <input type="text" name="email" requiredclass="form-controlmy-2" placeholder="Ange e-mail">
  <input type="hidden" name="product_id" value="<?=$id?>">
  <input type="hidden" name="price" value="<?=$price?>">
  <input type="submit" class="form-control my-2 btn btn-outline-success" value="Skicka beställningen">
  
  </form>
--->
  <form action="registration.php" method="post" class="list">
        <div class="col-md-4 form-group">
            <input name="name" type="text" required="" class="form-control" placeholder="Namn">
        </div>        
        
        <div class="col-md-4 form-group">
            <input name="number" type="text" required="" class="form-control" placeholder="Telefonnummer">
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
        <input type="hidden" name="price" value="<?=$price?>">
    </form>

  <?php
  require "order-process.php";
  require "../footer.php";
  ?>
