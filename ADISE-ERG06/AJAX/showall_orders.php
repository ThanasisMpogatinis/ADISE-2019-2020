<ol>
<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'e-bookstoredb');
$sql = "select * from orders";
if( $stmt = $mysqli->prepare($sql) ) {
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $sql2 = "select * from customer where ID=?";
    if( $stmt2 = $mysqli->prepare($sql2) ) {
      $stmt2->bind_param("i", $row['Customer']);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      $row2 = $result2->fetch_assoc();
    }
    print "<li>Order ID: $row[ID], Date: $row[oDate], Customer: $row2[Fname] $row2[Lname]</li>
            <ol>";
    $sql3 = "select * from orderdetails where Orders=?";
    if( $stmt3 = $mysqli->prepare($sql3) ) {
      $stmt3->bind_param("i", $row['ID']);
      $stmt3->execute();
      $result3 = $stmt3->get_result();
      while ($row3 = $result3->fetch_assoc()) {
        print "<li>$row3[Product]: , Quantity: $row3[Quantity]</li>";
      }
      print "</ol>";
    }
  }
}
 ?>
</ol>
