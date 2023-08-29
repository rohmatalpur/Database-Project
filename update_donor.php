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
    

    if(isset($_GET["d_fname"])){ ?>
    <br>
    <form action="" method="GET">
    <label for="D_No"><strong>Donor No&emsp;&emsp;</strong></label>
    <input type="number" id="D_No" name="D_No" required><br><br>
    <label for="fname"><strong>First name&emsp;&emsp;</strong></label>
    <input type="smalltext" id="fname" name="fname" size="20" required><br><br>
    <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_fname" value="1"/>
    <input type="hidden" name="d_fname" value=1>
    <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form>
    <?php
    if(isset($_GET["update_donor_fname"])){
    $D_NUM=$_GET['D_No'];
    $D_FNAME=$_GET['fname'];
    try{   $conn->query("UPDATE donor set D_FNAME=('$D_FNAME')  where D_NUM=('$D_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:donor_form.php');}
    }
    


    else if(isset($_GET["d_lname"])){ ?>
    <br>
    <form action="" method="GET">
    <label for="D_No"><strong>donor No&emsp;&emsp;</strong></label>
    <input type="number" id="D_No" name="D_No" required><br><br>
    <label for="lname"><strong>Last name &nbsp;  &emsp;</strong></label>
    <input type="smalltext" id="lname" name="lname" size="20" required><br><br>
    <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_lname" value="1"/>
    <input type="hidden" name="l_fname" value=1>
    <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form>
    <?php
    if(isset($_GET["update_donor_lname"])){
    $D_NUM=$_GET['D_No'];
    $D_LNAME=$_GET['lname'];
    try{    $conn->query("UPDATE donor set D_LNAME=('$D_LNAME') where D_NUM=('$D_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:donor_form.php');}
    }



    else if(isset($_GET["d_phone"])){ ?>
    <br>
    <form action="" method="GET">
    <label for="D_No"><strong>Patient No&emsp;&emsp;</strong></label>
    <input type="number" id="D_No" name="D_No" required><br>
    <label for="phone"><strong>Phone No &nbsp;  &emsp;</strong></label>
    <input type="tel" id="phone" name="phone" required><br>
    <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_phone" value="1"/>
    <input type="hidden" name="phone" value=1>
    <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form>
    <?php
    if(isset($_GET["update_donor_phone"])){
    $D_NUM=$_GET['D_No'];
    $D_PHONE=$_GET['phone'];
    try{    $conn->query("UPDATE donor set D_PHONE=('$D_PHONE') where D_NUM=('$D_NUM')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:donor_form.php');}    
    }



    else if(isset($_GET["d_email"])){ ?>
        <br>
        <form action="" method="GET">
        <label for="D_No"><strong>Donor No&emsp;&emsp;</strong></label>
        <input type="number" id="D_No" name="D_No" required><br><br>
        <label for="email"><strong>Email &nbsp;  &emsp;</strong></label>
        <input type="smalltext" id="d_email" name="d_email" size="20" required><br><br>
        <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
        <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_email" value="1"/>
        <input type="hidden" name="d_email" value=1>
        <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
        </form>
        <?php
        if(isset($_GET["update_donor_email"])){
        $D_NUM=$_GET['D_No'];
        $D_EMAIL=$_GET['d_email'];
        try{    $conn->query("UPDATE donor set D_EMAIL=('$D_EMAIL') where D_NUM=('$D_NUM')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:donor_form.php');   }
    }



    else if(isset($_GET["d_date"])){ ?>
        <br>
        <form action="" method="GET">
        <label for="D_No"><strong>Donor No&emsp;&emsp;</strong></label>
        <input type="number" id="D_No" name="D_No" required><br><br>
        <label for="phone"><strong>Date of Donation &nbsp;  &emsp;</strong></label>
        <input type="date" id="d_date" name="d_date" size="20" required><br><br>
        <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
        <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_date" value="1"/>
        <input type="hidden" name="date" value=1>
        <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
        </form>
        <?php
        if(isset($_GET["update_donor_date"])){
        $D_NUM=$_GET['D_No'];
        $DATE_OF_DONATION=$_GET['d_date'];
        try{    $conn->query("UPDATE donor set DATE_OF_DONATION=('$DATE_OF_DONATION') where D_NUM=('$D_NUM')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:donor_form.php');  }
    }



    else if(isset($_GET["centre_code"])){ ?>
        <br>
        <form action="" method="GET">
        <label for="D_No"><strong>Donor No&emsp;&emsp;</strong></label>
        <input type="number" id="D_No" name="D_No" required><br><br>
        <label for="phone"><strong>Centre Code &nbsp;  &emsp;</strong></label>
        <input type="smalltext" id="centre_code" name="centre_code" size="20" required><br><br>
        <button onclick="window.location.href='update_donor.php';" type="button" class="btn_cancel" >Cancel</button>
        <form action="update_donor.php" method="GET"><input type="hidden" name="update_donor_centre_code" value="1"/>
        <input type="hidden" name="centre_code" value=1>
        <button onclick="window.location.href='donor_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
        </form>
        <?php
        if(isset($_GET["update_donor_centre_code"])){
        $D_NUM=$_GET['D_No'];
        $CENTRE_CODE=$_GET['centre_code'];
        try{    $conn->query("UPDATE donor set CENTRE_CODE=('$CENTRE_CODE') where D_NUM=('$D_NUM')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:donor_form.php');   }
    }


        
    else{?>
        <h1 style="color:#ff00ff,font-family 'Times New Roman'">Update Patient Record</h1>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;width:300px">Which Field You Want to Update
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><form method="GET">
        <input type="hidden" name="d_fname" value="1"/>
        <button type="submit" class="btn_first" >First Name</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="d_lname" value="1"/>
        <button type="submit" class="btn_last" >Last Name</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="d_phone" value="3"/>
        <button type="submit" class="btn_phone" >Phone Number</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="d_email" value="3"/>
        <button type="submit" class="btn_phone" >Email</button>
        </form></li>
        
        <li><form method="GET">
        <input type="hidden" name="d_date" value="4"/>
        <button type="submit" class="btn_date" >Date of Donation</button>
        </form></li>
        
        <li><form method="GET">
        <input type="hidden" name="centre_code" value="5"/>
        <button type="submit" class="btn_bottle" >Centre Code</button>
        </form></li>
        </ul>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <button onclick="window.location.href='donor_form.php';" type="button" class="btn_cancel" >Cancel</button>
        <?php }; ?>
    </body>
</html>
<?php } 
else{
    echo"You are requested to login first";
}?>