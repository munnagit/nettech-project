<!DOCTYPE html>
<html>

 <head>
    <meta charset="UTF-8">
    <title>Post Product Form</title>
     
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/menu.css">
     <script src="js/prefixfree.min.js"></script>
	 	 <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	   <link href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>

     
 
	 
</head>
<body>
<nav id="nav-3">
  <a class="link-3" href="/my-site/login-form/seller/">Orders</a>
  <a class="link-3" href="/my-site/login-form/seller/insert/front.php">Update</a>
  <a class="link-3" href="/my-site/login-form">Logout</a>
  </nav>

  <div style="margin-top:50px;"  class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
       <center> <h2>Order Details</h2> </center>
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
				$ono = $_POST['ono'];
				//echo $ono;
				if( isset($_POST["ono"]) )
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
 

 
 
	  <div class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
       <center> <h2>Posted Quantity</h2> </center>
      </div>
	  
      <div class='panel-body'>
        <form class='form-horizontal' method='post' action='updatepage.php' role='form'>


		<div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name'>Processed Quantity</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='qty' placeholder='Enter Processed Quantity' type='text' name='upqty'>
                  <?php echo  "<input class='form-control' type='hidden' name='ordno' value='". $_POST['ono'] ."' >";  ?>
                </div>
              </div>
             
            </div>
          </div>

          
           <div class='form-group' id="wrapper" ng-app="myApp">
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Pick Date</label>
            <div class='col-md-6'>
              <div class='form-group'>
               <div class='col-md-11'>
                  <input class='form-control' type="text" ng-model="datePicker"  datepicker name="ud" />
              </div>
             </div>
            </div>
          </div>

		  
           <div class='form-group'>
            <div class='col-md-offset-4 col-md-2'>
              <button class='btn-lg btn-primary' style='float:right' type='submit'>Update</button>
            </div>
           
          </div>
        </form>
      </div>
    </div>
		     
            </div>
          
		  
		

          
         

  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js'></script>

        <script src="js/index.js"></script>

</body>
    
  
</html>
