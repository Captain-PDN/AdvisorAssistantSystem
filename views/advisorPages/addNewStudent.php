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
    <div>
        <div  style="background: url('../../images/sky-bg.jpg') no-repeat fixed; background-size: cover;">
            <span align="left">
                <img src="../../images/KU_SubLogo.png" style="height: 200px; width: 200px;">
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
                    <a class="navbar-brand" style="color: white;">CS Advisor Assistant System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a></li>
                        <li><a class="active" href="addNewStudent.php">Add New Student</a></li>
                        <li><a href="newSubject.php">Add New Subject</a></li>
                        <li><a href="studentDetails.php">Student Details</a></li>
                        <li><a href="subjectDetails.php">Subject Details</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello
                        <?php
                            echo $_SESSION["name"];
                        ?></a></li>
                        <li><a href="https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/AdvisorAssistantSystem/views/loginPages/loginStudentAndAdvisor.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="content-details-student" >
                <h1 class="headText" style="text-align: center;">Add New Student</h1>
                <form>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="inputStudentFirstname"
                                   placeholder="Student Firstname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="inputStudentLastname" placeholder="Student Lastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="inputStudentID" placeholder="Student ID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">KU Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control form-control-lg" id="inputStudentEmail" placeholder="studentEmail@ku.th">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Behavior</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="behaviorStudent" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Prerequisite Subject Grade</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="inputStudentPreGrade" placeholder="Grade">
                        </div>
                    </div>

                    <div style="width: fit-content; margin: 0 auto;">
                        <button id="button-submit" type="submit" class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>