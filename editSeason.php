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
$number = $_GET['number'];

// Create a query for the database
$query = "SELECT * FROM Season_s_has WHERE tvid='$tvid' AND season_number='$number'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

    <td align="left"><b>Id</b></td>
	<td align="left"><b>Season</b></td>
	<td align="left"><b>Date</b></td>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while ($row = mysqli_fetch_array($response)){
        echo '<form method="post" action="editSeasonData.php">';
        echo '<tr><td align="left">' . '<form method="post" action="edit_movie_data.php">'.
            '<input type="hidden" name="id" class="form-control" value="' . $tvid . '"/>' . '</td><td align="left">' .
            '<input type="hidden" name="number" class="form-control" value="' . $row['season_number'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="date" class="form-control" value="' . $row['Sdate'] . '"/>' . '</td><td align="left">' .
            '<input type="submit" value="Submit"/>';
        echo '</tr>';
        echo '</form>';    }

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