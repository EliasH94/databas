
<?php
 require "../header.php";
 require "../db.php";
  
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
  $table .= '<a href="alldelete.php" class="btn btn-sm btn-outline-danger">
            Ta bort alla meddelanden 
            </a>';
  echo $table;
require "../footer.php";
  ?>
