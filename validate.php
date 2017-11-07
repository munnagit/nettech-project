<?php

include("connection.php");
	 
$myusername = $_POST['u'];
$mypassword = $_POST['p'];

//to dispay what username and pass we've received
#echo $myusername,$mypassword;

$sql="select username from login where username='$myusername' and password='$mypassword'";
$res=$conn->query($sql);

$row=$res->num_rows;

//If Row result is 1 then DB matches
#echo $row; 

if($row == 1)
	header("location:/my-site/login-form/comp/view/index.php");
else 
    header("location:/my-site/login-form/seller/index.php");
     
 mysqli_close($conn);
?>
