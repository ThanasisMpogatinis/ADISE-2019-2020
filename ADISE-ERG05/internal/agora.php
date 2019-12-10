<?php

  $userid = $_SESSION['userid'];
  $sql = "INSERT INTO `orders`( `Customer`, `oDate`) VALUES (?,now())";
	if( $stmt = $mysqli->prepare($sql) ) {
    $stmt->bind_param("i", $userid);
    $stmt->execute();
  }

  $order_id = $mysqli->insert_id;

  $cart = $_SESSION['cart'];

  foreach($cart as $proid => $quantity) {
    $sql = "INSERT INTO `orderdetails`( `Orders`, `Quantity`, `Product`) VALUES (?,?,?)";
    if( $stmt = $mysqli->prepare($sql) ) {
      $stmt->bind_param("iii", $order_id, $quantity, $proid);
      $stmt->execute();
    }
  }

?>
<h3>Επιτυχής Αγορά!</h3>
