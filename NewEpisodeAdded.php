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

    if(empty($_POST['Length'])){

        // Adds name to array
        $data_missing[] = 'Length';

    } else {

        // Trim white space from the name and store the name
        $length = trim($_POST['Length']);

    }

    if(empty($_POST['age_restriction'])){

        // Adds name to array
        $data_missing[] = 'Age Restriction';

    } else {

        // Trim white space from the name and store the name
        $age = trim($_POST['age_restriction']);

    }
    if(empty($_POST['date'])){

        // Adds name to array
        $data_missing[] = 'Date';

    } else {

        // Trim white space from the name and store the name
        $Date = trim($_POST['date']);

    }

    if(empty($_POST['name'])){

        // Adds name to array
        $data_missing[] = 'name';

    } else {

        // Trim white space from the name and store the name
        $name = trim($_POST['name']);

    }

    if(empty($_POST['director'])){

        // Adds name to array
        $data_missing[] = 'director';

    } else {

        // Trim white space from the name and store the name
        $Director = trim($_POST['director']);

    }

    if(empty($_POST['episode_number'])){

        // Adds name to array
        $data_missing[] = 'episode_number';

    } else {

        // Trim white space from the name and store the name
        $episode_number = trim($_POST['episode_number']);

    }

    if(empty($_POST['season_number'])){

        // Adds name to array
        $data_missing[] = 'season_number';

    } else {

        // Trim white space from the name and store the name
        $season_number = trim($_POST['season_number']);

    }

    if(empty($_POST['tvid'])){

        // Adds name to array
        $data_missing[] = 'tvid';

    } else {

        // Trim white space from the name and store the name
        $tvid = trim($_POST['tvid']);

    }

    if(empty($data_missing)){

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }


        $query = "INSERT INTO Episode_e_has (ELength, age_restriction, overall_rating, Edate, Ename, director, episode_number, season_number, tvid, views)
        VALUES (?, ?, 0, ?, ?, ?, ?, ?, ?, 0)";



        $stmt = mysqli_prepare($mysqli, $query);

        mysqli_stmt_bind_param($stmt, "sisssiii", $length, $age, $Date, $name, $Director, $episode_number, $season_number, $tvid);


        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'TV Episode Added';

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

<form action="http://localhost:63342/304project/NewEpisodeAdded.php" method="post">

    <b>Add a TV Episode</b>

    <p>Length:
        <input type="text" name="Length" size="30" value="" />
    </p>

    <p>Age Restriction:
        <input type="text" name="age_restriction" size="30" value="" />
    </p>

    <p>:Air Date
        <input type="text" name="date" size="30" value="" />
    </p>

    <p>Episode Name:
        <input type="text" name="name" size="30" value="" />
    </p>

    <p>Director:
        <input type="text" name="director" size="119" value="" />
    </p>

    <p>episode_number:
        <input type="text" name="episode_number" size="119" value="" />
    </p>

    <p>season_number:
        <input type="text" name="season_number" size="119" value="" />
    </p>

    <p>tvid:
        <input type="text" name="tvid" size="119" value="" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" />
    </p>


</form>
</body>
</html>