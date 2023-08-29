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
    

    if(isset($_GET["c_name"])){ ?>
    <br>
    <form action="" method="GET">
    <label for="c_code"><strong>Centre code&emsp;&emsp;</strong></label>
    <input type="smalltext" id="c_code" name="c_code" size="20" required><br><br>
    <label for="c_name"><strong>Centre name&emsp;&emsp;</strong></label>
    <input type="smalltext" id="c_name" name="c_name" size="50" required><br><br>
    <button onclick="window.location.href='update_centre.php';" type="button" class="btn_cancel" >Cancel</button>
    <form action="update_centre.php" method="GET"><input type="hidden" name="update_centre_c_name" value="1"/>
    <input type="hidden" name="c_name" value=1>
    <button onclick="window.location.href='centre_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
    </form>
    <?php
    if(isset($_GET["update_centre_c_name"])){
    $CENTRE_CODE=$_GET['c_code'];
    $CENTRE_NAME=$_GET['c_name'];
    try{   $conn->query("UPDATE blooddonationcentre set CENTRE_NAME=('$CENTRE_NAME')  where CENTRE_CODE=('$CENTRE_CODE')"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    header('location:centre_form.php');}
    }
    


    else if(isset($_GET["city"])){ ?>
        <br>
        <form action="" method="GET">
        <label for="c_code"><strong>Centre code&emsp;&emsp;</strong></label>
        <input type="smalltext" id="c_code" name="c_code" size="20" required><br><br>
        <label for="city"><strong>City&emsp;&emsp;</strong></label>
        <input type="smalltext" id="city" name="city" size="20" required><br><br>
        <button onclick="window.location.href='update_centre.php';" type="button" class="btn_cancel" >Cancel</button>
        <form action="update_centre.php" method="GET"><input type="hidden" name="update_centre_city" value="1"/>
        <input type="hidden" name="city" value=1>
        <button onclick="window.location.href='centre_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
        </form>
        <?php
        if(isset($_GET["update_centre_city"])){
        $CENTRE_CODE=$_GET['c_code'];
        $CITY=$_GET['city'];
        try{   $conn->query("UPDATE blooddonationcentre set CITY=('$CITY')  where CENTRE_CODE=('$CENTRE_CODE')"); }
        catch(exception $e){
        echo $e->getMessage();
        die('Die');}
        header('location:centre_form.php');}
        }



    else if(isset($_GET["country"])){ ?>
            <br>
            <form action="" method="GET">
            <label for="c_code"><strong>Centre code&emsp;&emsp;</strong></label>
            <input type="smalltext" id="c_code" name="c_code" size="20" required><br><br>
            <label for="country"><strong>Country&emsp;&emsp;</strong></label>
            <input type="smalltext" id="country" name="country" size="20" required><br><br>
            <button onclick="window.location.href='update_centre.php';" type="button" class="btn_cancel" >Cancel</button>
            <form action="update_centre.php" method="GET"><input type="hidden" name="update_centre_country" value="1"/>
            <input type="hidden" name="country" value=1>
            <button onclick="window.location.href='centre_form.php';" type="submit" class="btn" style="height:40px;width:250px">Update</button></form>
            </form>
            <?php
            if(isset($_GET["update_centre_country"])){
            $CENTRE_CODE=$_GET['c_code'];
            $COUNTRY=$_GET['country'];
            try{   $conn->query("UPDATE blooddonationcentre set COUNTRY=('$COUNTRY')  where CENTRE_CODE=('$CENTRE_CODE')"); }
            catch(exception $e){
            echo $e->getMessage();
            die('Die');}
            header('location:centre_form.php');}
            }



    


        
    else{?>
        <h1 style="color:#ff00ff,font-family 'Times New Roman'">Update Centre Record</h1>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;width:300px">Which Field You Want to Update
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><form method="GET">
        <input type="hidden" name="c_name" value="1"/>
        <button type="submit" class="btn_first" >Centre Name</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="city" value="1"/>
        <button type="submit" class="btn_last" >City</button>
        </form></li>

        <li><form method="GET">
        <input type="hidden" name="country" value="3"/>
        <button type="submit" class="btn_phone" >Country</button>
        </form></li>
        
        </ul>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <button onclick="window.location.href='centre_form.php';" type="button" class="btn_cancel" >Cancel</button>
        <?php }; ?>
    </body>
</html>
<?php } 
else{
    echo"You are requested to login first";
}?>