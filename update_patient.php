<?php 
session_start();
if(isset($_SESSION['ss_username'])){?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="project.css">
    </head>

    <body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    
    <?php
    $username = "rohmatalpur";
    $password = "pakistan";
    try {
    $conn = new PDO("mysql:host=localhost;dbname=blood_donation_management_system", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    

    if(isset($_GET["p_fname"])){ ?>
    <br>
    <!-- <form action="" method="GET">
    <label for="P_No"><strong>Patient No&emsp;&emsp;</strong></label>
    <input type="number" id="P_No" name="P_No" required><br><br>
    <label for="fname"><strong>First name&emsp;&emsp;</strong></label>
    <input type="smalltext" id="fname" name="fname" size="20" required><br><br>
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_patient.php" method="GET"><input type="hidden" name="update_patient_fname" value="1"/>
    <input type="hidden" name="p_fname" value=1>
    <button onclick="window.location.href='patient_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form> -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
    <form action="" method="GET">
    <div class="form-group">
    <label for="P_No"><strong>Patient No</strong></label>
    <input type="number" class="form-control" id="P_No" name="P_No" required>
    </div>
    <div class="form-group">
    <label for="fname"><strong>First name</strong></label>
    <input type="text" class="form-control" id="fname" name="fname" required>
    </div>
    <div class="d-flex justify-content-center">
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn btn-secondary mr-2">Cancel</button>
    <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
    <input type="hidden" name="update_patient_fname" value="1"/>
    <input type="hidden" name="p_fname" value=1>
    </form>
    </div>
    </div>


    <?php
    if(isset($_GET["update_patient_fname"])){
    $P_NUM=$_GET['P_No'];
    $P_FNAME=$_GET['fname'];
    try{   $conn->query("UPDATE patient set P_FNAME=('$P_FNAME')  where P_NUM=('$P_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:patient_form.php');}
    }
    


    else if(isset($_GET["p_lname"])){ ?>
    <br>
    <!-- <form action="" method="GET">
    <label for="P_No"><strong>Patient No&emsp;&emsp;</strong></label>
    <input type="number" id="P_No" name="P_No" required><br><br>
    <label for="lname"><strong>Last name &nbsp;  &emsp;</strong></label>
    <input type="smalltext" id="lname" name="lname" size="20" required><br><br>
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_patient.php" method="GET"><input type="hidden" name="update_patient_lname" value="1"/>
    <input type="hidden" name="l_fname" value=1>
    <button onclick="window.location.href='patient_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form> -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
    <form action="" method="GET">
    <div class="form-group">
    <label for="P_No"><strong>Patient No</strong></label>
    <input type="number" class="form-control" id="P_No" name="P_No" required>
    </div>
    <div class="form-group">
    <label for="lname"><strong>Last name</strong></label>
    <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
    <div class="d-flex justify-content-center">
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn btn-secondary mr-2">Cancel</button>
    <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
    <input type="hidden" name="update_patient_lname" value="1"/>
    <input type="hidden" name="l_fname" value=1>
    </form>
    </div>
    </div>

    <?php
    if(isset($_GET["update_patient_lname"])){
    $P_NUM=$_GET['P_No'];
    $P_LNAME=$_GET['lname'];
    try{    $conn->query("UPDATE patient set P_LNAME=('$P_LNAME') where P_NUM=('$P_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:patient_form.php');}
    }



    else if(isset($_GET["p_phone"])){ ?>
    <br>
    <!-- <form action="" method="GET">
    <label for="P_No"><strong>Patient No&emsp;&emsp;</strong></label>
    <input type="number" id="P_No" name="P_No" required><br>
    <label for="phone"><strong>Phone No &nbsp;  &emsp;</strong></label>
    <input type="tel" id="phone" name="phone" required><br>
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_patient.php" method="GET"><input type="hidden" name="update_patient_phone" value="1"/>
    <input type="hidden" name="phone" value=1>
    <button onclick="window.location.href='patient_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form> -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
    <form action="" method="GET">
    <div class="form-group">
    <label for="P_No"><strong>Patient No</strong></label>
    <input type="number" class="form-control" id="P_No" name="P_No" required>
    </div>
    <div class="form-group">
    <label for="phone"><strong>Phone No</strong></label>
    <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="d-flex justify-content-center">
    <button onclick="window.location.href='update_patient.php';" type="button" class="btn btn-secondary mr-2">Cancel</button>
    <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
    <input type="hidden" name="update_patient_phone" value="1"/>
    <input type="hidden" name="phone" value=1>
    </form>
    </div>
    </div>

    <?php
    if(isset($_GET["update_patient_phone"])){
    $P_NUM=$_GET['P_No'];
    $P_PHONE=$_GET['phone'];
    try{    $conn->query("UPDATE patient set P_PHONE=('$P_PHONE') where P_NUM=('$P_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:patient_form.php');}    
    }



    else if(isset($_GET["p_date"])){ ?>
        <br>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
        <form action="" method="GET">
        <div class="form-group">
        <label for="P_No"><strong>Patient No</strong></label>
        <input type="number" class="form-control" id="P_No" name="P_No" required>
        </div>
        <div class="form-group">
        <label for="date"><strong>Date of Use</strong></label>
        <input type="date" class="form-control" id="p_date" name="p_date" required>
        </div>
        <div class="d-flex justify-content-center">
        <button onclick="window.location.href='update_patient.php';" type="button" class="btn btn-secondary mr-2">Cancel</button>
        <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
        <input type="hidden" name="update_patient_date" value="1"/>
        <input type="hidden" name="phone" value=1>
        </form>
        </div>
        </div>
        <?php
        if(isset($_GET["update_patient_date"])){
        $P_NUM=$_GET['P_No'];
        $DATE_USED=$_GET['p_date'];
        try{    $conn->query("UPDATE patient set DATE_USED=('$DATE_USED') where P_NUM=('$P_NUM')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:patient_form.php');  }
    }



    else if(isset($_GET["bottle_code"])){ ?>
        <br>
        <!-- <form action="" method="GET">
        <label for="P_No"><strong>Patient No&emsp;&emsp;</strong></label>
        <input type="number" id="P_No" name="P_No" required><br><br>
        <label for="phone"><strong>Bottle Code &nbsp;  &emsp;</strong></label>
        <input type="smalltext" id="bottle_code" name="bottle_code" size="20" required><br><br>
        <button onclick="window.location.href='update_patient.php';" type="button" class="btn_cancel" >Cancel</button>
        <form action="update_patient.php" method="GET"><input type="hidden" name="update_patient_bottle_code" value="1"/>
        <input type="hidden" name="bottle_code" value=1>
        <button onclick="window.location.href='patient_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
        </form> -->

        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
        <form action="" method="GET">
        <div class="form-group">
        <label for="P_No"><strong>Patient No</strong></label>
        <input type="number" class="form-control" id="P_No" name="P_No" required>
        </div>
        <div class="form-group">
        <label for="bottle_code"><strong>Bottle Code</strong></label>
        <input type="text" class="form-control" id="bottle_code" name="bottle_code" required>
        </div>
        <div class="d-flex justify-content-center">
        <button onclick="window.location.href='update_patient.php';" type="button" class="btn btn-secondary mr-2">Cancel</button>
        <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
        <input type="hidden" name="update_patient_bottle_code" value="1"/>
        <input type="hidden" name="l_fname" value=1>
        </form>
        </div>
        </div>
        

        <?php
        if(isset($_GET["update_patient_bottle_code"])){
        $P_NUM=$_GET['P_No'];
        $BLOOD_BOTTLE_CODE=$_GET['bottle_code'];
        try{    $conn->query("UPDATE patient set BLOOD_BOTTLE_CODE=('$BLOOD_BOTTLE_CODE') where P_NUM=('$P_NUM')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:patient_form.php');   }
    }


        
    else{?>
        <!-- <h1 style="color:#ff00ff,font-family 'Times New Roman'">Update Patient Record</h1>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;width:300px">Which Field You Want to Update
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><form method="GET">
        <input type="hidden" name="p_fname" value="1"/>
        <button type="submit" class="btn_first" >First Name</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="p_lname" value="1"/>
        <button type="submit" class="btn_last" >Last Name</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="p_phone" value="3"/>
        <button type="submit" class="btn_phone" >Phone Number</button>
        </form></li>
        
        <li><form method="GET">
        <input type="hidden" name="p_date" value="4"/>
        <button type="submit" class="btn_date" >Date of Use</button>
        </form></li>
        
        <li><form method="GET">
        <input type="hidden" name="bottle_code" value="5"/>
        <button type="submit" class="btn_bottle" >Bottle Code</button>
        </form></li>
        </ul>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <button onclick="window.location.href='patient_form.php';" type="button" class="btn_cancel" >Cancel</button> -->


 
        <head>
	<style>
		body {
			background-color: #f4f4f4;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
		}
		
		h1 {
			color: #2f2f2f;
			font-size: 36px;
			font-weight: 600;
			margin-top: 50px;
			margin-bottom: 40px;
			text-align: center;
		}
		
		.dropdown {
			margin-top: 50px;
			text-align: center;
            text-align: center;
		}
		
		.dropdown-toggle {
			background-color: #4285f4;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 18px;
			padding: 10px 20px;
			transition: all 0.3s ease;
			width: 300px;
            
		}
		
		.dropdown-toggle:hover {
			background-color: #3367d6;
		}
		
		.dropdown-menu {
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-top: 10px;
			padding: 20px;
			width: 300px;
           
		}
		
		.btn-option {
			background-color: #f4f4f4;
			border: none;
			cursor: pointer;
			font-size: 18px;
			margin-bottom: 10px;
			padding: 10px 20px;
			text-align: left;
			transition: all 0.3s ease;
			width: 100%;
			color: #2f2f2f;
		}
		
		.btn-option:hover {
			background-color: #e8e8e8;
		}
		
		.btn-cancel {
			background-color: #f44336;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 18px;
			font-weight: 600;
			margin-top: 20px;
			padding: 10px 20px;
			transition: all 0.3s ease;
			width: 150px;
		}
		
		.btn-cancel:hover {
			background-color: #d32f2f;
		}
	</style>
</head>

<body>
	<h1>Update Patient Record</h1>
	<div class="dropdown">
		<button class="dropdown-toggle" type="button" data-toggle="dropdown">Which Field You Want to Update</button>
		<ul class="dropdown-menu">
			<li><button type="button" class="btn-option" onclick="location.href='update_patient.php?p_fname=1';">First Name</button></li>
			<li><button type="button" class="btn-option" onclick="location.href='update_patient.php?p_lname=1';">Last Name</button></li>
			<li><button type="button" class="btn-option" onclick="location.href='update_patient.php?p_phone=1';">Phone Number</button></li>
			<li><button type="button" class="btn-option" onclick="location.href='update_patient.php?p_date=1';">Date of Use</button></li>
			<li><button type="button" class="btn-option" onclick="location.href='update_patient.php?bottle_code=1';">Bottle
            <button onclick="window.location.href='patient_form.php';" type="button" class="btn_cancel" >Cancel</button>

</

        <?php } ?>
    </body>
</html>
<?php } 
else{
    echo"You are requested to login first";
}?>