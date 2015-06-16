<html>
<head>
    <title>Watch Movie</title>
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

// Passed Variables from the list of all movies
$id = $_GET['id'];
$season = $_GET['season'];
$ep = $_GET['ep'];

// Create a query for the database
$query = "SELECT * FROM TVSeries t, Season_s_has s, Episode_e_has e WHERE t.tvid='$id' and s.season_number='$season' and e.episode_number='$ep'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    if ($row = mysqli_fetch_array($response)){

        echo 'You are watching: '. $row['TVName'].' - Season '.$row['season_number'].' - Ep. '.$row['episode_number'].': '.$row['Ename'].'';
        echo '<br/><a href="FindAllmovies.php">Done</a>';

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