<html>
<head>
    <title>Find All Users</title>
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

$id = $_GET['id'];
$user = $_GET['user'];
$pw = $_GET['pw'];

// Create a query for the database
$query = "SELECT * FROM User_U_Has WHERE ID='$id' AND username='$user' AND Password='$pw'";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left" cellspacing="5" cellpadding="8">

	    <tr><td align="left"><b>ID</b></td>
	    <td align="left"><b>Last Name</b></td>
	    <td align="left"><b>First Name</b></td>
	    <td align="left"><b>Age</b></td>
	    <td align="left"><b>UserName</b></td>
	    <td align="left"><b>Password</b></td>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){
        echo '<form method="post" action="userEditData.php">';
        echo '<tr>
            <td align="left">'.'<input type="hidden" name="id" class="form-control" value="' . $row['ID'] . '"/>'.'</td>
            <td align="left">'.'<input type="text" name="last" class="form-control" value="' . $row['LastName'] . '"/>'.'</td>
            <td align="left">'.'<input type="text" name="first" class="form-control" value="' . $row['FirstName'] . '"/>'.'</td>
            <td align="left">'.'<input type="text" name="age" class="form-control" value="' . $row['age'] . '"/>'.'</td>
            <td align="left">'.'<input type="hidden" name="user" class="form-control" value="' . $row['UserName'] . '"/>'.'</td>
            <td align="left">'.'<input type="text" name="pw" class="form-control" value="' . $row['Password'] . '"/>'.'</td>
            <td align="left">'.'<input type="submit" value="Submit"/>'.'</td>';
        echo '</form>';
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