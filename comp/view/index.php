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
  <a class="link-3" href="/my-site/login-form/comp/view/index.php">View</a>
  <a class="link-3" href="/my-site/login-form/comp/order/index.php">Add Order</a>
  <a class="link-3" href="/my-site/login-form">Logout</a>
  </nav>
  <div>
    <div>
	
	<hr style="height:30pt; visibility:hidden;" />
	</div>
<?php
 include("connection.php");
 
 $sql="select * from seller";
 
 $res=$con->query($sql);
 
 $nrows=$res->num_rows;
 ?>
<table class="responstable">
  
  <tr>
    
    <th data-th="Order Details"><span>Order ID</span></th>
    <th>Color</th>
    <th>Fabric</th>
	<th>Dia</th>
	<th>Quantity</th>
  <th>Remaining</th>
  <th>Processed</th>
	<th>Requested Date</th>
	<th>Agreed Date</th>
  </tr>
  
  <?php 
    if($nrows > 0)
	{
		while($get_column=$res->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>". $get_column['ono']."</td>";
			echo "<td>". $get_column['color']."</td>";
			echo "<td>". $get_column['fabric']."</td>";
			echo "<td>". $get_column['dia']."</td>";
			echo "<td>". $get_column['quantity']."</td>";
      echo "<td>". $get_column['remaining']."</td>";
      echo "<td>". $get_column['processed']."</td>";
			echo "<td>". date('d-m-Y', strtotime($get_column['crd'])). "</td>";
			echo "<td>". date('d-m-Y', strtotime($get_column['ocd'])). "</td>";
			echo "</tr>";
		}
    }
    mysqli_close($con);
 ?>
    
  
  
</table>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
  
  </body>
  
  
</html>
