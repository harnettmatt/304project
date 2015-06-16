<html>
<head>
    <title>Edit TV Show</title>
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
$season = $_GET['number'];

// Create a query for the database
$query = "SELECT * FROM Episode_e_has WHERE tvid='$tvid' and season_number='$season'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="left"><b>Season</b></td>
	<td align="left"><b>Episode</b></td>
	<td align="left"><b>Director</b></td>
	<td align="left"><b>Name</b></td>
	<td align="left"><b>Date</b></td>
	<td align="left"><b>Overall Rating</b></td>
	<td align="left"><b>Age Restriction</b></td>
	<td align="left"><b>View</b></td>
	<td align="left"><b>Length</b></td></tr>';


    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while ($row = mysqli_fetch_array($response)){
        echo '<tr><td align="left">' .
            $row['season_number'].'</td><td align="left">'.
            $row['episode_number'].' '.
            '<a href="editEpisode.php?id='.$row['season_number'].'&number='.$row['episode_number'].'">Edit</a>' . ' ' .
            '<a href="watch.php?id='.$row['tvid'].'&season='.$row['season_number'].'&ep='.$row['episode_number'].'">Watch</a>' . ' ' . '</td><td align="left">'.
            $row['director'].'</td><td align="left">'.
            $row['Ename'].'</td><td align="left">'.
            $row['Edate'] . '</td><td align="left">'.
            $row['overall_rating'].'</td><td align="left">'.
            $row['age_restriction'].'</td><td align="left">'.
            $row['views'].'</td><td align="left">'.
            $row['ELength'].'</td><td align="left">';
        echo '</tr>';
    }

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