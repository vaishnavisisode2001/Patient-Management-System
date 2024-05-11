<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Medical History</title>
	<style>

body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('PMS_BG.jpg'); /* Replace with your own image URL */
  background-size: cover;
}

		/* Style the navigation bar */
		.navbar {
		  background-color: #333;
		  overflow: hidden;
		}

        	/* Navigation links */
	.navbar a {
	  float: left;
	  display: block;
	  color: black;
	  text-align: center;
	  padding: 14px 20px;
	  text-decoration: none;
	}


	/* Change the color of links on hover */
	.navbar a:hover {
	  background-color: #ddd;
	  color: black;
	}

	/* Style the form */
	form {
	  border: 3px solid #f1f1f1;
	  width: 50%;
	  margin: 0 auto;
	  padding: 30px;
	  background-color: rgba(255, 255, 255, 0.7);
	}
	
	h1{
		text-align: center;
	}

	/* Style the form input fields */
	input[type=text], input[type=date], input[type=email], input[type=tel], textarea {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	/* Style the form submit button */
	input[type=submit], input[type=reset] {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	/* Add a hover effect to the form submit button */
	input[type=submit]:hover, input[type=reset]:hover {
	  background-color: #45a049;
	 }

	/* Style the footer */
	.footer {
	  background-color: #333;
	  color: white;
	  text-align: center;
	  padding: 10px;
	  position: fixed;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	}
</style>
</head>
<body>
	<!-- Navigation bar -->
	<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PMS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./home.html">Home</a>
              </li>
              
              
            </ul>
          </div>
          
        
        </div>
      </nav><br><br>

    <!-- Patient registration form -->
<form method = "post">
	<h1>Update Medical Details</h1>

	
	<label for="pid">Patient ID:</label>
	<input type="text" id="p_id" name="p_id"><br><br>

	<label for="did">Doctor ID:</label>
	<input type="text" id="d_id" name="d_id"><br><br>


	<label for="dateofadd">Date of Addission:</label>
	<input type="date" id="date_admit" name="date_admit"><br><br>

    <label for="dateofdis">Date of Discharge:</label>
	<input type="date" id="date_discharge" name="date_discharge"><br><br>

	<label for="medicines">Medicines:</label>
	<input type="text" id="medicines" name="medicines"><br><br>

	<label for="treatment">Treatment:</label>
	<textarea id="treatment" name="treatment"></textarea><br><br>

    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form>



<?php


          //Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "patient-management-system";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);


  

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$did = $_POST["d_id"];
		$pid = $_POST["p_id"];
		$date_admit = $_POST["date_admit"];
		$date_discharge = $_POST["date_discharge"];
		$medicines = $_POST['medicines'];
		$treatment = $_POST["treatment"];
        

		//Inserting to database table
        $sql = "UPDATE `medhist` SET `d_id` = '$did', `p_id`='$pid', `date_admit`='$date_admit', `date_discharge`= '$date_discharge', `medicines`='$medicines', `treatment` = '$treatment' WHERE `medhist`.`p_id` = $pid";
        $result = mysqli_query($conn, $sql);



        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}

//displaying records from db table
$sql = "Select * from `medhist`";
	$result = mysqli_query($conn, $sql);	

	echo "<table class ='table table-dark'>";
echo "<tr><th>Doctor ID</th><th>Patient ID</th><th>Date of Addission</th><th>Date of Discharge</th><th>Medicines</th><th>Treatment</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>" . $row["d_id"] . "</td><td>" . $row["p_id"] . "</td><td>" . $row["date_admit"] . "</td><td>" . $row["date_discharge"] . "</td><td>" . $row["medicines"] . "</td><td>" . $row["treatment"] . "</td></tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);


	?>

</body>
</html>
