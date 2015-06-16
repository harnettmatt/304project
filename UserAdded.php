
<html>
<head>
<title>Add User</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 8:20 AM
 */

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['FirstName'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $fname = trim($_POST['FirstName']);

    }

    if(empty($_POST['LastName'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $lname = trim($_POST['LastName']);

    }

    if(empty($_POST['Phone'])){

        // Adds name to array
        $data_missing[] = 'Phone';

    } else {

        // Trim white space from the name and store the name
        $phone = trim($_POST['Phone']);

    }

    if(empty($_POST['Address'])){

        // Adds name to array
        $data_missing[] = 'Address';

    } else {

        // Trim white space from the name and store the name
        $address = trim($_POST['Address']);

    }

    if(empty($_POST['UserName'])){

        // Adds name to array
        $data_missing[] = 'UserName';

    } else {

        // Trim white space from the name and store the name
        $username = trim($_POST['UserName']);

    }

    if(empty($_POST['Password'])){

        // Adds name to array
        $data_missing[] = 'Password';

    } else {

        // Trim white space from the name and store the name
        $password = trim($_POST['Password']);

    }

    if(empty($_POST['CreditCard'])){

        // Adds name to array
        $data_missing[] = 'CreditCard';

    } else {

        // Trim white space from the name and store the name
        $credit = trim($_POST['CreditCard']);

    }

    if(empty($_POST['Email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['Email']);

    }

    if(empty($_POST['AccountType'])){

        // Adds name to array
        $data_missing[] = 'AccountType';

    } else {

        // Trim white space from the name and store the name
        $type = trim($_POST['AccountType']);

    }

    if(empty($data_missing)){

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }

        $query1 = "SELECT * FROM Account";
        $result = $mysqli->query($query1);

        $rowcount=mysqli_num_rows($result);
        $rowcount++;

        $query = "INSERT INTO Account (ID, LastName, FirstName, Phone, Address, UserName, Password, CreditCard,
        Email, AccountType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($mysqli, $query);

        mysqli_stmt_bind_param($stmt, "ssssssssss", $rowcount, $lname, $fname, $phone, $address, $username,
            $password, $credit, $email, $type);

        $ID = '5';

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'User Created';

            mysqli_stmt_close($stmt);

            mysqli_close($mysqli);

        } else {

            echo 'Error Occurred<br />';


            mysqli_stmt_close($stmt);

            mysqli_close($mysqli);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

<form action="http://localhost:63342/304project/UserAdded.php" method="post">

    <b>Add a New User</b>

    <p>First Name:
        <input type="text" name="FirstName" size="30" value="" />
    </p>

    <p>Last Name:
        <input type="text" name="LastName" size="30" value="" />
    </p>

    <p>Phone:
        <input type="text" name="Phone" size="30" value="" />
    </p>

    <p>Address:
        <input type="text" name="Address" size="30" value="" />
    </p>

    <p>User Name:
        <input type="text" name="UserName" size="30" value="" />
    </p>

    <p>Password:
        <input type="text" name="Password" size="30" value="" />
    </p>

    <p>Credit Card:
        <input type="text" name="CreditCard" size="30" value="" />
    </p>

    <p>Email:
        <input type="text" name="Email" size="30" value="" />
    </p>

    <p>Account Type:
        <input type="text" name="AccountType" size="30" value="" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" />
    </p>

</form>
</body>
</html>