<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 8:45 PM
 */
$Mname =  $_GET["Mname"];
$director = $_GET["director"];
$Myear = $_GET["Myear"];

?>
<html>
<head>
    <title> <?php echo "$Mname" ?></title>
</head>
<body>

<form action="http://localhost:63342/304project/RatingAdded.php" method="post">
    <table>
        <tr>
            <td><input type="radio" name = "rate" value="1">1</td>
            <td><input type="radio" name = "rate" value="2">2</td>
            <td><input type="radio" name = "rate" value="3">3</td>
            <td><input type="radio" name = "rate" value="4">4</td>
            <td><input type="radio" name = "rate" value="5">5</td>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</body>
</html>


