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

		ini_set ('error_reporting', E_ALL);
		ini_set ('display_errors', '1');
		error_reporting (E_ALL|E_STRICT);

		$db = mysqli_init();
		mysqli_options ($db, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

		$db->ssl_set('/etc/mysql/ssl/client-key.pem', '/etc/mysql/ssl/client-cert.pem', '/etc/mysql/ssl/ca-cert.pem', NULL, NULL);
		$link = mysqli_real_connect ($db, $servername, $username, $password , $dbname, 3306, NULL, MYSQLI_CLIENT_SSL);
if (!$link)
{
    die ('Connect error (' . mysqli_connect_errno() . '): ' . mysqli_connect_error() . "\n");
} else {
    $result = $db->query('SELECT * FROM employees;');
    print_r ($result);
	if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
    $db->close();
}

		
		//if ($result->num_rows > 0) {
		//	// Display table headers
	//		echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
//			// Loop through results and display each row in t0000he table/
//			while($row = $result->fetch_assoc()) {
//				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
//			}
//			echo "</table>";
//		} else {
//			echo "0 results";
//		}

		// Close database connection
		//$conn->close();
	?>
</body>
</html>
