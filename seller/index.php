<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Seller View</title>
    <!--    -->
	<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
  </head>

  <body>
  <div>
<nav id="nav-3">
  <a class="link-3" href="/my-site/login-form/seller/">Orders</a>
  <a class="link-3" href="/my-site/login-form/seller/insert/front.php">Update</a>
  <a class="link-3" href="/my-site/login-form">Logout</a>
  </nav>
  <div>
    <div>
	
	<hr style="height:30pt; visibility:hidden;" />
	</div>
<?php
 include("../connection.php");
 
 $sql="select * from tbl_clients";
 
 $res=$conn->query($sql);
 
 $nrows=$res->num_rows;
 ?>
<table class="responstable">
  
  <tr>
    
    <th data-th="Order Details"><span>Client ID</span></th>
    <th>Name</th>
    <th>Mobile Number</th>
	<th>Aadhar</th>
	<th>Date Of Birth</th>
  </tr>
  
  <?php 
    if($nrows > 0)
	{
		while($get_column=$res->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>". $get_column['cid']."</td>";
			echo "<td>". $get_column['cname']."</td>";
			echo "<td>". $get_column['mno']."</td>";
			echo "<td>". $get_column['uid']."</td>";

			echo "<td>". date('d-m-Y', strtotime($get_column['dob'])). "</td>";
			echo "</tr>";
		}
    }
    mysqli_close($conn);
 ?>
    
  
  
</table>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
  
  </body>
  
  
</html>
