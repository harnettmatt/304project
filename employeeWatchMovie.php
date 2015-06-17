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
$movie = $_GET['mName'];
$director = $_GET['director'];
$year = $_GET['year'];

// Create a query for the database
$query = "SELECT * FROM Movie WHERE Mname='$movie' AND director='$director' AND Myear='$year'";
$query2 = "SELECT * FROM Movie WHERE Mname='$movie' AND director='$director' AND Myear='$year'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);
$response2= @mysqli_query($mysqli, $query2);

// If the query executed properly proceed
if($response){
    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while ($row = mysqli_fetch_array($response)){

        echo 'You are watching: '. $row['Mname'].' ('.$row['Myear'].')';
        echo '<br/><a href="FindAllmovies.php">Done</a>';

    }
} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($mysqli);

}

// Updating the view count of a movie
if ($response2) {
    $row = mysqli_fetch_array($response2);
    $view = $row['views'];
    $view += 1;

    $query3 = "UPDATE Movie SET views='$view' WHERE Mname='$movie' AND director='$director' AND Myear='$year'";
    $response3 = @mysqli_query($mysqli, $query3);

    if ($response3) {
        $row = mysql_fetch_array($response3);
    } else {
        echo "Couldn't issue database query<br />";

        echo mysqli_error($mysqli);
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