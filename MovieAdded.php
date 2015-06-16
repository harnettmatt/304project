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

    if(empty($_POST['Mname'])){

        // Adds name to array
        $data_missing[] = 'Movie Name';

    } else {

        // Trim white space from the name and store the name
        $Mname = trim($_POST['Mname']);

    }

    if(empty($_POST['director'])){

        // Adds name to array
        $data_missing[] = 'director';

    } else{

        // Trim white space from the name and store the name
        $director = trim($_POST['director']);

    }

    if(empty($_POST['Myear'])){

        // Adds name to array
        $data_missing[] = 'Movie Year';

    } else {

        // Trim white space from the name and store the name
        $Myear = trim($_POST['Myear']);

    }

    if(empty($_POST['age_restriction'])){

        // Adds name to array
        $data_missing[] = 'Age Restriction';

    } else {

        // Trim white space from the name and store the name
        $age = trim($_POST['age_restriction']);

    }

    if(empty($_POST['description'])){

        // Adds name to array
        $data_missing[] = 'Description';

    } else {

        // Trim white space from the name and store the name
        $description = trim($_POST['description']);

    }


    if(empty($data_missing)){

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }


        $query = "INSERT INTO Movie (Mname, director, Myear, views, overall_rating, age_restriction, description)
        VALUES (?, ?, ?, 0, 0.0, ?, ?)";



        $stmt = mysqli_prepare($mysqli, $query);

        mysqli_stmt_bind_param($stmt, "ssiis", $Mname, $director, $Myear, $age, $description);


        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Movie Added';

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

<form action="http://localhost:63342/304project/MovieAdded.php" method="post">

    <b>Add a New Movie</b>

    <p>Movie Name:
        <input type="text" name="Mname" size="30" value="" />
    </p>

    <p>Director:
        <input type="text" name="director" size="30" value="" />
    </p>

    <p>Movie Year:
        <input type="text" name="Myear" size="30" value="" />
    </p>

    <p>Age Restriction:
        <input type="text" name="age_restriction" size="30" value="" />
    </p>

    <p>Description:
        <input type="text" name="description" size="119" value="" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" />
    </p>

</form>
</body>
</html>