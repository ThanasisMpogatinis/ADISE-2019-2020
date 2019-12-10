Proccessing login.....
<br> <br> <br>
<?php
	$u = $_REQUEST['username'];
	$p = $_REQUEST['password'];

	$sql = "select * from customer where uname=? and passwd=?";

	if( $stmt = $mysqli->prepare($sql) ) {
		$stmt->bind_param("si", $u, $p);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['uname'] === null) {
			$_SESSION['username'] = '?';
			print "Wrong username or password";
		  print "<br><a href='?p=login'>Try Again</a>";
		}
		else{
			$_SESSION['username'] = $row['uname'];
			if(!isset($_SESSION['userid'])) {
		  	$_SESSION['userid'] = $row['ID'];
		  }
			print "Welcome ". $row['Fname'] . " " . $row['Lname'] ;
		}
	}

?>
