<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
  <?php

 require "db.php";
  
  $stmt = $db->prepare("SELECT * FROM contacts"); 
  $stmt->execute();
  
  $table = '<table class="table mt-3 table table-striped table-hover">';
  $table .= '<tr>
  <th>Namn</th>
  <th>E-post</th>
  <th>Meddelande</th>
  <th>Admin</th>
  </tr>';
  
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $table .= '<tr>';
  $table .= '<td>' . $row['name'] . '</td>'; 
  $table .= '<td>' . $row['epost'] . '</td>';
  $table .= '<td>' . $row['mymessage'] . '</td>';
  $table .= '<td> <a href="delete.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline-danger"> Ta bort</a></td>';
  $table .= '</tr>';
  }
  
  $table .= '</table>'; 
  echo $table;
  
  ?>
  <a href="alldelete.php" class="btn btn-sm btn-outline-danger">
            Ta bort alla meddelanden 
        </a>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  
</html>