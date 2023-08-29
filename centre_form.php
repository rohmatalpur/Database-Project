<?php 
session_start();
if(isset($_SESSION['ss_username'])){?>
<html>
    <head>
    <link rel="stylesheet" href="project.css">
    </head>

    <body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
    try{
        $query=$conn->prepare("SELECT * FROM blooddonationcentre");

    }
    catch(exception $e){
        echo $e->getMessage();
        die('Die');
    }
    
    $query->execute();
    
     ?>
    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">Centre Code</th>
    <th scope="col">Centre Name</th>
    <th scope="col">City</th>
    <th scope="col">Country</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $i=0;
    while($row=$query->fetch(PDO::FETCH_OBJ)){
        $n=$row->CENTRE_CODE;
    echo"<tr>
        <td>$row->CENTRE_CODE</td>
        <td>$row->CENTRE_NAME</td>
        <td>$row->CITY</td>
        <td>$row->COUNTRY</td>
        <td><form action='centre_form.php' method='GET' >
        <input type='hidden' value=$n name='del'/>
        <button type=submit style='border:0; background:none'><i class='material-icons'>&#xE872;</i></button>
        </form>
        </td>
        </tr>";
        $i++;
    }  ?>
    </tbody>
    </table>
    <div class="buttons">
    <div role="alert" action="" method="GET" >
    <button onclick="window.location.href='project.php';" id="Back" name="Back" value="2"><span>Go Back</span></button>

    <div role="alert" action="add_centre_record" method="GET" >
    <button onclick="openPopup()" id="Add" name="Add" value="2" ><span>Add a Record</span></button>
    </div> 

    <div  role="alert" action="update_centre_record" method="GET" >
    <button onclick="window.location.href='update_centre.php';" id="Update" name="Update" value="3" ><span>Update a Record</span></button>
    </div> 
    
    
 

    <?php 
        if(isset($_GET["del"])){ 
            $n = $_GET['del'];
            try{
                $conn->query("DELETE from blooddonationcentre where CENTRE_CODE=('$n')");
            }
            catch(exception $e){
                echo $e->getMessage();
                die('Die123');
            }
        } ?>


   <?php if(isset($_GET["add_centre"])){ 
    $CENTRE_CODE=$_GET['C_code'];
    $CENTRE_NAME=$_GET['C_name'];
    $CITY=$_GET['city'];
    $COUNTRY=$_GET['country'];
    try{
        $conn->query("INSERT into blooddonationcentre values
    ('$CENTRE_CODE','$CENTRE_NAME','$CITY','$COUNTRY')");
    }
    catch(exception $e){
        echo $e->getMessage();
        die('Die');
    }
    } ?>



    <div id="myPopup" class="popup">
    <div class="popup-inner">
    <h1>Enter Centre Record</h1>
        <form action="" method="GET">
        <label for="C_code">
        <strong>Centre code</strong>
        </label><br>
        <input type="text" id="C_code" name="C_code" required>
        <br>
        <label for="C_name">
        <strong>Centre name</strong>
        </label>
        <input type="text" id="C_name" name="C_name" required>
        <br>
        <label for="city">
        <strong>City &emsp; &emsp;</strong>
        </label>
        <input type="text" id="city" name="city" required>
        <br> <br>    
        <label for="country">
        <strong>Country</strong>
        </label><br>
        <input type="country" id="country" name="country" required>
        <br>
        
        <br><br>
        <input type="hidden" name="add_centre" value="1"/>
        <button onclick="closePopup()" type="submit" class="add_btn" value="add centre record">Add</button>
        <button onclick="closePopup()" type="button" class="btn_cancel" >Cancel</button>
        </form>



        

        <script>
        function openPopup() {
            document.getElementById("myPopup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("myPopup").style.display = "none";
        }
        </script>

    </body>

</html>
<?php } 
else{
    echo"You are requested to login first";
}?>