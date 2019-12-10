<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $array = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXz7mBuObtqGzyMSxe6rhGXx7PMsxpJZCbe3CawPBJi_HOIX8L&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxs4e_P4xdnw2Vov93zd-obHHFdlSptgsDSJ3jThH04FFejuXt&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-I63xuGpo4H35-4EgCnhTREZHvO29ew8txNMW4wVyxlGHM8cl&s",
        "https://th.thgim.com/opinion/op-ed/article22695424.ece/alternates/FREE_300/9thscience"
      ];
      $r = rand(0,3);
      echo "<img src="."$array[$r]".">";
    ?>
  </body>
</html>
