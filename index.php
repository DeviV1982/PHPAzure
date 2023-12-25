<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php

	
		// Define database connection variables
		$servername = "servergl.mysql.database.azure.com";
		$username = "deviv";
		$password = "Password1#";
		$dbname = "mydb";

	// Create database connection
		$conn = new mysqli($servername, $username, $password, $dbname, 3306);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		$sql = "SELECT * FROM employees";
		$result = $conn->query($sql);
echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
		if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["email_id"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
echo "</table>";
		// Close database connection
		$conn->close();
	?>
</body>
</html>
