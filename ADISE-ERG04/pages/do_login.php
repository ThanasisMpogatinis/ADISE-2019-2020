Proccessing login.....

<?php
	$u = $_REQUEST['username'];
	$p = $_REQUEST['password'];

	if($u == 'admin' && $p=='123') {
		print "Welcome admin";
		$_SESSION['username'] = 'admin';
	}elseif($u=='egw' && $p=='egw') {
		print "Welcome egw";
			$_SESSION['username'] = 'antonis';
	} else {
		print "Unknown user";
		$_SESSION['username'] = '?';
	}
?>
