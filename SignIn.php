<html>
<head>
    <title>Sign In</title>
</head>
<body>

<form action=UserAuthenticate.php method="post">
    <b>Sign In</b>

    <p>User Name:
        <input type="text" name="UserName" size="30" value="" />
    </p>

    <p>Password:
        <input type="text" name="Password" size="30" value="" />
    </p>


    <p>
        <input type="submit" name="submit" value="Send" />
    </p>

</form>
<a href="addUser.php"> Sign Up For An Account</a>
</body>
</html>