<table>
  <?php
    $pro = $_REQUEST['proid'];
    $sql = "select * from product where ID=?";
    // print "<pre>cat = $cat</pre>";
    // print "<pre>sql = $sql</pre>";
    if( $stmt = $mysqli->prepare($sql) ) {
      $stmt->bind_param("i", $pro);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        print "
          <tr>
            <th>$row[Title]</th>
          </tr>
          <tr>
            <td>$row[Description]</td>
          </tr>
          <tr>
            <td>Κόστος : <b>$row[Price]$</b></td>
          </tr>
          ";
        }
      }
    ?>
</table>
<?php print "
<form class='addtocart' action=''?p=cart&proid=$row[ID]' method='post'>
  Ποσότητα : <input type='number' name='quantity' min='1'>
  <br>
  <input type='submit' value='Προσθήκη'>
  <input name='p' value='addtocart' type='hidden'>
</form>
";
?>
