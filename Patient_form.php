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
        $query=$conn->prepare("SELECT * FROM patient");

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
    <th scope="col">Patient No</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Phone no</th>
    <th scope="col">Bottle code</th>
    <th scope="col">Date of use</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $i=0;
    while($row=$query->fetch(PDO::FETCH_OBJ)){
        $n=$row->P_NUM;
    echo"<tr>
        <td>$row->P_NUM</td>
        <td>$row->P_FNAME</td>
        <td>$row->P_LNAME</td>
        <td>$row->P_PHONE</td>
        <td>$row->BLOOD_BOTTLE_CODE</td>
        <td>$row->DATE_USED</td> 
        <td><form action='patient_form.php' method='GET' >
        <input type='hidden' value=$n name='del'/>
        <button type=submit style='border:0; background:none'><i class='material-icons'>&#xE872;</i></button>
        </form>
        </td>
        </tr>";
        $i++;
    }  
    
    
    ?>
    </tbody>
    </table>
    <!-- <div class="buttons">
    <div role="alert" action="" method="GET" >
    <button onclick="window.location.href='project.php';" id="Back" name="Back" value="2"><span>Go Back</span></button>

    <div role="alert" action="add_patient_record" method="GET" >
    <button onclick="openPopup()" id="Add" name="Add" value="2" ><span>Add a Record</span></button>
    </div> 

    <div  role="alert" action="update_patient_record" method="GET" >
    <button onclick="window.location.href='update_patient.php';" id="Update" name="Update" value="3" ><span>Update a Record</span></button>
    </div>  -->
    
    <div class="button-container">
    <button onclick="window.location.href='project.php';" id="Back" name="Back" value="2"><span>Go Back</span></button>

    <button onclick="openPopup()" id="Add" name="Add" value="2" ><span>Add a Record</span></button>

    <button onclick="window.location.href='update_patient.php';" id="Update" name="Update" value="3" ><span>Update a Record</span></button>
</div>
<?php 
        if(isset($_GET["del"])){ 
            $n = $_GET['del'];
            try{
                $conn->query("DELETE from patient where P_NUM=('$n')");
            }
            catch(exception $e){
                echo $e->getMessage();
                die('Die');
            }
        } ?>
        
<style>
    .button-container {
  width: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
}

button {
  margin-bottom: 10px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #e5e5e5;
  color: #333;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #d3d3d3;
}

</style>

    
 



   <?php if(isset($_GET["add_patient"])){ 
    $P_NUM=$_GET['P_No'];
    $P_FNAME=$_GET['fname'];
    $P_LNAME=$_GET['lname'];
    $P_PHONE=$_GET['phone'];
    $DATE_USED=$_GET['date'];
    $BLOOD_BOTTLE_CODE=$_GET['b_code'];
    try{
        $conn->query("INSERT into patient values
    ('$P_NUM','$BLOOD_BOTTLE_CODE','$P_LNAME','$P_FNAME','$P_PHONE','$DATE_USED')");
    }
    catch(exception $e){
        echo $e->getMessage();
        die('Die');
    }
    } ?>



    <div id="myPopup" class="popup">
    <div class="popup-inner">
    <h1>Enter Patient Record</h1>
        <form action="" method="GET">
        <label for="P_No">
        <strong>Patient No</strong>
        </label><br>
        <input type="number" id="P_No" name="P_No" required>
        <br>
        <label for="fname">
        <strong>First name</strong>
        </label>
        <input type="text" id="fname" name="fname" required>
        <br>
        <label for="lname">
        <strong>Last name &emsp; &emsp;</strong>
        </label>
        <input type="text" id="lname" name="lname" required>
        <br> <br>    
        <label for="phone">
        <strong>Phone Number</strong>
        </label><br>
        <input type="tel" id="phone" name="phone" required>
        <br>
        <label for="date">
        <strong>Date &emsp; &emsp; &emsp; &emsp;</strong>
        </label><br>
        <input type="date" id="date" name="date" required>
        <br>
        <label for="b_code">
        <strong>Bottle Code &emsp; </strong>
        </label>
        <input type="text" id="b_code" name="b_code" required>
        <br><br>
        <input type="hidden" name="add_patient" value="1"/>
        <button onclick="closePopup()" type="submit" class="add_btn" value="add patient record">Add</button>
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