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

// Variables for editing the season
$id = $_POST['id'];
$number = $_POST['number'];
$date = $_POST['date'];

// Create a query for the database
$query = "UPDATE Season_s_has SET Sdate='$date' WHERE tvid='$id' AND season_number='$number' ";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response) {
    echo 'Updated successfully';
    echo '<br/>';
    echo '<a href="season.php?id='.$id.'">Done</a>';
} else {

    echo "Failed to update your request<br/>";

    echo mysqli_error($mysqli);
    echo '<br/>';
    echo '<a href="editSeasonData.php">Back</a>';

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>