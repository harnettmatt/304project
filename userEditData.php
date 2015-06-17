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

$id = $_POST['id'];
$last = $_POST['last'];
$first = $_POST['first'];
$age = $_POST['age'];
$user = $_POST['user'];
$pw = $_POST['pw'];

// Create a query for the database
$query = "UPDATE User_U_Has SET LastName='$last', FirstName='$first', age='$age', Password='$pw' WHERE ID='$id' AND username='$user'";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo 'Updated successfully!';
    echo '<br/><a href="FindUsers.php">Done</a>';
} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($mysqli);

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>