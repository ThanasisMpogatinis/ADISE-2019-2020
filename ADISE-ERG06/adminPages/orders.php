<script>
  var xmlhttp;
  function showaj() {
     // if (window.XMLHttpRequest) {
      // 	// for IE7+, Firefox, Chrome, Opera, Safari
      // 	xmlhttp = new XMLHttpRequest();
     // }
     // else {
      // 	// for IE6, IE5
      // 	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     // }
     xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = showresponse;
     var pid = document.getElementById('pid').value;
     var qty = document.getElementById('qty').value;
     xmlhttp.open("GET","AJAX/showall_orders.php",true);
     xmlhttp.send();
  }
  function showresponse() {
     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("showResponse").innerHTML = xmlhttp.responseText;
     }
  }
</script>

<input type="button" value="Show all" onclick="showaj();" style="margin : 5px;">
<div id="showResponse"></div>
