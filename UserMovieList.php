<html>
<head>
    <title> User Movies</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 3:46 PM
 */
//connect to the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$UserName = $_GET['UserName'];
echo $UserName;
$query = "SELECT * FROM Movie";

$response = @mysqli_query($mysqli, $query);

if ($response) {

    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    <tr>
    <td align="left"><b>Movie Name</b></td>
    <td align="left"><b>Director</b></td>
    <td align="left"><b>Year</b></td>
    <td align="left"><b>Views</b></td>
    <td align="left"><b>Overall Rating</b></td>
    <td align="left"><b>Age Restriction</b></td>
    <td align="left"><b>Description</b></td></tr>';
    while ($row = mysqli_fetch_array($response)) {
        $Mname = $row['Mname'];
        $director = $row['director'];
        $Myear = $row['Myear'];
        echo '<tr><td align="left">' .
            '<a href="usermovie.php?Mname=' . $Mname . '&director=' . $director . '&Myear=' . $Myear . '&UserName=' . $UserName .'">' . $row['Mname'].  '</a>' . '</td><td align="left">' .
            $row['director'] . '</td><td align="left">' .
            $row['Myear'] . '</td><td align="left">' .
            $row['views'] . '</td><td align="left">' .
            $row['overall_rating'] . '</td><td align="left">' .
            $row['age_restriction'] . '</td><td align="left">' .
            $row['description'] . '</td><td align="left">' .
            $row['Email'] . '</td><td align="left">';

        echo '</tr>';
    }
    echo '</table>';
}
else{
    echo "Could not execute query";
}

mysqli_close($mysqli);


?>
</body>
</html>