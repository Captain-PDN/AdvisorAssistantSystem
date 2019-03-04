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
    <link rel="stylesheet" href="../../css/adminCss/adminHome.css" >
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
                    <li><a href="newAdvisor.php">Add New Advisor</a></li>
                    <li><a href="newStudent.php">Add New Student</a></li>
                    <li><a class="active" href="newSubject.php">Add New Subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello <?php 
                        echo $_SESSION["adminName"];
                    ?></a></li>
                    <li><a href="../login/loginAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" >
        <!--        <h1 style="text-align: center">Add New Advisor</h1>-->
        <div id="content-new-Advisor" >
            <h1 class="headText">Add New Subject</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control  form-control-lg" id="inputSubjectName" placeholder="Subject Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="id" class="form-control  form-control-lg" id="inputStudentID" placeholder="Subject ID">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject Credit</label>
                    <div class="col-sm-9">
                        <input type="number" name="credit"  min="1" max="5" class="form-control  form-control-lg" id="inputSubjectCredit" placeholder="Subject Credit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Advisor ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="advisor" class="form-control  form-control-lg" id="inputAdvisorName" placeholder="Advisor ID">
                    </div>
                </div>

                <div style="width: fit-content;margin: 0 auto">
                    <button id="button-submit" type="submit" name="submit" class="btn ">Submit</button>

                </div>


            </form>
            <?php
                require "../../vendor/autoload.php";
                use \Core\QueryBuilder;

                if (isset($_POST["submit"])){
                    $qb = new QueryBuilder();
                    
                    if($_POST['name'] != '' && $_POST['id'] != '' && $_POST['credit'] != ''&& $_POST['advisor'] != ''){
                        if($_POST['credit'] >= 1 && $_POST['credit'] <= 5){
                            $qb->addCourse($_POST['id'], $_POST['name'], $_POST['credit'], $_POST['advisor']);
                            echo "<script type='text/javascript'>alert('Complete add new Subject');</script>";
                        }
                        else{
                            echo "<script type='text/javascript'>alert('ERROR : Credit out of range');</script>";
                        }
                    }
                    else{
                        echo "<script type='text/javascript'>alert('ERROR : There are empty input');</script>";
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>