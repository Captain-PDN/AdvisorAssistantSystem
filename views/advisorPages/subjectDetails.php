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
                            <li><a href="addNewStudent.php">Add New Student</a></li>
                            <li><a href="newSubject.php">Add New Subject</a></li>
                            <li><a href="studentDetails.php">Student Details</a></li>
                            <li><a class="active" href="subjectDetails.php">Subject Details</a></li>
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
                <div class="content-details-subject scrollIt">
                    <?php
                        require "../../vendor/autoload.php";
                        use \Core\QueryBuilder;

                        $qb = new QueryBuilder();
                        $result = $qb->selectAll("CourseInfo");
                        foreach($result as $rs){
                            if($rs->CourseID == $_SESSION["courseID"]){
                                $_SESSION["courseName"] = $rs->Name;
                            }
                        }
                    ?>

                    <h1 class="headText"><?php echo $_SESSION["courseID"]."  ".$_SESSION["courseName"]?></h1>
                    <table class="table" style="text-align: center;">
                        <thead>
                        <tr>
                            <th>Assignment</th>
                            <th>Max Scores</th>
                            <th>Score Rate (Percent)</th>
                            <th>Delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = $qb->selectAll("CourseTopic")
                        ?>
                        <?php foreach($result as $rs):?>
                        <tr>
                            <td><?= $rs->Topic; ?></td>
                            <td contenteditable="true"><?= $rs->MaxScore; ?></td>
                            <td contenteditable="true"><?= $rs->Weigh; ?></td>
                            <td>
                                <button  class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-details-subject">
                <h1 class="headText">Add New Assignment</h1>
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Assignment Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="topic" class="form-control form-control-lg" id="inputAssignmentName" placeholder="Assignment Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Max Score</label>
                        <div class="col-sm-9">
                            <input type="number" name="max" min="0" max="100" class="form-control form-control-lg" id="inputMaxScore" placeholder="Max Score">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Score Rate (Percent)</label>
                        <div class="col-sm-9">
                            <input type="number" name="weigh" min="0" max="100" class="form-control form-control-lg" id="inputScoreRate" placeholder="Score Rate (percent)">
                        </div>
                    </div>

                    <div style="width: fit-content;margin: 0 auto">
                        <button id="btn-add-Assign" type="submit" name="submit" class="btn ">Submit</button>
                    </div>
                </form>
            </div>
            <?php
                if(isset($_POST["submit"])){
                    if(!$_POST["topic"] == '' && !$_POST["max"] == '' && !$_POST["weigh"] == ''){
                        $qb->addCourseTopic($_SESSION["courseID"], $_POST["topic"], $_POST["weigh"], $_POST["max"]);
                        echo "<script type='text/javascript'>alert('Complete Add New Assignment');</script>";
                    }
                    else{
                        echo "<script type='text/javascript'>alert('ERROR : There are Empty Input');</script>";
                    }
                }
            ?>

            <div class="content-details-subject" >
                <h1 class="headText">Announcement Score</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="sel1" class="col-sm-3 col-form-label">Assignment Topic</label>
                        <div class="col-sm-9 form-control-lg">
                        <select class="form-control" id="topicName">
                        <?php
                            $result = $qb->selectAll("CourseTopic WHERE CourseID=".$_SESSION["courseID"])
                        ?>
                        <?php foreach($result as $rs):?>
                        <option><?= $rs->Topic; ?></option>
                        <?php endforeach; ?>
                            
                        </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Score Announcement Date</label>
                        <div class="col-sm-9">
                            <input type="date"  class="form-control  form-control-lg" id="date" placeholder="Max Score" name="date">
                        </div>
                    </div>

                    <div style="width: fit-content;margin: 0 auto">
                        <button id="assignAnnounc" type="submit" name="submit2" class="btn " onclick="announc()">Submit</button>
                    </div>
                </form>
            </div>
            <?php
                if(isset($_POST["submit2"])){
                    if(!$_SESSION["courseID"] == "" && !$_SESSION["topic"] == ""){
                        $qb->setTopicAnnounceDate($_SESSION["courseID"], $_SESSION["topic"], $_POST["date"]);
                        echo "<script type='text/javascript'>alert('Complete Add Assignment Topic Announcement Date');</script>";
                    }
                    else{
                        echo "<script type='text/javascript'>alert('ERROR : There are Empty Input');</script>";
                    }
                }
            ?>

            <div class="content-details-subject">
                <h1 class="headText">Announcement Score</h1>
                <div class="form-group row" style="text-align: center">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <button id="btn-new-student" name="addNewStudent" type="submit" class="btn btn-manage-score">Add New Student</button>
                    </div>
                    <div class="custom-file col-sm-2">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Add New Student: CSV File</label>
                    </div>
                    <div class="custom-file col-sm-2">
                        <input type="file" class="custom-file-input " id="customFile">
                        <label class="custom-file-label" for="customFile">Add Score: CSV File</label>
                    </div>
                    <div class="col-sm-2">
                        <button id="btn-export-score" name="exportScore" type="submit" class="btn  btn-manage-score">Export Score</button>
                    </div>
                    <div class="col-sm-2">
                        <button id="btn-import-grade" name="importGrade" type="submit" class="btn  btn-manage-score">Import Grade</button>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>

            <div class="content-details-subject scrollIt">
                <h1 class="headText">Student</h1>
                <table class="table" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Firstname</th>
                        <th>Student Lastname</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qb = new QueryBuilder();
                        $result = $qb->selectAll("Student");
                        ?>
                        <?php foreach($result as $rs): ?>
                            <tr>
                                <td><?= $rs->ID; ?></td>
                                <td><?= $rs->Name; ?></td>
                                <td><?= $rs->Lastname; ?></td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function announc(){
            var topic = document.getElementById("topicName").value;
            $.post('../globalVariable.php', {'postTopic': topic});
        }
    </script>
</body>
</html>