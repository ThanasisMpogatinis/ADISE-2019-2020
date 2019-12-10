<?php session_start();
  if(!is_array($_SESSION['cart'])) {
    $_SESSION['cart']=array();
  }
  if (!isset( $_SESSION['cart'][$_GET['pid']])) {
    $_SESSION['cart'][$_GET['pid']] = 0;
  }
  $_SESSION['cart'][$_GET['pid']] += $_GET['qty'];

  echo "Επιτυχής καταχώρηση στο καλάθι!";
?>
