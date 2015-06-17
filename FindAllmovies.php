<html>
<head>
    <title>Find All Movies</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 7:34 AM
 */

// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

// Create a query for the database
$query = "SELECT Mname, director, Myear, views, overall_rating, age_restriction, description FROM Movie";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="left"><b>Name <a href="AddMovie.php">(Add New Movie)</a></b></td>
	<td align="left"><b>Director</b></td>
	<td align="left"><b>year</b></td>
	<td align="left"><b>views</b></td>
	<td align="left"><b>overall rating</b></td>
	<td align="left"><b>age restriction</b></td>
	<td align="left"><b>description</b></td></tr>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['Mname'].' '.'<a href="editMovie.php?mName='.$row['Mname'].'&director='.$row['director'].'&year='.$row['Myear'].'">Edit</a>' . ' ' .
            '<a href="watchMovie.php?mName='.$row['Mname'].'&director='.$row['director'].'&year='.$row['Myear'].'">Watch</a>'. ' ' .
            '<a href="deleteMovie.php?mName='.$row['Mname'].'&director='.$row['director'].'&year='.$row['Myear'].'">Delete</a>'.' '.
            '<a href="rate.php?mName='.$row['Mname'].'&director='.$row['director'].'&year='.$row['Myear'].'">Rate</a>'.'</td><td align="left">' .
            $row['director'].'</td><td align="left">'.
            $row['Myear'].'</td><td align="left">'.
            $row['views'].'</td><td align="left">'.
            $row['overall_rating'].'</td><td align="left">'.
            $row['age_restriction'].'</td><td align="left">'.
            $row['description'].'</td><td align="left">';

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