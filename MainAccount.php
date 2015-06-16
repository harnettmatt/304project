<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 8:20 AM
 */

// if post update info


session_start();
$Uname = $_SESSION['Uname'];
$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
$query = "SELECT * FROM Account WHERE UserName =  '". "$Uname". "'";
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
        <td><h2>TV Shows</h2></td></tr>
</table>
<p><h3>Account Information</h3></p>
<form action=mainaccount.php method="post">
    <p>First Name: <input type="text" name="FirstName" size="30" value= <?php echo $info['FirstName'] ?> /> </p>
    <p>Last Name: <input type="text" name="LastName" size="30" value= <?php echo $info['LastName'] ?> /> </p>
    <p>Phone: <input type="text" name="Phone" size="30" value= <?php echo $info['Phone'] ?> /> </p>
    <p>Address: <input type="text" name="Address" size="30" value= <?php echo $info['Address'] ?> /> </p>
    <p>UserName: <input type="text" name="UserName" size="30" value= <?php echo $info['UserName'] ?> /> </p>
    <p>Password: <input type="text" name="Password" size="30" value= <?php echo $info['Password'] ?> /> </p>
    <p>Credit Card: <input type="text" name="CreditCard" size="30" value= <?php echo $info['CreditCard'] ?> /> </p>
    <p>Email: <input type="text" name="Email" size="30" value= <?php echo $info['Email'] ?> /> </p>
    <p><input type="submit" name="update" value="update"/></p>
</form>
</body>
</html>
