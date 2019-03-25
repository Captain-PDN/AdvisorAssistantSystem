<?php
    session_start();
    $_SESSION["adminName"] = ' ';

    $_SESSION['email'] = $_POST['postemail'];
    $_SESSION['name'] = $_POST['postname'];

    $_SESSION["courseID"] = $_POST['postCourseID'];
    $_SESSION["courseName"] = ' ';

    $_SESSION["topic"] = $_POST['postTopic'];

    $_SESSION["stdID"] = $_POST['postStdID'];
?>