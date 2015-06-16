<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 8:20 AM
 */

if(isset($_POST['submit'])) {

    if (empty($_POST['UserName'])) {

        // Adds name to array
        $data_missing[] = 'User Name';

    } else {

        // Trim white space from the name and store the name
        $Uname = $_POST['UserName'];

    }

    if (empty($_POST['Password'])) {

        // Adds name to array
        $data_missing[] = 'PassWord';

    } else {

        // Trim white space from the name and store the name
        $Pword = $_POST['PassWord'];

    }


    if (empty($data_missing)) {

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }

        $Uname = mysqli_real_escape_string($mysqli, $Uname);
        $Pword = mysqli_real_escape_string($mysqli, $Pword);

        $query = "SELECT * FROM Account WHERE UserName =  '". "$Uname". "'";
        "AND PassWord = '" ."$Pword"."'";
        $result = $mysqli->query($query);

        $query2 = "SELECT * FROM User_U_Has WHERE username =  '". "$Uname". "'";
        "AND Password = '" ."$Pword"."'";
        $result2 = $mysqli->query($query2);

        $query3 = "SELECT * FROM Employee WHERE Username =  '". "$Uname". "'";
        "AND Password = '" ."$Pword"."'";
        $result3 = $mysqli->query($query3);



        if($result->num_rows > 0) {
            session_start();
            $_SESSION['Uname'] = $Uname;
//            $_SESSION['Pword'] = $Pword;   CANNOT ACCESS $PWORD
            header("location:MainAccount.php");
            exit;
        } else if ($result2->num_rows > 0){
            header("location:SubAccount.php");
            exit;
        } else if ($result3->num_rows > 0){
            header("location:EmployeeAccount.php");
            exit;
        } else {
            echo "Incorrect User Name or Password, please try again!";
            echo "$mname";
            echo "$pw";
        }
    } else {
        echo "Please enter both UserName and Password!";
    }


}

?>
<!---->
<!--<html>-->
<!--<head>-->
<!--    <title>Authenticate</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!---->
<!---->
<!---->
<!--</body>-->
<!--</html>-->