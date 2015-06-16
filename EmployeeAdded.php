
<html>
<head>
    <title>Add Employee</title>
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

    if(empty($_POST['Email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['Email']);

    }

    if(empty($data_missing)){

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }


        $query = "INSERT INTO Employee (ID, LastName, FirstName, Phone, Address, UserName, Password,
        Email) VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($mysqli, $query);

        mysqli_stmt_bind_param($stmt, "sssssss", $lname, $fname, $phone, $address, $username,
            $password, $email);

        $ID = '10';

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Employee Created';

            mysqli_stmt_close($stmt);

            mysqli_close($mysqli);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error($mysqli);


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

<form action="http://localhost:63342/304project/EmployeeAdded.php" method="post">

    <b>Add a New Employee</b>

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


    <p>Email:
        <input type="text" name="Email" size="30" value="" />
    </p>


    <p>
        <input type="submit" name="submit" value="Send" />
    </p>

</form>
</body>
</html>