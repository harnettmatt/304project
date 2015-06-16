<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 4:34 PM
 */
if (isset( $_POST['watch'])){
    $Mname = $_POST['Mname'];
    $director = $_POST['Mname'];
    $Myear = $_POST['Mname'];
    echo 'Watching ' . $Mname;
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
                echo 'Watching ' . $_POST['Mname']; }
            else{
                echo 'Could not find movie name';
            }?>
    </title>

<!--    make sure to change the title to be dependant on the movie or tv show being watched-->
</head>
</html>

