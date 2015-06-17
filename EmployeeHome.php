<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 8:20 AM
 */

if (isset( $_POST['update'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $ID = $_POST['ID'];
    $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $query1 = "UPDATE Employee SET FirstName = '$FirstName', LastName = '$LastName' , Phone = '$Phone' , Address = '$Address' , Email = '$Email' ,Username = '$UserName' , Password = '$Password' WHERE ID =  '$ID'";
    $result1 = $mysqli->query($query1);
}
else{
    session_start();
    $ID = $_SESSION['ID'];
}
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
$query = "SELECT * FROM Employee WHERE ID =  '". "$ID". "'";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result); //try this in userauthentication
$info = array(
    'ID' => $row['ID'],
    'LastName' => $row['LastName'],
    'FirstName' => $row['FirstName'],
    'Phone' => $row['Phone'],
    'Address' => $row['Address'],
    'Email' => $row['Email'],
    'Username' => $row['Username'],
    'Password' => $row['Password'],
);
?>

<html>
<head>
    <title><?php echo $info['FirstName'] . " " . $info['LastName'] . "'s Account" ?></title>
</head>
<body>
<table>
    <tr>
        <td><h2><a href="FindAllmovies.php?UserName=<?php echo $info['Username']; ?>"> Movies </a></h2></td>
        <td><h2><a href="findAllTVShows.php?UserName=<?php echo $info['Username']; ?>">TV Shows</a></h2></td>
        <td><h2><a href="FindAllUsers.php">Accounts</a></h2></td>
        <td><h2><a href="FindUsers.php">Users</a></h2></td>
        <td><h2><a href="stat.php">Dashboard</a></h2></td></tr>
</table>
<p><h3>Account Information</h3></p>
<form action=EmployeeHome.php method="post">
    <p>First Name: <input type="text" name="FirstName" size="30" value= '<?php echo $info['FirstName'] ?>' /> </p>
    <p>Last Name: <input type="text" name="LastName" size="30" value= '<?php echo $info['LastName'] ?>' /> </p>
    <p>Phone: <input type="text" name="Phone" size="30" value= '<?php echo $info['Phone'] ?>' /> </p>
    <p>Address: <input type="text" name="Address" size="30" value= '<?php echo $info['Address'] ?>' /> </p>
    <p>Email: <input type="text" name="Email" size="30" value= '<?php echo $info['Email'] ?>' /> </p>
    <p>UserName: <input type="text" name="UserName" size="30" value= '<?php echo $info['Username'] ?>' /> </p>
    <p>Password: <input type="text" name="Password" size="30" value= '<?php echo $info['Password'] ?>' /> </p>
    <input type="hidden" name="ID" value = '<?php echo $info['ID']?>'/>
    <p><input type="submit" name="update" value="update"/></p>
</form>
</body>
</html>
