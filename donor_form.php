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
    try{    $query=$conn->prepare("SELECT * FROM donor"); }
    catch(exception $e){
    echo $e->getMessage();
    die('Die');}
    $query->execute();
    ?>
    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="col">Donor No</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Phone no</th>
    <th scope="col">Email</th>
    <th scope="col">Centre code</th>
    <th scope="col">Date of Donation</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php 
    $i=0;
    while($row=$query->fetch(PDO::FETCH_OBJ)){
        $n=$row->D_NUM;
    echo"<tr>
        <td>$row->D_NUM</td>
        <td>$row->D_FNAME</td>
        <td>$row->D_LNAME</td>
        <td>$row->D_PHONE</td>
        <td>$row->D_EMAIL</td>
        <td>$row->CENTRE_CODE</td>
        <td>$row->DATE_OF_DONATION</td> 
        <td><form action='donor_form.php' method='GET' >
        <input type='hidden' value=$n name='del'/>
        <button type=submit style='border:0; background:none'><i class='material-icons'>&#xE872;</i></button> 
        </form></td>
        </tr>";
        $i++;
    }  ?>

    </tbody>
    </table>
    <div class="buttons">
    <button onclick="window.location.href='project.php';" id="Back" ><span>Go Back</span></button>

    <div role="alert" action="add_donor_record" method="GET" >
    <button onclick="openPopup()" id="Add" name="Add" value="2" ><span>Add a Record</span></button>
    </div> 

    <div role="alert" action="update_donor_record" method="GET" >
    <button onclick="window.location.href='update_donor.php';" id="Update" name="Update" value="3" ><span>Update a Record</span></button>
    </div> 
    </div>
    
 


    <?php if(isset($_GET["add_donor"])){ 
        $D_NUM=$_GET['D_No'];
        $D_FNAME=$_GET['d_fname'];
        $D_LNAME=$_GET['d_lname'];
        $D_PHONE=$_GET['d_phone'];
        $D_EMAIL=$_GET['d_email'];
        $DATE_OF_DONATION=$_GET['donation_date'];
        $CENTRE_CODE=$_GET['centre_code'];
        try{
            $conn->query("INSERT into donor values
        ('$D_NUM','$CENTRE_CODE','$D_LNAME','$D_FNAME','$D_PHONE','$DATE_OF_DONATION','$D_EMAIL')");
        }
        catch(exception $e){
            echo $e->getMessage();
            die('Die');
        }
        } ?>


    <div id="myPopup" class="popup">
    <div class="popup-inner">
    <h1>Enter Donor Record</h1>
        <form action="" method="GET">
        <label for="D_No">
        <strong>Doctor No</strong>
        </label><br>
        <input type="number" id="D_No" name="D_No" required>
        <br>
        <label for="d_fname">
        <strong>First name</strong>
        </label>
        <input type="text" id="d_fname" name="d_fname" required>
        <br>
        <label for="d_lname">
        <strong>Last name &emsp; &emsp;</strong>
        </label>
        <input type="text" id="d_lname" name="d_lname" required>
        <br> <br>    
        <label for="d_phone">
        <strong>Phone Number</strong>
        </label><br>
        <input type="tel" id="d_phone" name="d_phone" required>
        <br>
        <label for="d_email">
        <strong>Email</strong>
        </label><br>
        <input type="text" id="d_email" name="d_email" required>
        <br>
        <label for="donation_date">
        <strong>Donation Date &emsp; &emsp; &emsp; &emsp;</strong>
        </label><br>
        <input type="date" id="donation_date" name="donation_date" required>
        <br>
        <label for="centre_code">
        <strong>Centre Code &emsp; </strong>
        </label>
        <input type="text" id="centre_code" name="centre_code" required>
        <br><br>
        <input type="hidden" name="add_donor" value="1"/>
        <button onclick="closePopup()" type="submit" class="add_btn" value="add patient record">Add</button>
        <button onclick="closePopup()" type="button" class="btn_cancel" >Cancel</button>
        </form>




        <?php if(isset($_GET["del"])){ 
            $n = $_GET['del'];
        try{   $conn->query("DELETE from donor where D_NUM=('$n')");    }
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