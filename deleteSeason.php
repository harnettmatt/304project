<html>
<head>
    <title>Edit Season</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: sing4king
 * Date: 15-06-14
 * Time: 7:34 AM
 */

// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$tvid = $_GET['id'];
$number = $_GET['number'];

// Create a query for the database
$query = "DELETE FROM Season_s_has WHERE tvid='$tvid' AND season_number='$number'";
$query2 = "SELECT * FROM Season_s_has WHERE tvid='$tvid'";


// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);
$response2 = @mysqli_query($mysqli, $query2);

// If the query executed properly proceed
if($response){
    $result = mysqli_num_rows($response2);

    if ($result > 0) {
        echo 'Deleted Successfully!';
        echo '<br/><a href="season.php?id='.$tvid.'">Done</a>';
    } else {
        echo 'Deleted Successfully!';
        echo '<br/><a href="findAllTvShows.php?id='.$tvid.'">Done</a>';
    }
} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($mysqli);

}

// Close connection to the database
mysqli_close($mysqli);

?>

</body>
</html>