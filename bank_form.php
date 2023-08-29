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
        $query=$conn->prepare("SELECT * FROM bloodbank");

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
    <th scope="col">Blood Bottle Code</th>
    <th scope="col">Blood Type</th>
    <th scope="col">Entry date</th>
    <th scope="col">Expiry date</th>
    <th scope="col">Centre Code</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $i=0;
    while($row=$query->fetch(PDO::FETCH_OBJ)){
        $n=$row->BLOOD_BOTTLE_CODE;
    echo"<tr>
        <td>$row->BLOOD_BOTTLE_CODE</td>
        <td>$row->BLOOD_TYPE</td>
        <td>$row->ENTRY_DATE</td>
        <td>$row->EXPIRY_DATE</td>
        <td>$row->CENTRE_CODE</td>
        <td><form action='bank_form.php' method='GET' >
        <input type='hidden' value=$n name='del'/>
        <button type=submit style='border:0; background:none'><i class='material-icons'>&#xE872;</i></button>
        </form>
        </td>
        </tr>";
    }  ?>
    </tbody>
    </table>
    <div class="buttons">
    <div role="alert" action="" method="GET" >
    <button onclick="window.location.href='project.php';" id="Back" name="Back" value="2"><span>Go Back</span></button>

    <div role="alert" action="add_bank_record" method="GET" >
    <button onclick="openPopup()" id="Add" name="Add" value="2" ><span>Add a Record</span></button>
    </div> 

    <!-- <div  role="alert" action="update_bank_record" method="GET" >
    <button onclick="window.location.href='update_bank.php';" id="Update" name="Update" value="3" ><span>Update a Record</span></button>
    </div>  -->
    
    
 



   <?php if(isset($_GET["add_bank"])){ 
    $BLOOD_BOTTLE_CODE=$_GET['bottle_code'];
    $CENTRE_CODE=$_GET['C_code'];
    $BOTTLE_TYPE=$_GET['b_type'];
    $ENTRY_DATE=$_GET['en_date'];
    $EXPIRY_DATE=$_GET['ex-date'];
    try{
        $conn->query("INSERT into bloodbank values
    ('$BLOOD_BOTTLE_CODE','$BOTTLE_TYPE','$ENTRY_DATE','$EXPIRY_DATE','$CENTRE_CODE')");
    }
    catch(exception $e){
        echo $e->getMessage();
        die('Die');
    }
    } ?>



    <div id="myPopup" class="popup">
    <div class="popup-inner">
    <h1>Enter Bank Record</h1>
        <form action="" method="GET">
        <label for="bottle_code">
        <strong>Blood Bottle code</strong>
        </label><br>
        <input type="text" id="bottle_code" name="bottle_code" required>
        <br>
        <label for="C_code">
        <strong>Centre code</strong>
        </label>
        <input type="text" id="C_code" name="C_code" required>
        <br>
        <label for="en_date">
        <strong>Entry Date</strong>
        </label>
        <input type="date" id="en_date" name="en_date" required>
        <br>
        <label for="ex_date">
        <strong>Expiry Date</strong>
        </label>
        <input type="date" id="ex_date" name="ex_date" required>
        <br>
        <label for="b_type">
        <strong>Blood Type &emsp; &emsp;</strong>
        </label>
        <input type="text" id="b_type" name="b_type" required>
        
        
        <br><br>
        <input type="hidden" name="add_bank" value="1"/>
        <button onclick="closePopup()" type="submit" class="add_btn" value="add bank record">Add</button>
        <button onclick="closePopup()" type="button" class="btn_cancel" >Cancel</button>
        </form>



        <?php 
        if(isset($_GET["del"])){ 
            $n = $_GET['del'];
            print_r($n);
            try{
                $conn->query("DELETE from bloodbank where BLOOD_BOTTLE_CODE=('$n')");
            }
            catch(exception $e){
                echo $e->getMessage();
                die('Die');
            }
        } ?>
        

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