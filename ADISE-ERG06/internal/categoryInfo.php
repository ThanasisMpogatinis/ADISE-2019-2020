<table>
  <tr>
    <th>Name</th>
    <th>Price</th>
  </tr>
  <?php
    $cat = $_REQUEST['catid'];
    $sql = "select * from product where Category=?";
    // print "<pre>cat = $cat</pre>";
    // print "<pre>sql = $sql</pre>";
    if( $stmt = $mysqli->prepare($sql) ) {
    	$stmt->bind_param("i", $cat);
    	$stmt->execute();
    	$result = $stmt->get_result();
    	while ($row = $result->fetch_assoc()) {
    		print "
          <tr>
            <td><a href='index.php?p=selected&proid=$row[ID]'>$row[Title]</a></td>
            <td><b>$row[Price]$</b></td>
          </tr>
          ";
    	}
    }
  ?>
</table>
