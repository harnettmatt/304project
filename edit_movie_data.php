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

// Variables for editing the movie
$moName = $_POST['name'];
$edit_director = $_POST['director'];
$edit_Year = $_POST['year'];
$edit_age = $_POST['age'];
$edit_description = $_POST['description'];

// Create a query for the database
$query = "UPDATE Movie SET director='$edit_director', Myear='$edit_Year', age_restriction='$edit_age', description='$edit_description' WHERE Mname='$moName'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response) {
    echo "Updated successfully <br/>";
    echo '<a href="FindAllmovies.php" >Done</a>';
} else {

    echo "Failed to update your request<br/>";

    echo mysqli_error($mysqli);

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>