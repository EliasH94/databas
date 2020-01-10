<?php
require "../header.php";
require "../db.php";
$sql= "SELECT 
    O.id AS Ordernummer,
    O.date AS Orderdatum,
    O.done AS OK,
    C.name AS Kund,
    C.address AS Adress,
    P.productname AS Produkt 
FROM 
    product AS P,
    customer AS C,
    orders AS O 
WHERE 
P.id = O.product
AND C.id = O.customer
AND O.done ='0'";
$stmt= $db->prepare($sql);
$stmt->execute();

echo "<table class='table'>";
echo"<tr>
<th>Ordernummer</th>
<th>Orderdatum</th>
<th>Kund</th>
<th>Adress</th>
<th>Produkt</th>
<th>Uppdatera</th>
<th>Leverad</th>
</tr>";

while($row= $stmt->fetch(PDO::FETCH_ASSOC)):
    $Ordernummer= $row['Ordernummer'];
    $Orderdatum= $row['Orderdatum'];
    $Kund= $row['Kund'];
    $Adress= $row['Adress'];
    $Produkt= $row['Produkt'];
    echo"<tr>
    <td>$Ordernummer</td>
    <td>$Orderdatum</td>
    <td>$Kund</td>
    <td>$Adress</td>
    <td>$Produkt</td>
    <td><a href='#' class='btn btn-sm btn-outline-success'>Uppdatera</a></td>
    <td><a href='completion.php?id=". $Ordernummer ." class='btn btn-sm btn-outline-success'>Klar</a></td>
    </tr>";
endwhile;
echo'</table>';

require "../footer.php";
?>