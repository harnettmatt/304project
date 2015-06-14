
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

    if(empty($_POST['UserName'])){

    // Adds name to array
        $data_missing[] = 'User Name';

    } else {

    // Trim white space from the name and store the name
        $Uname = trim($_POST['UserName']);

    }

    if(empty($_POST['Password'])){

    // Adds name to array
        $data_missing[] = 'PassWord';

    } else{

    // Trim white space from the name and store the name
        $Pword = trim($_POST['PassWord']);

    }

    if(empty($_POST['Phone'])){

    // Adds name to array
        $data_missing[] = 'Phone';

    } else {

    // Trim white space from the name and store the name
        $phone = trim($_POST['Phone']);

    }


        if(empty($data_missing)){

            $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }

            $query = mysql_query("SELECT * FROM Account where UserName = $Uname AND PassWord = $Pword") or die(mysql_error());

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

</body>
</html>