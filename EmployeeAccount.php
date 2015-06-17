<html>
<head>
    <title>List of Users</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Sing4king
 * Date: 15-06-16
 * Time: 7:34 PM
 */

// Get a connection for the database
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

// Create a query for the database
$query = "SELECT * FROM Account";
$user=$_GET['UserName'];

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
    <td align="left"><b>Last Name</b></td>
    <td align="left"><b>First Name</b></td>
    <td align="left"><b>Phone</b></td>
    <td align="left"><b>Address</b></td>
    <td align="left"><b>UserName</b></td>
    <td align="left"><b>Password</b></td>
    <td align="left"><b>CreditCard</b></td>
    <td align="left"><b>Email</b></td>
    <td align="left"><b>AccountType</b></td></tr>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){
        echo '<tr>
        <td align="left">'.$row['ID'].'</td>
        <td align="left">'.$row['LastName'].'</td>
        <td align="left">'.$row['FirstName'].'</td>
        <td align="left">'.$row['Phone'].'</td>
        <td align="left">'.$row['Address'].'</td>
        <td align="left">'.$row['username'].' '.
        '<a href="editUser.php?id='.$row['ID'].'&username='.$row['username'].'&pw='.$row['Password'].'">Edit</a>'.' '.
        '<a href="deleteUser.php?id='.$row['ID'].'&username='.$row['username'].'&pw='.$row['Password'].'">Delete</a>'.'</td>';
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