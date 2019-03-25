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
    <link rel="stylesheet" href="../../css/studentCSS/studentHome.css" >
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
    </style>
</head>

<body>
    <div>
        <div style="background: url('../../images/sky-bg.jpg') no-repeat fixed; background-size: cover;">
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
                    <a class="navbar-brand" style="color: white">CS Advisor Assistant System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a></li>
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

        <div class="container" >
            <div id="content-score" >
                <?php
                require "../../vendor/autoload.php";
                use \Core\QueryBuilder;

                $qb = new QueryBuilder();
                $person = $qb->selectAll("Student");
                $result = $qb->selectAll("TakeCourse");
                $subject = $qb->selectAll("TeachCourse");
                $info = $qb->selectAll("CourseInfo");
                $teacher = $qb->selectAll("Teacher");
                $scores = $qb->selectAll("CourseScore");

                foreach ($person as $student) {
                    if ($student->Email == $_SESSION['email']) {
                    $id = $student->ID;
                        foreach ($result as $rs) {
                            if ($rs->StudentID == $id) {
                                $courseID = $rs->CourseID;
                                foreach ($info as $if){
                                    if ($if->CourseID == $courseID ){
                                        $courseName = $if->Name;
                                        ?>
                                        <h1><?= $courseID; ?> - <?= $courseName; ?></h1>
                                        <form>
                                            <?php
                                            foreach ( $scores  as $sc){
                                                if($sc->CourseID == $courseID and $sc->StudentID == $id) {

                                                    ?>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlInput1"
                                                               class="col-sm-6 col-form-label"><p><?= $sc->Topic; ?></p>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p><?= $sc->Score; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                    }
                    ?>
                </form>
            </div>
        </div>

</body>
</html>