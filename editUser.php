<html>
<head>
    <title>Edit Users</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Sing4king
 * Date: 15-06-16
 * Time: 7:55 PM
 */

// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$id = $_GET['id'];
$username = $_GET['username'];
$pw = $_GET['pw'];

// Create a query for the database
$query = "SELECT * FROM User_U_Has WHERE ID='$id' AND username='$username' AND Password='$pw'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    $row = mysqli_fetch_array($response);

    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="center"><b>ID</b></td>
	<td align="center"><b>First Name</b></td>
	<td align="center"><b>Last Name</b></td>
	<td align="center"><b>age</b></td>
	<td align="center"><b>Username</b></td>
	<td align="center"><b>Password</b></td>';

    echo '<form method="post" action="edit_user_data.php">';
    echo '<tr>
    <td align="left">'.'<input type="hidden" name="id" class="form-control" value="'.$row['ID'].'"/>'.'</td>
    <td align="left">'.'<input type="text" name="first" class="form-control" value="'.$row['FirstName'].'"/>'.'</td>
    <td align="left">'.'<input type="text" name="last" class="form-control" value="'.$row['LastName'].'"/>'.'</td>
    <td align="left">'.'<input type="text" name="age" class="form-control" value="'.$row['age'].'"/>'.'</td>
    <td align="left">'.'<input type="hidden" name="user" class="form-control" value="'.$row['username'].'"/>'.'</td>
    <td align="left">'.'<input type="text" name="pw" class="form-control" value="'.$row['Password'].'"/>'.'</td>
    <td>'.'<input type="submit" value="Submit"/>'.'</td>';
    echo '</tr>';
    echo '</form>';

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