<html>
<head>
    <title>Add TV Show</title>
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

    if(empty($_POST['Name'])){

        // Adds name to array
        $data_missing[] = 'Name';

    } else {

        // Trim white space from the name and store the name
        $Name = trim($_POST['Name']);

    }

    if(empty($_POST['age_restriction'])){

        // Adds name to array
        $data_missing[] = 'Age Restriction';

    } else {

        // Trim white space from the name and store the name
        $age = trim($_POST['age_restriction']);

    }
    if(empty($_POST['year'])){

        // Adds name to array
        $data_missing[] = 'Movie Year';

    } else {

        // Trim white space from the name and store the name
        $year = trim($_POST['year']);

    }



    if(empty($data_missing)){

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }

        $query1 = "SELECT * FROM TVSeries";
        $result = $mysqli->query($query1);

        $rowcount=mysqli_num_rows($result);
        $rowcount++;

        $query = "INSERT INTO TVSeries (tvid, TVName, age_restriction, TVyear, overall_rating)
        VALUES ($rowcount, ?, ?, ?, 0.0)";



        $stmt = mysqli_prepare($mysqli, $query);

        mysqli_stmt_bind_param($stmt, "sii", $Name, $age, $year);


        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'TV Show Added';

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

<form action="http://localhost:63342/304project/NewTVShowAdded.php" method="post">

    <b>Add New TV Show</b>

    <p>Show Name:
        <input type="text" name="Name" size="30" value="" />
    </p>

    <p>Age Restriction:
        <input type="text" name="age_restriction" size="30" value="" />
    </p>

    <p>Start Year:
        <input type="text" name="year" size="30" value="" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" />
    </p>


</form>
</body>
</html>