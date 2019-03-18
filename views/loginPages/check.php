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
        echo "<script type='text/javascript'>
        var r = confirm('ERROR : This Account not in System');
        if (r == true) {
            location.href = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/AdvisorAssistantSystem/views/loginPages/loginStudentAndAdvisor.php';
        } else {
            location.href = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/AdvisorAssistantSystem/views/loginPages/loginStudentAndAdvisor.php';
        }
        </script>";
    }
?>