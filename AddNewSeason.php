<html>
<head>
    <title>Add Employee</title>
</head>
<body>
<form action="http://localhost:63342/304project/NewSeasonAdded.php" method="post">

    <b>Add a New Season</b>

    <p>TV Show TV ID:
        <input type="text" name="tvid" size="30" value="" />
    </p>

    <p>Season Number:
        <input type="text" name="season" size="30" value="" />
    </p>

    <p>Season Start Year:
        <input type="text" name="year" size="30" value="" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" />
    </p>
    <br>
    <b>Existing TV Shows</b><br><br>

    <?php
    /**
     * Created by PhpStorm.
     * User: Bhawandeep
     * Date: 15-06-14
     * Time: 7:34 AM
     */

    // Get a connection for the database
    $mysqli = new mysqli("cs310moviedb.cmtryuplfrbx.us-west-2.rds.amazonaws.com", "cs310", "cs310pass", "cs310db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    // Create a query for the database
    $query = "SELECT tvid, TVName FROM TVSeries";

    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($mysqli, $query);

    // If the query executed properly proceed
    if($response){
        echo '<table align="left"
	cellspacing="5" cellpadding="8">

	<tr><td align="left"><b>tvid</b></td>
	<td align="left"><b>TVName</b></td></tr>';

        // mysqli_fetch_array will return a row of data from the query
        // until no further data is available
        while($row = mysqli_fetch_array($response)){

            echo '<tr><td align="left">' .
                $row['tvid'] . '</td><td align="left">' .
                $row['TVName'] . '</td><td align="left">';

            echo '</tr>';
        }

        echo '</table>';

    } else {

        echo "Couldn't issue database query<br />";

        echo mysqli_error($mysqli);

    }

    // Close connection to the database
    mysqli_close($mysqli);

    ?>
</body>
</html>