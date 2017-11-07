<!DOCTYPE html>
<html>

<head> 
<link rel="stylesheet" href="css/menu.css"> 
<link rel="stylesheet" href="css/style.css">
     <script src="js/prefixfree.min.js"></script>
     <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
     <link href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>


<style>
.alert 
{
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #2446F3;}

.closebtn 
{
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
 </head>


<body>

 <nav id="nav-3">
  <a class="link-3" href="/my-site/login-form/seller/">Orders</a>
  <a class="link-3" href="/my-site/login-form/seller/insert/front.php">Update</a>
  <a class="link-3" href="/my-site/login-form">Logout</a>
  </nav>

  

  <?php
   if( isset($_POST["upqty"]) )
   {  
    $upqty = addslashes ($_POST['upqty']);
    $ono = addslashes ($_POST['ordno']);
    $dte = $_POST['ud'];
    //echo "Order: ". $_POST['ordno']. "<br />";
    //echo "Quantity: ". $_POST['upqty']. "<br />";
    //echo "Date: ". $_POST['ud']. "<br />";
  
    include("connection.php");
    
    $sql = "UPDATE seller SET processed=processed+'$upqty' WHERE ono='$ono'";
    // $sql = "INSERT INTO seller ". "(mname, colour, fabric, dia, qty, rdate) ". "VALUES('$mname','$colour','$fabric','$dia','$quantity',STR_TO_DATE('$rdate', '%d/%m/%Y'))";
         
    if ($con->query($sql) === TRUE)
      {
        //echo "New record created successfully"; echo "<br />";
        echo "<div class='alert success'>
        <span class='closebtn'>&times;</span>
        <strong>Success!</strong> Order Posted Successfully !!!
        </div>";

      }
    else 
     echo "Error: " . $sql . "<br>" . $con->error;


    $sql = "UPDATE seller SET remaining=remaining-'$upqty' WHERE ono='$ono'";
         
    if ($con->query($sql) === TRUE) 
     echo "";
    else 
     echo "Error: " . $sql . "<br>" . $con->error;

     $sql = "select ocd from seller WHERE ono = '".$ono."'";
      $result = $con->query($sql);
       $nrows=$result->num_rows;
        if($nrows > 0) 
          {
            while($get_column=$result->fetch_assoc())
            {
              $ocd=date('d/m/Y', strtotime($get_column['ocd']));
            }
          }
   //echo "Order Conformation Date: ". $ocd . "<br />";  


   $date1 = str_replace("/","-",$dte);
   $date2 = str_replace("/","-",$ocd);
   /*echo $date1;
   echo "<br>";
   echo $date2;
   echo "<br>";*/
   $d1=date_create($date1);
   $d2=date_create($date2);
   $diff=date_diff($d1,$d2);
   //echo $diff->format("%R%a days");
   
   if ($diff->format("%R%a") < 0) 
    { 
      echo "<div class='alert warning'>
      <span class='closebtn'>&times;</span>
      <strong>Warning!</strong> $date1 Crossed the Agreed Delivery Date $date2, We have recorded the Difference
      </div>";
      $sql = "UPDATE seller SET ocd=STR_TO_DATE('$date1', '%d-%m-%Y') WHERE ono='$ono'";
      
       if ($con->query($sql) === TRUE) 
        { echo ""; }
              else 
               { echo "Error: " . $sql . "<br>" . $con->error;}

      }
       else 
       {
         echo " ";
       }
   



   $con->close();
     

  } 
  ?>
 

 <div style="margin-top:50px;"  class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
       <center> <h2>Updated Order Entry</h2> </center>
      </div>
    
      <div class='panel-body'>
        <!-- <form action = " method = "POST" class='form-horizontal' role='form'> -->
     <form action = "<?php $_PHP_SELF ?>" method = "POST" class='form-horizontal'>
    <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name'>Mill Name</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
      
      <?php
        include("connection.php");
        //echo "Welcome ". $_POST['ono']. "<br />";
        $ono = $_POST['ordno'];
        //echo $ono;
        if( isset($_POST["ordno"]) )
        {
     
          
          $sql = "select * from seller WHERE ono = '".$ono."'";
          $result = $con->query($sql);
          $nrows=$result->num_rows;
    
          if($nrows > 0) 
          {
            while($get_column=$result->fetch_assoc())
            {
             //echo "successful";
                         echo  "<input class='form-control' id='mill' placeholder='Mill' type='text' name='mname' value='Aravind' disabled>";  ?>
          
                </div>
              </div>
             
            </div>
          </div>
      
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Colour</label>
            <div class='col-md-2'>
             <?php echo  "<input class='form-control' id='color' type='text' name='mname' value='". $get_column['color']."' disabled>";  ?>
            </div>
          </div>
      
      <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Fabric</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
         <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". $get_column['fabric']."' disabled>";  ?>

                </div>
              </div>
             
            </div>
          </div>
      
      <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Dia</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                    <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". $get_column['dia']."' disabled>";  ?>
                </div>
              </div>
             
            </div>
          </div>
      
      <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Quantity</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". $get_column['quantity']."' disabled>";  ?>
                </div>
              </div>
             
            </div>
          </div>

       <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Remaining</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". $get_column['remaining']."' disabled>";  ?>
                </div>
              </div>
             
            </div>
       </div>
      
      <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Processed</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". $get_column['processed']."' disabled>";  ?>
                </div>
              </div>
             
            </div>
       </div>

      
       <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Required Date</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". date('d-m-Y', strtotime($get_column['crd']))."' disabled>";  ?>
                </div>
              </div>
             
            </div>
       </div>

      <div class='form-group' >
      <label class='control-label col-md-2 col-md-offset-2' for='name' >Agreed Date</label>
      <div class='col-md-6'>
      <div class='form-group'>
            <div class='col-md-11'>
            <?php echo  "<input class='form-control' id='id_fab' type='text' name='mname' value='". date('d-m-Y', strtotime($get_column['ocd']))."' disabled>";  
        }  
            }
         mysqli_close($con);
        }
     
      
      
      ?>
      </div>
              </div>
             
            </div>
          </div>
      
    
</div>
          
        </form>
      </div>
    </div>

 <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>
</body>
    
</html>