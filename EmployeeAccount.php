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
$query = "SELECT * FROM User_U_Has";

// Get a response from the database by sending the onnection
// and the query
$response = @mysqli_query($mysqli, $query);

// If the query executed properly proceed
if($response){
    echo '<table align="left"
	cellspacing="5" cellpadding="8" border="1">

	<tr><td align="center"><b>ID</b></td>
	<td align="center"><b>First Name</b></td>
	<td align="center"><b>Last Name</b></td>
	<td align="center"><b>age</b></td>
	<td align="center"><b>Username</b></td>
	<td align="center"><b>Password</b></td>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr>
        <td align="left">'.$row['ID'].'</td>
        <td align="left">'.$row['FirstName'].'</td>
        <td align="left">'.$row['LastName'].'</td>
        <td align="left">'.$row['age'].'</td>
        <td align="left">'.$row['username'].' '.
        '<a href="editUser.php?id='.$row['ID'].'&username='.$row['username'].'&pw='.$row['Password'].'">Edit</a>'.' '.
        '<a href="deleteUser.php?id='.$row['ID'].'&username='.$row['username'].'&pw='.$row['Password'].'">Delete</a>'.'</td>
        <td align="left">'.$row['Password'].'</td>';
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