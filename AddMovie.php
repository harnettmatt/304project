<html>
<head>
    <title>Add Employee</title>
</head>
<body>
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