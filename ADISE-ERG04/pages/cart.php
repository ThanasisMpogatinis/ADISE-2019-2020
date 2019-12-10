<h2>Καλάθι Αγορών</h2>
<table border="1px" style="text-align: center">
  <tr>
    <th>Title</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total Cost</th>
  </tr>
<?php
  if(!is_array($_SESSION['cart'])) {
    $_SESSION['cart']=array();
  }
  $sum = 0;
  $sql = "select * from product where ID=?";
  $stmt = $mysqli->prepare($sql);

  foreach($_SESSION['cart'] as $proid => $quantity) {
    $stmt->bind_param("i", $proid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $totalPrice = $quantity*$row['Price'];
    $sum += $totalPrice;
    print "
      <tr>
        <td> $row[Title] </td>
        <td> $quantity </td>
        <td> $row[Price] </td>
        <td> $totalPrice </td>
      </tr>
      ";
  }
  print "
    <tr>
      <td></td>
      <td></td>
      <td>Overall :</td>
      <td> $sum </td>
    <tr>
  ";
?>
</table>
<br>
<input type="button" value="Αγορά">
<input type="button" name="" value="Άδειασμα καλαθιού" style="margin-left : 20px">
