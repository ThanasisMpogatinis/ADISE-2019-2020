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
  $cart[] = $_SESSION['cart'];
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
<?php print "
<form class='agora' action='?p=cart&proid=$row[ID]&cart=$cart' method='post'>
  <input type='submit' value='Αγορά'>
  <input name='p' value='agora' type='hidden'>
  <input name='userid' value='$row[ID]' type='hidden'>
</form>
<form class='adeiasma' action='?p=cart&cart=$cart' method='post' style='margin-top : 20px'>
  <input type='submit' value='Άδειασμα καλαθιού'>
  <input name='p' value='emptycart' type='hidden'>
</form>
";
 ?>
