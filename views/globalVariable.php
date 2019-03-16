<?php
    session_start();
    $_SESSION["adminName"] = ' ';

    $_SESSION['email'] = $_POST['postemail'];
    $_SESSION['name'] = $_POST['postname'];

    $_SESSION["courseID"] = ' ';
    $_SESSION["courseName"] = ' ';
?>