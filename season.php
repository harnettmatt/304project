<html>
<head>
    <title>TV Show - Season</title>
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

// Create a query for the database
$query = "SELECT * FROM Season_s_has WHERE tvid='$tvid'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

    <td align="left"><b>Id</b></td>
	<td align="left"><b>Season <a href="AddNewSeason.php">(Add New Season)</a></b></td>
	<td align="left"><b>Date</b></td>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while ($row = mysqli_fetch_array($response)){
        echo '<tr><td align="left">' .
            $row['tvid'] . '</td><td align="left">'.
            $row['season_number'].' '.
            '<a href="editSeason.php?id='.$row['tvid'].'&number='.$row['season_number'].'">Edit</a>' . ' ' .
            '<a href="episode.php?id='.$row['tvid'].'&number='.$row['season_number'].'">Watch</a>' . ' ' .
            '<a href="deleteSeason.php?id='.$row['tvid'].'&number='.$row['season_number'].'">Delete</a>'.' '.'</td><td align="left">'.
            $row['Sdate'] . '</td><td align="left">';
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