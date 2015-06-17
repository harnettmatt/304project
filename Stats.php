
<html>
<head>
    <title>Stats</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Bhawandeep
 * Date: 15-06-14
 * Time: 8:20 AM
 */

$mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}


$query = "SELECT COUNT(*) As Total FROM Movie";
$query1 = "SELECT COUNT(*) As Total FROM TVSeries";
$query2 = "SELECT Mname, views FROM Movie WHERE views = (SELECT MAX(views) FROM Movie)";
$query3 = "SELECT Ename, views, TVName FROM Episode_e_has E, TVSeries T WHERE T.tvid=E.tvid AND views = (SELECT MAX(views) FROM Episode_e_has)";
$query4 = "SELECT Mname, views FROM Movie WHERE views = (SELECT MIN(views) FROM Movie)";
$query5 = "SELECT Ename, views, TVName FROM Episode_e_has E, TVSeries T WHERE T.tvid=E.tvid AND views = (SELECT MIN(views) FROM Episode_e_has)";

$query6 = "SELECT Mname, overall_rating FROM Movie WHERE overall_rating = (SELECT MAX(overall_rating) FROM Movie)";
$query7 = "SELECT Ename, E.overall_rating, TVName FROM Episode_e_has E, TVSeries T WHERE T.tvid=E.tvid AND E.overall_rating = (SELECT MAX(overall_rating) FROM Episode_e_has)";
$query8 = "SELECT Mname, overall_rating FROM Movie WHERE overall_rating = (SELECT MIN(overall_rating) FROM Movie)";
$query9 = "SELECT Ename, E.overall_rating, TVName FROM Episode_e_has E, TVSeries T WHERE T.tvid=E.tvid AND E.overall_rating = (SELECT MIN(overall_rating) FROM Episode_e_has)";
$query10 = "SELECT S.username FROM Account S WHERE NOT EXISTS (SELECT C.Mname FROM Movie C WHERE NOT EXISTS (SELECT E.username FROM m_watch E WHERE C.Mname=E.Mname AND E.username=S.username))";
$query11 = "SELECT x.Mname as M_name, MAX(x.hello) as average FROM (SELECT Mname, AVG(user_rating) as hello FROM m_rate Group By Mname) x";
$query12 = "SELECT x.Mname as M_name, MIN(x.hello) as average FROM (SELECT Mname, AVG(user_rating) as hello FROM m_rate Group By Mname) x";


echo "Total Number of Movies:     ";

$response = @mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($response)){
    echo '<tr><td align="left">' .
        "&emsp;".$row['Total'] . '</td><td align="left">' ;
    echo '</tr>';
}

echo "<br><br><br>Total Number of TV Shows:     ";

$response1 = @mysqli_query($mysqli, $query1);
while($row1 = mysqli_fetch_array($response1)){
    echo '<tr><td align="left">' .
        "&emsp;".$row1['Total'] . '</td><td align="left">' ;
    echo '</tr>';
}

echo "<br><br><br>Most Viewed Movie:     ";
$response2 = @mysqli_query($mysqli, $query2);
while($row2 = mysqli_fetch_array($response2)){
    echo '<tr><td align="left">' .
        "&emsp;".$row2['Mname'] . '</td><td align="left">' .
        "&emsp;views:" . $row2['views'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}
echo "<br><br><br>Most Viewed TV Episode:     ";

$response3 = @mysqli_query($mysqli, $query3);
while($row3 = mysqli_fetch_array($response3)){
    echo '<tr><td align="left">' .
        "&emsp;" .$row3['TVName'] . '</td><td align="left">'.
        "&emsp;" .$row3['Ename'] . '</td><td align="left">' .
        "&emsp;views:" . $row3['views'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Least Viewed Movie:     ";

$response4 = @mysqli_query($mysqli, $query4);
while($row4 = mysqli_fetch_array($response4)){
    echo '<tr><td align="left">' .
        "&emsp;".$row4['Mname'] . '</td><td align="left">' .
        "&emsp;views:" . $row4['views'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Least Viewed TV Episode:     ";

$response5 = @mysqli_query($mysqli, $query5);
while($row5 = mysqli_fetch_array($response5)){
    echo '<tr><td align="left">' .
        "&emsp;" .$row5['TVName'] . '</td><td align="left">'.
        "&emsp;" .$row5['Ename'] . '</td><td align="left">' .
        "&emsp;views:" . $row5['views'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Highest Rated Movie     ";

$response6 = @mysqli_query($mysqli, $query6);
while($row6 = mysqli_fetch_array($response6)){
    echo '<tr><td align="left">' .
        "&emsp;".$row6['Mname'] . '</td><td align="left">' .
        "&emsp;Overall Rating:" . $row6['overall_rating'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Highest Rated TV Episode     ";

$response7 = @mysqli_query($mysqli, $query7);
while($row7 = mysqli_fetch_array($response7)){
    echo '<tr><td align="left">' .
        "&emsp;" .$row7['TVName'] . '</td><td align="left">'.
        "&emsp;" .$row7['Ename'] . '</td><td align="left">' .
        "&emsp;Overall Rating:" . $row7['overall_rating'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Lowest Rated Movie     ";

$response8 = @mysqli_query($mysqli, $query8);
while($row8 = mysqli_fetch_array($response8)){
    echo '<tr><td align="left">' .
        "&emsp;".$row8['Mname'] . '</td><td align="left">' .
        "&emsp;Overall Rating:" . $row8['overall_rating'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Lowest Rated TV Episode     ";

$response9 = @mysqli_query($mysqli, $query9);
while($row9 = mysqli_fetch_array($response9)){
    echo '<tr><td align="left">' .
        "&emsp;" .$row9['TVName'] . '</td><td align="left">'.
        "&emsp;" .$row9['Ename'] . '</td><td align="left">' .
        "&emsp;Overall Rating:" . $row9['overall_rating'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}

echo "<br><br><br>Users who have watched all movies:     ";

$response10 = @mysqli_query($mysqli, $query10);
while($row10 = mysqli_fetch_array($response10)){
    echo '<tr><td align="left">' .
        "&emsp;" . $row10['username'] . '</td><td align="left">'."&emsp;&emsp;";
    echo '</tr>';
}


echo "<br><br><br>Average User Rating of Most Rated Movie:     ";

$response11 = @mysqli_query($mysqli, $query11);
while($row11 = mysqli_fetch_array($response11)){
echo '<tr><td align="left">' .
        "&emsp;" .$row11['M_name'] . '</td><td align="left">'.
        "&emsp;Average Rating:" . $row11['average'] . '</td><td align="left">'."&emsp;&emsp;";
        echo '</tr>';
}

?>


</body>
</html>