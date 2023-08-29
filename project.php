<!DOCTYPE html>
<?php session_start();
if(isset($_SESSION['ss_username'])){?>
<html>
    <head>
        <title>BLOOD DONATION MANAGEMENT SYSTEM</title>
        <link rel="stylesheet" href="project.css">
    </head>
    <body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
        
        
        
        
        <h1  style="color:#ff00ff,font-family 'Times New Roman'"><center>Blood Donation Management System</center></h1>
        <br>
        <br>
        <br>
        <div class="alert alert-primary" role="alert" style="font-size:xx-large;" action="patient_database" method="GET" >
            <form action="patient_form.php" method="GET" >
                <input type="hidden" name="patient" value="1"/>
                <input type="submit" value="Show Patient Database">
            </form>
        </div> 

        <div class="alert alert-secondary" role="alert" style="font-size:xx-large;">
            <form action="donor_form.php" method="GET" >
                <input type="hidden" name="patient" value="1"/>
                <input type="submit" value="Show Donor Database">
            </form>
        </div>

        <div class="alert alert-success" role="alert" style="font-size:xx-large;">
        <form action="centre_form.php" method="GET" >
                <input type="hidden" name="centre" value="1"/>
                <input type="submit" value="Show Donation Centre Database">
            </form>
        </div>

        <div class="alert alert-danger" role="alert" style="font-size:xx-large;">
        <form action="bank_form.php" method="GET" >
                <input type="hidden" name="bank" value="1"/>
                <input type="submit" value="Show Bank Database">
            </form>
        </div>

        <br><br>

        <div style="float:centre">
        <form align="centre" method="GET" action="project_login.php">
        <input type="hidden" name="logout" value="3"/>
        <button type="submit" class="btn_phone" >Log Out</button>
        </form>
        </div>
        

        <?php
        // print_r($_GET);
        // if(isset($_GET["logout"])){
        //     echo"vghmb";
        //     // session_start();
        //     session_unset();
        //     session_destroy();
        // }?>
        </body>

</html>
<?php }
else{
    echo"You are requested to login first";
} ?>
