<h2>Προσωπικά Στοιχεία</h2>

<?php
  $uname = $_SESSION['username'];

  $sql = "select * from customer where uname=?";

  if( $stmt = $mysqli->prepare($sql) ) {
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

  }

  if(isset($_REQUEST['action_save'])) {
    $sql = 'update customer set Fname=?, Lname=?, Address=?, Phone=? where ID=?';

    if( $stmt = $mysqli->prepare($sql) ) {
      $stmt->bind_param("sssii", fname, lname, address, phone, $row[ID]);
      $stmt->execute();
    }
  }
 ?>

<form action="" method='get'>
  <table>
    <tr>
      <td class="text-right">Όνομα:</td>
      <td><input class="form-control" type='text' name='fname' value='<?php echo "$row[Fname]"; ?>'></td>
    </tr>
    <tr>
      <td class="text-right">Επίθετο:</td>
      <td><input class="form-control" type='text' name='lname' value='<?php echo "$row[Lname]"; ?>'></td>
    </tr>
    <tr>
      <td class="text-right">Διεύθυνση:</td>
      <td><input class="form-control" type='text' name='address' value='<?php echo "$row[Address]"; ?>'></td>
    </tr>
    <tr>
      <td class="text-right">Τηλέφωνο:</td>
      <td><input class="form-control" type='text' name='phone' value='<?php echo "$row[Phone]"; ?>'></td>
    </tr>
    <!-- <tr>
      <td class="text-right">Username:</td>
      <td><input class="form-control" type='text' name='uname' value='<?php echo "$row[uname]"; ?>'></td>
    </tr>
    <tr>
      <td class="text-right">Password:</td>
      <td><input class="form-control" type='text' name='passwd' value='<?php echo "$row[passwd]"; ?>'></td>
    </tr> -->
</table>
  <input type='submit' class="btn btn-primary" value='ΑΠΟΘΗΚΕΥΣΗ' name='action_save'>
  <input type='reset' class="btn btn-primary" value='ΑΝΑΙΡΕΣΗ'>
  <input type='hidden' name='p' value='myinfo'>
</form>
