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
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $CreditCard = $_POST['CreditCard'];
    $Email = $_POST['Email'];
    $ID = $_POST['ID'];
    $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $query1 = "UPDATE Account SET FirstName = '$FirstName', LastName = '$LastName' , Phone = '$Phone' , Address ='$Address' , UserName = '$UserName' , Password = '$Password'
              , CreditCard = '$CreditCard' , Email = '$Email' WHERE ID =  '$ID'";
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
$query = "SELECT * FROM Account WHERE ID =  '". "$ID". "'";
$result = $mysqli->query($query);
$row = mysqli_fetch_array($result); //try this in userauthentication
$info = array(
    'ID' => $row['ID'],
    'LastName' => $row['LastName'],
    'FirstName' => $row['FirstName'],
    'Phone' => $row['Phone'],
    'Address' => $row['Address'],
    'UserName' => $row['UserName'],
    'Password' => $row['Password'],
    'CreditCard' => $row['CreditCard'],
    'Email' => $row['Email'],
    'AccountType' => $row['AccountType']
);
?>

<html>
<head>
    <title><?php echo $info['FirstName'] . " " . $info['LastName'] . "'s Account" ?></title>
</head>
<body>
<table>
    <tr>
        <td><h2><a href="UserMovieList.php?UserName=<?php echo $info['UserName']; ?>"> Movies </a></h2></td>
        <td><h2><a href="userTvShow.php?UserName=<?php echo $info['UserName']; ?>">TV Shows</h2></td></tr>
</table>
<p><h3>Account Information</h3></p>
<form action=mainaccount.php method="post">
    <p>First Name: <input type="text" name="FirstName" size="30" value= '<?php echo $info['FirstName'] ?>' /> </p>
    <p>Last Name: <input type="text" name="LastName" size="30" value= '<?php echo $info['LastName'] ?>' /> </p>
    <p>Phone: <input type="text" name="Phone" size="30" value= '<?php echo $info['Phone'] ?>' /> </p>
    <p>Address: <input type="text" name="Address" size="30" value= '<?php echo $info['Address'] ?>' /> </p>
    <p>UserName: <input type="text" name="UserName" size="30" value= '<?php echo $info['UserName'] ?>' /> </p>
    <p>Password: <input type="text" name="Password" size="30" value= '<?php echo $info['Password'] ?>' /> </p>
    <p>Credit Card: <input type="text" name="CreditCard" size="30" value= '<?php echo $info['CreditCard'] ?>' /> </p>
    <p>Email: <input type="text" name="Email" size="30" value= '<?php echo $info['Email'] ?>' /> </p>
    <input type="hidden" name="ID" value = '<?php echo $info['ID']?>'/>
    <p><input type="submit" name="update" value="update"/></p>
</form>
</body>
</html>
