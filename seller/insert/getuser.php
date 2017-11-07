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
{$sql="SELECT * FROM tbl_clients WHERE mno = '".$q."'";}
$result = $con->query($sql);
$nrows=$result->num_rows;

echo "<form action = 'update/index.php' method = 'POST' class='form-horizontal'>  
<table class=responstable>
<tr>
    <th>Client ID</th>
	<th>Name</th>
    <th>Mobile Number</th>
	<th>Aadhar</th>
	<th>Date Of Birth</th>
  </tr>";
 if($nrows > 0) 
 {
while($get_column=$result->fetch_assoc())
	 {
		echo"<tr>
		<td><input type='radio' name='mno' value=" . $get_column['mno']. " />";
		echo "<tr>";
			echo "<td>". $get_column['cid']."</td>";
			echo "<td>". $get_column['cname']."</td>";
			echo "<td>". $get_column['mno']."</td>";
			echo "<td>". $get_column['uid']."</td>";

			echo "<td>". date('d-m-Y', strtotime($get_column['dob'])). "</td>";
			echo "</tr>";
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