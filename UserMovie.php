<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 8:45 PM
 */
if (isset($_POST['submit'])){
    if (isset($_POST['rate'])){
        $rating = $_POST['rate'];
        $Mname = $_POST['Mname'];
        $director = $_POST['director'];
        $Myear = $_POST['Myear'];
        $UserName = $_POST['UserName'];


        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
        $query = "SELECT * FROM m_rate WHERE UserName =  '". "$UserName". "'";
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            //update the existing rating
        }
        else{
            $query = "INSERT INTO m_rate VALUES ($rating, $UserName, $Mname, $director, $Myear)";
            $result = $mysqli->query($query);
            if($result === TRUE){
                echo "Rating Success";
            }
            else{
                echo "Rating Failed";
            }
        }
        // insert currently not working
    }
}
else {
    $UserName = $_GET['UserName'];
    $Mname = $_GET["Mname"];
    $director = $_GET["director"];
    $Myear = $_GET["Myear"];
}
?>
<html>
<head>
    <title> <?php echo "$Mname" ?></title>
    <h1><?php echo $Mname?></h1>
</head>
<body>
    <p>
        <form action="watchmovie.php" method="post">
            <input type="hidden" name="Mname" value=<?php echo "$Mname" ?>>
            <input type="hidden" name="director" value=<?php echo "$director" ?>>
            <input type="hidden" name="Myear" value=<?php echo "$Myear" ?>>
            <input type="submit" name="watch" value="Watch">
        </form>
    </p>
<h3>Rate This Movie</h3>
    <p><form action="usermovie.php" method="post">
            <input type="hidden" name="Mname" value=<?php echo "$Mname" ?>>
            <input type="hidden" name="director" value=<?php echo "$director" ?>>
            <input type="hidden" name="Myear" value=<?php echo "$Myear" ?>>
            <input type="hidden" name="UserName" value=<?php echo "$UserName" ?>>
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
        </form>
    </p>
</body>
</html>


