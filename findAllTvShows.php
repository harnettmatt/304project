<html>
<head>
    <title>Find All TV Shows</title>
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

// Create a query for the database
$query = "SELECT * FROM TVSeries";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<a href="FindAllmovies.php" style="font-size:x-large">List of Movies</a>'.' '.
        '<a href="findAllTvShows.php" style="font-size:x-large">List of TV Shows</a>'.' '.
        '<a href="FindAllUsers.php" style="font-size:x-large">List of Users</a>'.'<br/>';

    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="left"><b>ID</b></td>
	<td align="left"><b>Name <a href="AddNewTvSeries.php">(Add New TV Series)</a></b></td>
	<td align="left"><b>Age Restriction</b></td>
	<td align="left"><b>Year</b></td>
	<td align="left"><b>Overall Rating</b></td>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['tvid'] . '</td><td align="left">' .
            $row['TVName'] . ' ' .
            '<a href="editTvShow.php?id='.$row['tvid'].'">Edit</a>' . ' ' .
            '<a href="season.php?id='.$row['tvid'].'">Watch</a>' . ' ' .
            '<a href="deleteShow.php?id='.$row['tvid'].'">Delete</a>'.' '.
            '<a href="rate.php?id='.$row['tvid'].'">Rate</a>' . '</td><td align="left">' .
            $row['age_restriction'] . '</td><td align="left">' .
            $row['TVyear'] . '</td><td align="left">' .
            $row['overall_rating'] . '</td>';
        echo '</tr>';
    }
    echo '</tr>';
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