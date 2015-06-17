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

// Passed Variables from the list of all movies
$movie = $_GET['mName'];
$director = $_GET['director'];
$year = $_GET['year'];

// Create a query for the database
$query = "SELECT * FROM Movie WHERE Mname='$movie' AND director='$director' AND Myear='$year'";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="left"><b>Name</b></td>
	<td align="left"><b>Director</b></td>
	<td align="left"><b>year</b></td>
	<td align="left"><b>views</b></td>
	<td align="left"><b>overall rating</b></td>
	<td align="left"><b>age restriction</b></td>
	<td align="left"><b>description</b></td></tr>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)) {
        echo '<form method="post" action="edit_movie_data.php">';
        echo '<tr><td align="left">'.
            '<input type="text" name="name" class="form-control" value="' . $row['Mname'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="director" class="form-control" value="' . $row['director'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="year" class="form-control" value="' . $row['Myear'] . '"/>' . '</td><td align="left">' .
            $row['views'] . '</td><td align="left">' .
            $row['overall_rating'] . '</td><td align="left">' .
            '<input type="text" name="age" class="form-control" value="' . $row['age_restriction'] . '"/>' . '</td><td align="left">' .
            '<input type="text" name="description" class="form-control" value="' . $row['description'] . '" style="width: 400px; height:50px"/>' . '</td>'.
            '<input type="submit" value="Submit"/>';
        echo '</tr>';
        echo '</form>';
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