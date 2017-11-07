<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Seller View</title>
     
    <link rel="stylesheet" href="css/normalize.css">
         <link rel="stylesheet" href="css/style.css">
     <link href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  </head>

<body>
 <div>
	
	<hr style="height:70pt; visibility:hidden;" />
	</div>
<?php
$q = $_GET['q'];

$n = $_GET['n'];

$cv = $_GET['cv'];

$fv = $_GET['fv'];

//echo $q;
//echo "<br>";
//echo $n;
//echo "<br>";

include("connection.php");

if( $n == "color")
{$sql="SELECT * FROM seller WHERE color = '".$q."'";}
else if( $n == "fabric")
{
	//echo $cv;
	//echo "<br>";
	$sql="SELECT * FROM seller WHERE color = '".$cv."' and fabric = '".$q."'";
}
else
{   //echo $fv;
	$sql="SELECT * FROM seller WHERE color = '".$cv."' and fabric = '".$fv."' and dia = '".$q."'";}
#$sql = "select * from seller where color = '".$q."'";

$result = $con->query($sql);
$nrows=$result->num_rows;

echo "<form action = 'update/index.php' method = 'POST' class='form-horizontal'>  
<table class=responstable>
<tr>
    <th>Select</th>
    <th>Order ID</th>
    <th>Color</th>
    <th>Fabric</th>
	<th>Dia</th>
	<th>Quantity</th>
	<th>Remaining</th>
	<th>Processed</th>
	<th>Requested Date</th>
	<th>Agreed Date</th>
  </tr>";
 if($nrows > 0) 
 {
while($get_column=$result->fetch_assoc())
	 {
		echo"<tr>
		<td><input type='radio' name='ono' value=" . $get_column['ono']. " />
		<td>". $get_column['ono']."</td>
		<td>". $get_column['color']."</td>
		<td>". $get_column['fabric']."</td>
		<td>". $get_column['dia']."</td>
		<td>". $get_column['quantity']."</td>
		<td>". $get_column['remaining']."</td>
		<td>". $get_column['processed']."</td>
		<td>". date('d-m-Y', strtotime($get_column['crd'])). "</td>
		<td>". date('d-m-Y', strtotime($get_column['ocd'])). "</td>
		</tr> ";
	 }
 }
echo "</table>
<br><br><br><br><br>
<div class='form-group'>
            <div class='col-md-offset-4 col-md-3'>
             <center> <button type='submit' class='btn-lg btn-primary'>Select</button> </center>
            </div>";
		"</form>";
mysqli_close($con);
?>
<?php
if (isset($_POST['submit'])) {
if(isset($_POST['radio']))
{
echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
}
}
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
</body>
</html>