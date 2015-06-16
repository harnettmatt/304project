<?php
/**
 * Created by PhpStorm.
 * User: mattharnett
 * Date: 6/14/15
 * Time: 5:17 PM
 */

if(isset($_POST['rate4'])) {

    // Trim white space from the name and store the name
    $rating = $_POST['rate4'];
    echo 'Thanks for rating ' . $rating. ' out of 5';
}