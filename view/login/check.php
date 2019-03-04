<?php
    session_start();

    require "../../vendor/autoload.php";
    use \Core\QueryBuilder;

    $qb = new QueryBuilder();
    $access = false;

    $result = $qb->selectAll("Teacher");
    foreach($result as $rs){
        if($rs->Email == $_SESSION['email']){
            $_SESSION['name'] = $rs->Name;
            $access = true;
            header('location:../advisorPages/home.php');
        }
    }

    $result = $qb->selectAll("Student");
    foreach($result as $rs){
        if($rs->Email == $_SESSION['email']){
            $_SESSION['name'] = $rs->Name;
            $access = true;
            header('location:../studentPages/home.php');
        }
    }

    if(!$access){
        echo "<script type='text/javascript'>alert('ERROR : Account not in system');</script>";
        // header('location:https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/MidtermProject/view/login/loginStudentAndAdvisor.php');
    }
?>