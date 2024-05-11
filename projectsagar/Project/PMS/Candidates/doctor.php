<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Doctor Registration Form</title>
	<style>

body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('PMS_BG.jpg'); /* Replace with your own image URL */
  background-size: cover;
}

	/* Style the form */
	form {
	  border: 3px solid #f1f1f1;
	  width: 50%;
	  margin: 0 auto;
	  padding: 30px;
	  background-color: rgba(255, 255, 255, 0.7);
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
	<h1>Doctor Registration Form</h1>
	<label for="name">Name:</label>
	<input type="text" id="name" name="name"><br><br>

	<label for="dob">Date of Birth:</label>
	<input type="date" id="dob" name="dob"><br><br>

	<label for="gender">Gender:</label>
	<input type="radio" id="male" name="gender" value="male">
	<label for="male">Male</label>
	<input type="radio" id="female" name="gender" value="female">
	<label for="female">Female</label><br><br>

	<label for="lname">Specialisation:</label>
	<input type="text" id="specialization" name="specialization"><br><br>

	<label for="phone">Phone Number:</label>
	<input type="tel" id="phone" name="phone"><br><br>

	
	<label for="address">Address:</label>
	<textarea id="address" name="address"></textarea><br><br>

    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form><br>

<!-- Footer -->
<!-- <div class="footer">
	<p>Copyright © 2023 
	<a href="#">YourWebsite.com</a> All rights reserved.</p>
</div> -->








<?php


          //Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "patient-management-system";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);

//

// if(!$conn){
//     die("Connection was unsuccessful :".mysqli_connect_error());
// }
// else{
// echo "Connection was Successful";
// }


  

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$name = $_POST["name"];
		$dob = $_POST["dob"];
		$gender = $_POST['gender'];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
        $specialization = $_POST["specialization"];

		//Inserting to database table
$sql = "INSERT INTO `doctor` (`d_name`, `dob`, `d_gender`, `d_address`, `d_phone`, `specialization`) 
VALUES ('$name', '$dob', '$gender', '$address', '$phone', '$specialization')";
$result = mysqli_query($conn, $sql);

        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}

//displaying records from db table
$sql = "Select * from `doctor`";
	$result = mysqli_query($conn, $sql);	

	echo "<table class ='table table-dark'>";
echo "<tr><th>Doctor ID</th><th>Name</th><th>DOB</th><th>Gender</th><th>Address</th><th>Specialization</th><th>Phone</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>" . $row["d_id"] . "</td><td>" . $row["d_name"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["d_gender"] . "</td><td>" . $row["d_address"] . "</td><td>" . $row["specialization"] . "</td><td>" . $row["d_phone"] . "</td></tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);


	?>

</body>
</html>
