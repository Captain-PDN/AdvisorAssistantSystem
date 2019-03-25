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
                <img src="../../images/KU_SubLogo.png" style="height: 150px; width: 150px;">
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
                        <li><a href="newSubject.php">+New Subject</a></li>
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

        <?php
            require "../../vendor/autoload.php";
            use \Core\QueryBuilder;

            $qb = new QueryBuilder();
            $result = $qb->selectAll("Student where ID='".$_SESSION["stdID"]."'");
        ?>

        <div class="container-fluid">
            <div class="content-details-student" >
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <h1 class="headText" style="text-align: center;">Student Details</h1>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Student Name :</p>
                        <?php foreach($result as $rs): ?>
                            <p class="col-sm-8 "><?= $rs->Name." ".$rs->Lastname;?></p>
                        <?php endforeach; ?>
                    </div>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Student ID :</p>
                        <p class="col-sm-8 "><?php echo $_SESSION["stdID"];?></p>
                    </div>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Behavior Level :</p>
                        <p class="col-sm-8 ">
                            <?php
                                $qb = new QueryBuilder();
                                $result = $qb->selectAll("StudentBehavior where StudentID='".$_SESSION["stdID"]."'");
                                foreach ($result as $rs) {
                                    echo $rs->BehaviorLevel;
                                    break;
                                }
                            ?>
                        </p>
                    </div>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Behaviors :</p>
                        <p class="col-sm-8 ">
                            <?php
                                $qb = new QueryBuilder();
                                $result = $qb->selectAll("StudentBehavior where StudentID='".$_SESSION["stdID"]."'");
                                foreach ($result as $rs) {
                                    echo $rs->Behavior;
                                    break;
                                }
                            ?>
                        </p>
                    </div>

                    <h1 class="headText" style="text-align: center; font-size: 1.5em;">Edit Behaviors</h1>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Behavior Level :</p>
                        <div class="col-sm-8 ">
                            <select class="form-control" name="level">
                                <option value="">--Select Behavior Level--</option>
                                <option value="Very Good">Very Good</option>
                                <option value="Good">Good</option>
                                <option value="Normal">Normal</option>
                                <option value="Bad">Bad</option>
                            </select>
                        </div>
                    </div>

                    <div class="row student-detail">
                        <p class="col-sm-4 ">Behaviors :</p>
                        <textarea class="form-control" rows="3" name="behavior"></textarea>
                        <br>
                    </div>

                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button style="background-color: green; font-weight: 700 !important; color: white;" id="btn-add-Student" type="submit" class="btn" name="submit">Submit</button>
                    </div>
                </form>

                <br>
 
                <div style="width: fit-content; margin: 0 auto; text-align: center;">
                    <button class="btn" style="background-color: lightgray; font-weight: 700 !important;" onclick='back()'>Back</button>
                </div>
            </div>

            <?php
                if (isset($_POST["submit"])) {
                    if (!$_SESSION["name"] == "" && !$_SESSION["stdID"] == "" && !($_POST["behavior"] == "" && $_POST["level"] == "")) {
                        $qb->recordStudentBehavior($_SESSION["stdID"], $_POST["level"], $_POST["behavior"], $_SESSION["name"]);
                        echo "<script type='text/javascript'>alert('Update Student's Behavior Complete!');</script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo "<script type='text/javascript'>alert('There are Empty Input');</script>";
                    }
                }
            ?>
        </div>
    </div>

    <script>
        function back() {
            location.href = 'subjectDetails.php';
        }
    </script>
</body>
</html>