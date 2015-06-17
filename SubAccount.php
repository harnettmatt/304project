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
    $Age = $_POST['Age'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $ID = $_POST['ID'];
    $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $query1 = "UPDATE User_U_Has SET FirstName = '$FirstName', LastName = '$LastName' , age = '$Age' , UserName = '$UserName' , Password = '$Password' WHERE ID =  '$ID'";
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
$query = "SELECT * FROM User_U_Has WHERE ID =  '". "$ID". "'";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result); //try this in userauthentication
$info = array(
    'ID' => $row['ID'],
    'LastName' => $row['LastName'],
    'FirstName' => $row['FirstName'],
    'UserName' => $row['username'],
    'Password' => $row['Password'],
    'Age' => $row['age']
);

?>

<html>
<head>
    <title><?php echo $info['FirstName'] . " " . $info['LastName'] . "'s Account" ?></title>
</head>
<body>
<table>
    <tr>
        <td><h2><a href="UserMovieList.php?UserName='<?php echo $info['UserName']; ?>'"> Movies </a></h2></td>
        <td><h2>TV Shows</h2></td></tr>
</table>
<p><h3>Account Information</h3></p>
<form action=subaccount.php method="post">
    <p>First Name: <input type="text" name="FirstName" size="30" value= '<?php echo $info['FirstName'] ?>' /> </p>
    <p>Last Name: <input type="text" name="LastName" size="30" value= '<?php echo $info['LastName'] ?>' /> </p>
    <p>Age: <input type="text" name="Age" size="30" value= '<?php echo $info['Age'] ?>' /> </p>
    <p>UserName: <input type="text" name="UserName" size="30" value= '<?php echo $info['UserName'] ?>' /> </p>
    <p>Password: <input type="text" name="Password" size="30" value= '<?php echo $info['Password'] ?>' /> </p>
    <input type="hidden" name="ID" value = '<?php echo $info['ID']?>'/>
    <p><input type="submit" name="update" value="update"/></p>
</form>
</body>
</html>
