<html>
<head>
    <title>Delete User</title>
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
$username = $_GET['user'];
$pw = $_GET['pw'];

// Create a query for the database
$query = "DELETE FROM User_U_Has WHERE ID='$id' AND username='$username' AND Password='$pw'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    $row = mysqli_fetch_array($response);

    echo 'Deleted successfully';
    echo '<br/><a href="FindUsers.php" >Done</a>';
} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($mysqli);

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>