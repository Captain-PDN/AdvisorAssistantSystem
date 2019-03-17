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
    <link rel="stylesheet" href="../../css/adminCSS/adminHome.css" >
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
                    <a class="navbar-brand" style="color: white;">CS Advisor Assistant System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="home.php">Home</a></li>
                        <li><a href="newAdvisor.php">Add New Advisor</a></li>
                        <li><a href="newStudent.php">Add New Student</a></li>
                        <li><a href="newSubject.php">Add New Subject</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello
                            <?php
                                require "../../vendor/autoload.php";
                                use \Core\QueryBuilder;

                                echo $_SESSION["adminName"];
                            ?></a></li>
                        <li><a href="../loginPages/loginAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid"">
            <div id="content-home" style="font-family: 'Kanit', sans-serif;">
                <div class="col-md-4 headShowList">
                    <p>ADVISOR</p>
                    <div class="showList" align="left"
                         style="height: 400px; margin-bottom: 10px; overflow: scroll; font-size: 16px;">
                        <?php
                            $qb = new QueryBuilder();
                            $result = $qb->selectAll("Teacher");
                        ?>
                        <?php foreach($result as $rs): ?>
                            <p><?= $rs->Name." ".$rs->Lastname; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4 headShowList">
                    <p>STUDENT</p>
                    <div class="showList" align="left"
                         style="height: 400px; margin-bottom: 10px; overflow: scroll; font-size: 16px;">
                        <?php
                            $qb = new QueryBuilder();
                            $result = $qb->selectAll("Student");
                        ?>
                        <?php foreach($result as $rs): ?>
                            <p><?= $rs->ID." ".$rs->Name." ".$rs->Lastname; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4 headShowList">
                    <p>SUBJECT</p>
                    <div class="showList" align="left"
                         style="height: 400px; margin-bottom: 10px; overflow: scroll; font-size: 16px;">
                        <?php
                            $qb = new QueryBuilder();
                            $result = $qb->selectAll("CourseInfo");
                        ?>
                        <?php foreach($result as $rs): ?>
                            <p><?= $rs->CourseID." ".$rs->Name; ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
           </div>
        </div>
    </div>
</body>
</html>