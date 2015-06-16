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
$query = "SELECT * FROM Episode_e_has WHERE season_number='$tvid' AND episode_number='$number'";

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
        echo '<form method="post" action="edit_episode_data.php">';
        echo '<tr><td align="left">' . '<form method="post" action="edit_episode_data.php">'.
            '<input type="hidden" name="season" class="form-control" value="'.$row['season_number'].'"/>'.'</td><td align="left">' .
            '<input type="hidden" name="episode" class="form-control" value="'. $row['episode_number'].'"/>' . '</td><td align="left">' .
            '<input type="text" name="director" class="form-control" value="' . $row['director'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="name" class="form-control" value="' . $row['Ename'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="date" class="form-control" value="' . $row['Edate'] . '"/>' . '</td><td align="left">' .
            $row['overall_rating'].'</td><td align="left">'.
            '<input type="text" name="age" class="form-control" value="' . $row['age_restriction'] . '"/>' . '</td><td align="left">' .
            $row['views'].'</td><td align="left">'.
            '<input type="text" name="length" class="form-control" value="' . $row['ELength'] . '"/>' . '</td><td align="left">' .
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