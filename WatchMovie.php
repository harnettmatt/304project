<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 4:34 PM
 */



if (isset( $_POST['watch'])){
    $Mname = $_POST['Mname'];
    $director = $_POST['director'];
    $Myear = $_POST['Myear'];
    $UserName = $_POST['UserName'];
    echo 'Watching ' . $Mname;
    $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    //ADD ROW TO REPRESENT USER WATCHES MOVIE
    $query1 = "SELECT * FROM m_watch WHERE UserName =  '$UserName' and Mname = '$Mname'";
    $result1 = $mysqli->query($query1);
    if($result1->num_rows < 1){
        $query2 = "INSERT INTO m_watch VALUES (0, '$UserName','$Mname', '$director', '$Myear')";
        $result2 = $mysqli->query($query2);
    }

    // COUNT VIEWS
    $query3 = "SELECT * FROM Movie WHERE Mname = '$Mname' AND director = '$director' and Myear = '$Myear'";
    $result3 = $mysqli->query($query3);
    $row = mysqli_fetch_array($result3);
    $views = $row['views'];
    $views +=1;
    $query4 = "UPDATE Movie SET views = '$views' WHERE Mname =  '$Mname' and director = '$director' and myear = '$Myear'";
    $result4 = $mysqli->query($query4);
}
else{
    echo 'Could not find movie name';
}
?>

<html>
<head>
    <title>
        <?php
            if (isset( $_POST['Mname'])){
                echo 'Watching ' . $_POST['Mname'];
                }
            else{
                echo 'Could not find movie name';
            }?>
    </title>
<!--    make sure to change the title to be dependant on the movie or tv show being watched-->
</head>
</html>

