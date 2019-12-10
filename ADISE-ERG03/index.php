<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
if( ! isset($_SESSION['username'])) {
	$_SESSION['username']='?';
}
?>
  <head>
    <meta charset="utf-8">
    <title></title>
		<!-- <link rel="stylesheet" href="style/layout.css"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="style/styles.css">
	</head>

  <body>
		<!-- Topbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-dark dixed-top">
			<a class="navbar-brand" href="index.php">my Shop</a>
			<ul class="navbar-nav">
		 		<li class="nav-item active">
			 		<a class="nav-link" href="index.php?p=start">Αρχική<span class="sr-only">(current)</span></a>
		 		</li>
		 		<li class="nav-item">
			 		<a class="nav-link" href="?p=shopinfo">Το κατάστημά μας</a>
		 		</li>
		 		<li class="nav-item">
			 		<a class="nav-link" href="?p=products">Προϊόντα</a>
		 		</li>
				<li class="nav-item">
			 		<a class="nav-link" href="?p=cart">Καλάθι Αγορών</a>
		 		</li>
				<li class="nav-item">
			 		<a class="nav-link" href="?p=login">Σύνδεση πελατών</a>
		 		</li>
				<li class="nav-item">
			 		<a class="nav-link" href="?p=contact">Επικοινωνία</a>
		 		</li>
	 		</ul>
    </div>
   </div>
   <div class="wrapper">
    <!-- Sidebar -->
    	<nav id="sidebar">
        <div class="sidebar-header">
            <h5 id="epiloges">Επιλογές</h5>
        </div>
				<?php
				if($_SESSION['username'] == 'admin'){
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
    	</nav>

  	<main role="main" class="container" id="main">
			<div class="starter-container">

			<?php
			if( ! isset($_REQUEST['p'])) {
				$_REQUEST['p']='start';
			}
			$p = $_REQUEST['p'];
			// print "must require page: internal/$p";
			switch ($p){
			case "start":	require "pages/start.php";
								break;
			case "shopinfo": require "pages/shopinfo.php";
								break;
			case "products": require "pages/products.php";
								break;
			case 'cart': require "pages/cart.php";
								break;
			case 'login':	require "pages/login.php";
								break;
			case 'do_login': require "pages/do_login.php";
								break;
			case 'contact':	require "pages/contact.php";
								break;
			case 'customers': require "adminPages/customers.php";
								break;
			case 'orders': require "adminPages/orders.php";
								break;
			case 'logout': require "userPages/logout.php";
								break;
			case 'myDetails': require "userPages/myDetails.php";
								break;
			case 'myOrders': require "userPages/myOrders.php";
								break;
			default:
				print "Η σελίδα δεν υπάρχει";
			}
			?>
		</div>
	</main>


  </body>
</html>
