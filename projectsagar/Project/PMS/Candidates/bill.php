<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Bill</title>
	<style>
.navbar-brand{
	color: black;
}

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

		/* Style the navigation bar
		.navbar {
		  background-color: #333;
		  overflow: hidden;
		} */

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
	<h1>Bill Details</h1>
	<label for="billid"> Bill ID:</label>
	<input type="int" id="b_id" name="b_id"><br><br>

	<label for="patientId"> Patient ID:</label>
	<input type="int" id="p_id" name="p_id"><br><br>

	<label for="Pathology Fees">Pathology Fees:</label>
	<input type="int" id="pathology_fees" name="pathology_fees"><br><br>

	<label for="roomfees">Room Fees:</label>
	<input type="int" id="room_fees" name="room_fees"><br><br>

	<label for="Misc">Misc:</label>
	<input type="int" id="misc" name="misc"><br><br>


    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form><br>


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
	
		
		$b_id = $_POST["b_id"];
		$p_id = $_POST["p_id"];
		$pathology_fees = $_POST['pathology_fees'];
		$room_fees = $_POST["room_fees"];
		$misc = $_POST["misc"];
		$t = $pathology_fees + $room_fees + $misc;
        $total = $t;

		//Inserting to database table
$sql = "INSERT INTO `bill` (`b_id`, `p_id`, `pathology_fees`, `room_fees`, `misc`, `total`) 
VALUES ('$b_id', '$p_id', '$pathology_fees', '$room_fees', '$misc', '$total')";
$result = mysqli_query($conn, $sql);


        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}

//displaying records from db table
$sql = "Select * from `bill`";
	$result = mysqli_query($conn, $sql);	

	echo "<table class ='table table-dark'>";
echo "<tr><th>Bill ID</th><th>Patient ID</th><th>Pathology Fees</th><th>Room Fees</th><th>Miscellaneous</th><th>Total</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>" . $row["b_id"] . "</td><td>" . $row["p_id"] . "</td><td>" . $row["pathology_fees"] . "</td><td>" . $row["room_fees"] . "</td><td>" . $row["misc"] . "</td><td>" . $row["total"] . "</td></tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);


	?>

</body>
</html>
