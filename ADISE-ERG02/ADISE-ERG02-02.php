<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
  <table id="t" >
  	<?php
  		for($x=0;$x<=9;$x++){
  			echo "<tr>";
  			for($j=0;$j<=9;$j++){
  				$r = rand(1,10);
  				if ($r>=5){
  					echo "<td style='background-color:green'> $r </td>";
  					}
  				else{
  					echo "<td style='background-color:red'> $r </td>";
  				}
  			}
  		}
  	?>
  </table>
</body>
</html>
