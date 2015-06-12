<?php

//$mysqli = mysqli_connect("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310moviedb");
//$res = mysqli_query($mysqli, "SELECT *  FROM Account");
//while($row = mysqli_fetch_assoc($res)){
//    echo $row;
//}

$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$res = $mysqli->query(" SELECT *  FROM Account");
while($row = $res->fetch_assoc()){
    echo $row['FirstName'];
}

?>