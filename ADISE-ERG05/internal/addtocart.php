<?php

  if(!is_array($_SESSION['cart'])) {
    $_SESSION['cart']=array();
  }
  $proid = $_REQUEST['proid'];
  if (!isset( $_SESSION['cart'][$proid])) {
    $_SESSION['cart'][$proid] = 0;
  }
  $_SESSION['cart'][$proid] += $_REQUEST['quantity'];

  echo "Επιτυχής καταχώρηση στο καλάθι!"
 ?>
