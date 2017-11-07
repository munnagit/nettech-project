<!DOCTYPE html>
<html>

 <head>
    <meta charset="UTF-8">
    <title>Add Order Form</title>
     
	 <link rel="stylesheet" href="css/menu.css">
     <link rel="stylesheet" href="css/style.css">
     <script src="js/prefixfree.min.js"></script>
	 
	 <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	  <link href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
   <!--<link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
  <link href='http://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet' type='text/css'>
 <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js' type='text/javascript'></script>
  <script src='http://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js' type='text/javascript'></script>
  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
  -->
	 
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
   if( isset($_POST["mname"]) )
	   {
      if (preg_match("/[^A-Za-z'-]/",$_POST['mname'] )) {
         die ("invalid name and name should be alpha");
      }
      echo "Welcome ". $_POST['mname']. "<br />";
	  echo "Welcome ". $_POST['colour']. "<br />";
	  echo "Welcome ". $_POST['fabric']. "<br />";
	  echo "Welcome ". $_POST['dia']. "<br />";
	  echo "Welcome ". $_POST['quantity']. "<br />";
	  echo "Welcome ". $_POST['date']. "<br />";
     
	 $mname = addslashes ($_POST['mname']);
	 $colour = addslashes ($_POST['colour']);
	 $fabric = addslashes ($_POST['fabric']);
	 $dia = addslashes ($_POST['dia']);
	 $quantity = addslashes ($_POST['quantity']);
	 $rdate = addslashes ($_POST['date']);
	 $dia = addslashes ($_POST['dia']);
       include("connection.php");
	   
	  $sql = "INSERT INTO ord ". "(mname, colour, fabric, dia, qty, rdate) ". "VALUES('$mname','$colour','$fabric','$dia','$quantity',STR_TO_DATE('$rdate', '%d/%m/%Y'))";
			   
	   if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
	   
      exit();
   }
?>
  <div class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
       <center> <h2>Add New Order</h2> </center>
      </div>
	  
      <div class='panel-body'>
        <!-- <form action = " method = "POST" class='form-horizontal' role='form'> -->
		 <form action = "<?php $_PHP_SELF ?>" method = "POST" class='form-horizontal'>
		<div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name'>Mill Name</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='mill' placeholder='Mill' type='text' name="mname">
                </div>
              </div>
             
            </div>
          </div>
		  
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Colour</label>
            <div class='col-md-2'>
              <select class='form-control' id='clr' name="colour">
                <option value="Scarlet">Scarlet</option>
                <option value="Blushing bride">Blushing bride</option>
                <option value="Aqua sky">Aqua sky</option>
				<option value="Bright white">Bright white</option>
				<option value="Pale Banana">Pale Banana</option>
				<option value="Pink carnation">Pink carnation</option>
				<option value="Prism  pink">Prism  pink</option>
              </select>
            </div>
          </div>
		  
		  <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Fabric</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='id_fab' placeholder='fabric type' type='text' name="fabric">
                </div>
              </div>
             
            </div>
          </div>
		  
		  <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Dia</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='id_quan' placeholder='Dia Size' type='text' name="dia">
                </div>
              </div>
             
            </div>
          </div>
		  
		  <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='name' >Quantity</label>
            <div class='col-md-6'>
              <div class='form-group'>
                <div class='col-md-11'>
                  <input class='form-control' id='id_quan' placeholder='Quantity' type='text' name="quantity">
                </div>
              </div>
             
            </div>
          </div>
		  
		  <div class='form-group' id="wrapper" ng-app="myApp">
			<label class='control-label col-md-2 col-md-offset-2' for='name' >Required Date</label>
			<div class='col-md-6'>
			<div class='form-group'>
            <div class='col-md-11'>
            <input class='form-control' type="text" ng-model="datePicker" placeholder='Required Date' datepicker name="date" />
			</div>
              </div>
             
            </div>
          </div>
		  
		

          
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-3'>
              <button class='btn-lg btn-primary' type='submit'>Add Order</button>
            </div>
            <div class='col-md-3'>
              <button class='btn-lg btn-danger' style='float:right' type='button'>Cancel</button>
			  
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
