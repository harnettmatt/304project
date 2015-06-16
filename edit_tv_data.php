<html>
<head>
    <title>Edit Movie</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Sing4king
 * Date: 15-06-14
 * Time: 7:34 AM
 */

// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

// Variables for editing the TV show
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$year = $_POST['year'];

// Create a query for the database
$query = "UPDATE TVSeries SET TVName='$name', age_restriction='$age', TVyear='$year' WHERE tvid='$id'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response) {
    echo "Updated successfully <br/>";
    echo '<a href="findAllTvShows.php" >Done</a>';
} else {

    echo "Failed to update your request<br/>";

    echo mysqli_error($mysqli);

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>