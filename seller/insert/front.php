<html>
<head>
 <link rel="stylesheet" href="css/menu.css">
<script src="jquery.min.js"> </script>

    <meta charset="UTF-8">
    <title>Seller View</title>
     
    <link rel="stylesheet" href="css/normalize.css">
         <link rel="stylesheet" href="css/style.css">
 

<script>
$(function (){
    $('#color').change(function(){
        $('#dia option[value=""]').attr('selected','selected');
    });
	
	$('#color').change(function(){
        $('#fabric option[value=""]').attr('selected','selected');
    });
    
});

</script>
<script>
function showUser(str,n,cv,fv) {
	//window.alert(str);
	//window.alert(n);
	//window.alert(cv);
	//window.alert(fv);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
		//window.alert(str);
       xmlhttp.open("GET","getuser.php?q="+ str + "&n=" + n + "&cv=" + cv + "&fv=" + fv,true);
		//xmlhttp.open("GET","getuser.php?n="+n,true);
        xmlhttp.send();
    }
}
</script>

<style>
.demo select {
	border: 0 !important;  
	-webkit-appearance: none;  
	-moz-appearance: none; 
	background: #a36548 url(img/demo/select-arrow.png) no-repeat 90% center;
	width: 200px; 
	text-indent: 0.01px; 
	text-overflow: ""; 

	color: #FFF;
	border-radius: 15px;
	padding: 15px;
	margin-right: 30px;
    margin-top: 30px;
	box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);
}
.demo select.balck {
	background-color: #000;
}
.demo select.option3 {
	border-radius: 20px 0;
}
</style>


</head>
<body>
<nav id="nav-3">
  <a class="link-3" href="/my-site/login-form/seller/">Clients</a>
  <a class="link-3" href="/my-site/login-form/seller/insert/front.php">Update</a>
  <a class="link-3" href="/my-site/login-form">Logout</a>
  </nav>

<header> <h1 style="color:#5e1692;"><center> Find Client </h1></center> <header>
<center>
<form class="demo">
<select id="color" name="color"  class=option3 onchange="showUser(this.value,this.name)">
 
           <option value="">
              Select Mobile Number
           </option>
           
           <?php
             include("connection.php");
           
             $select=$con->query("select mno from tbl_clients");
			 
             while($row=$select->fetch_assoc())
             {
			    echo "<option>".$row['mno']."</option>";
             }
			
           ?>  

         </select> 
		 
	
</form>
</center>
<br>

<div id="txtHint"><b></b></div>

</body>
</html>