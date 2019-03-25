<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CS Advisor Assistant System</title>

    <!--	<link rel="stylesheet" type="text/css" href="bulma-0.7.4/css/bulma.min.css">-->
    <link rel="stylesheet" href="../../css/advisorCSS/advisorCSS.css" >
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700i" rel="stylesheet">
    <style type="text/css">
        html {
            min-width: 300px;
        }

        body {
            font-family: 'K2D', sans-serif;
        }
    </style>
</head>
<body>
<div >
    <div  style="background: url('../../images/sky-bg.jpg') no-repeat fixed;background-size: cover;" >
        <span align="left">
            <img src="../../images/KU_SubLogo.png" style="height: 200px;width: 200px">
        </span>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"style="color: white">CS Advisor Assistant System</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="addNewStudent.php">Add New Student</a></li>
                    <li><a href="newSubject.php">Add New Subject</a></li>
                    <li><a class="active" href="studentDetails.php">Student Details</a></li>
                    <li><a href="subjectDetails.php">Subject Details</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello 
                    <?php 

                        echo $_SESSION["name"];
                    ?></a></li>
                    <li><a href="https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/MidtermProject/view/login/loginStudentAndAdvisor.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="content-details-student" >
            <h1 class="headText" style="text-align: center">Student Details</h1>
            <div class="row student-detail">
                <p  class="col-sm-4 ">Student Name</p>
                <p  class="col-sm-8 ">Student name lastname</p>
            </div>
            <div class="row student-detail">
                <p  class="col-sm-4 ">Student ID</p>
                <p  class="col-sm-8 ">5910400312</p>
            </div>
            <div class="row student-detail">
                <p  class="col-sm-4 ">Behaviors</p>
                <p  contenteditable="true" class="col-sm-8 scrollIt-student"></p>
            </div>
            <div class="row student-detail">
                <p  class="col-sm-4 ">Prerequisite Subject Grade</p>
                <p  class="col-sm-8 ">A</p>
            </div>
            <div class="row student-detail">
                <p  class="col-sm-4 ">Score in (subject name)</p>
                <p  class="col-sm-8 ">90</p>
            </div>

            <div style="width: fit-content;margin: 0 auto;">
                <button style="font-weight: 700 !important;" id="btn-add-Student" type="submit" class="btn ">Submit</button>
            </div>


        </div>
    </div>
<!--    <div class="container-fluid" >-->
<!--        <!--        <h1 style="text-align: center">Add New Advisor</h1>-->-->
<!--        <div class="content-details-student" >-->
<!--            <h1 class="headText">Student ID </h1>-->
<!--            <div class="student-detail">-->
<!--                <p  class="col-sm-4 ">Student Name</p>-->
<!--                <p  class="col-sm-8 col-form-label">Student name lastname</p>-->
<!--            </div>-->
<!--            <div class="student-detail">-->
<!--                <p class="col-sm-4 col-form-label">Behaviors</p>-->
<!--                <p contenteditable="true" class="scrollIt-student col-sm-8 col-form-label"  type="text"></p>-->
<!--            </div>-->
<!--            <div class="student-detail">-->
<!--                <p class="col-sm-4 col-form-label">Prerequisite Subject Grade</p>-->
<!--                <p  class="col-sm-8 col-form-label">A </p>-->
<!--            </div>-->
<!--            <div class="student-detail">-->
<!--                <p class="col-sm-4 col-form-label">Score in (subject name) </p>-->
<!--                <p  class="col-sm-8 col-form-label">90</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
</body>

</body>
</html>