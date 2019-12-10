<ul>
  <?php
  $sql = 'select * from category order by Name';

  if (! ($res = $mysqli->query($sql))) {
   echo "Table creation failed: (" .
   			$mysqli->errno . ") " . $mysqli->error;
  }
  else {
  	while ($row = $res->fetch_assoc()) {
  		print "<li><a href='index.php?p=catinfo&catid=$row[ID]'>".
  				"$row[Name]</a></li>";
  	}
  }
  ?>
</ul>
<?php
  if($_SESSION['username'] == 'nikos'){
    print "<h5>Admin Menu</h5>
    <ul class='list-unstyled components'>
    <li><a href='?p=customers'>Λίστα πελατών</a></li>
    <li><a href='?p=orders'>Λίστα παραγγελιών</a></li>
    </ul>";
  }
  if($_SESSION['username'] != '?' && $_SESSION['username'] != 'admin'){
    print "<h5>User Menu</h5>
    <ul class='list-unstyled components'>
    <li><a href='?p=myOrders'>Εμφάνιση παραγγελιών</a></li>
    <li><a href='?p=myDetails'>Στοιχεία πελάτη</a></li>
    <li><a href='?p=logout'>Αποσύνδεση</a></li>
    </ul>";
  }
?>
