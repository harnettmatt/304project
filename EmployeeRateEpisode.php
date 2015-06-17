<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 15-06-17
 * Time: 12:47 PM
 */

if (isset($_POST['submit'])) {
    if (isset($_POST['rate'])) {
        $rating = $_POST['rate'];
        $ID = $_POST['ID'];
        $UserName = $_POST['UserName'];
        $season = $_POST['season'];
        $ep = $_POST['ep'];

        $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        }
        $query1 = "SELECT * FROM e_rate WHERE username = '$UserName' and tvid = '$id' and season_number = '$season' and ep_number = '$ep'";
        $result1 = $mysqli->query($query1);
        if ($result1->num_rows > 0) {
            $query2 = "UPDATE e_rate SET user_rating = '$rating' WHERE username = '$UserName'";
            $result2 = $mysqli->query($query2);
            if ($result2 === TRUE) {
                echo "Rating Success";
            } else {
                echo "Rating Failed";
            }
        } else {
            $query3 = "INSERT INTO e_rate VALUES ('$rating', '$UserName', '$ep', '$season', '$ID')";
            $result3 = $mysqli->query($query3);
            if ($result3 === TRUE) {
                echo "Rating Success";
            } else {
                echo "Rating Failed";
            }

            //average rating not applicable now
//        $query4 = "SELECT user_rating from m_rate where Mname='$Mname' and director = '$director' and Myear = '$Myear'";
//        $result4 = $mysqli->query($query4);
//        $totalrating=0;
//        $ratingcounter=0;
//        while ($row = mysqli_fetch_array($result4)){
//            $totalrating += $row['user_rating'];
//            $ratingcounter+=1;
//        }
//        $averagerating = ($totalrating/$ratingcounter);
//        $query5 = "UPDATE Movie SET overall_rating='$averagerating' where Mname='$Mname' and director = '$director' and Myear = '$Myear'";
//        $result5 = $mysqli->query($query5);
        }
    }
}
else {
    $id = $_GET['id'];
    $UserName = $_GET['UserName'];
    $ep = $_GET['ep'];
    $season = $_GET['season'];
}
?>
<html>
<head>
    <title>Rate Episode <?php echo $ep ?></title>
</head>
</html>
<h3>Rate This Episode</h3>
<p><form action="EmployeeRateEpisode.php" method="post">
    <input type="hidden" name="ID" value=<?php echo "$id" ?>>
    <input type="hidden" name="UserName" value=<?php echo "$UserName" ?>>
    <input type="hidden" name="ep" value='<?php echo "$ep" ?>'>
    <input type="hidden" name="season" value='<?php echo "$season" ?>'>
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
