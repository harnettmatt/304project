<html>
<head>
    <title>Find All Employees</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 7:34 AM
 */

	// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

	// Create a query for the database
	$query = "SELECT EID, LastName, FirstName, Phone, Address, Username, Password, Email FROM Employee";

	// Get a response from the database by sending the connection
	// and the query
	$response = @mysqli_query($mysqli, $query);

	// If the query executed properly proceed
	if($response){
        echo '<table align="left"
	cellspacing="5" cellpadding="8">

	<tr><td align="left"><b>Employee ID</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Phone</b></td>
	<td align="left"><b>Address</b></td>
	<td align="left"><b>UserName</b></td>
	<td align="left"><b>Password</b></td>
	<td align="left"><b>Email</b></td></tr>';

        // mysqli_fetch_array will return a row of data from the query
        // until no further data is available
        while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="left">' .
                $row['EID'] . '</td><td align="left">' .
                $row['LastName'] . '</td><td align="left">' .
                $row['FirstName'] . '</td><td align="left">' .
                $row['Phone'] . '</td><td align="left">' .
                $row['Address'] . '</td><td align="left">' .
                $row['Username'] . '</td><td align="left">' .
                $row['Password'] . '</td><td align="left">' .
                $row['Email'] . '</td><td align="left">';

            echo '</tr>';
        }

        echo '</table>';

    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($mysqli);

    }

	// Close connection to the database
	mysqli_close($mysqli);

	?>

</body>
</html>