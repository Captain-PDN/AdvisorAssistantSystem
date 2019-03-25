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
                $result = $qb->selectAll("CourseInfo");
                $resultCourseCode = $qb->selectAll("CourseCode");
                foreach ($result as $rs) {
                    if ($rs->CourseID == $_SESSION["courseID"]) {
                        $_SESSION["courseName"] = $rs->Name;
                    }
                }
                foreach ($resultCourseCode as $rs) {
                    if ($rs->CourseID == $_SESSION["courseID"]) {
                    $_SESSION["courseCode"] = $rs->CourseCode;
                    }
                }
            ?>


            <br><h1 class="headText"><?php echo $_SESSION["courseID"]."  ".$_SESSION["courseName"]; ?></h1>
            <h1 class="headText" style="position: right">Class Code: <?php echo $_SESSION["courseCode"]; ?></h1>

            <div class="content-details-subject scrollIt">
                <h1 class="headText">Student</h1>
                <table class="table" style="text-align: center;">
                    <thead>
                    <tr>
                        <th class="col-sm-2">Student ID</th>
                        <th class="col-sm-3">Student Firstname</th>
                        <th class="col-sm-3">Student Lastname</th>
                        <th class="col-sm-2">Edit</th>
                        <th class="col-sm-2">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $qb = new QueryBuilder();
                            $resultCourse = $qb->selectAll("TakeCourse");
                            $resultStudent = $qb->selectAll("Student");
                        ?>
                        <?php foreach ($resultCourse as $rsc) { ?>
                            <tr>
                                <?php if ($rsc->CourseID == $_SESSION["courseID"]) { ?>
                                    <td align="center"><?= $rsc->StudentID; ?></td>
                                    <?php
                                    foreach($resultStudent as $rss) {
                                        if ($rss->ID == $rsc->StudentID) {
                                            ?>
                                            <td><?= $rss->Name; ?></td>
                                            <td><?= $rss->Lastname; ?></td>
                                            <td align="center">
                                                <button class="btn btn-primary" value="<?= $rss->ID; ?>" onclick="editStudent(this)" name="editStd">Edit</button>
                                            </td>
                                            <form method="post" enctype="multipart/form-data">
                                                <td align="center">
                                                    <button class="btn btn-danger" name="deleteStd" value="<?= $rss->ID; ?>">Delete</button>
                                                </td>
                                            </form>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="content-details-subject scrollIt">
                <h1 class="headText">Assignment List</h1>
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="col-sm-4">Assignment</th>
                            <th class="col-sm-3">Max Scores</th>
                            <th class="col-sm-3">Score Rate (Percent)</th>
                            <th class="col-sm-2">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $qb = new QueryBuilder();
                            $result = $qb->selectAll('CourseTopic where CourseID="'.$_SESSION["courseID"].'"');
                        ?>
                        <?php foreach ($result as $rs) { ?>
                        <tr>
                            <td><?= $rs->Topic; ?></td>
                            <td><?= $rs->MaxScore; ?></td>
                            <td><?= $rs->Weight; ?></td>

                            <form method="post" enctype="multipart/form-data">
                                <td>
                                    <button class="btn btn-danger" name="deleteTopic" value='<?= $rs->Topic; ?>'>Delete</button>
                                </td>
                            </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
                            <input type="number" name="weight" min="0" max="100" class="form-control form-control-lg" id="inputScoreRate" placeholder="Score Rate (Percent)">
                        </div>
                    </div>

                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button id="btn-add-Assign" type="submit" name="submit" class="btn " style="background-color: lightgray;"><strong>Submit</strong></button>
                    </div>
                </form>
            </div>

            <?php
                if (isset($_POST["submit"])) {
                    if (!$_POST["topic"] == '' && !$_POST["max"] == '' && !$_POST["weight"] == '') {
                        $qb->addCourseTopic($_SESSION["courseID"], $_POST["topic"], $_POST["weight"], $_POST["max"]);
                        $qb->setScore($_SESSION["courseID"], $_POST["topic"]);
                        echo "<script type='text/javascript'>alert('Add New Assignment Complete!');</script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo "<script type='text/javascript'>alert('ERROR : There are Empty Input!');</script>";
                    }
                }
            ?>

            <div class="content-details-subject" >
                <h1 class="headText">Announcement Score</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="sel1" class="col-sm-3 col-form-label">Assignment Topic</label>
                        <div class="col-sm-9 form-control-lg">
                            <select class="form-control" id="topicName" name="select">
                                <?php
                                    $result = $qb->selectAll("CourseTopic WHERE CourseID=".$_SESSION["courseID"])
                                ?>
                                <option value="">----Select Topic----</option>
                                <?php foreach($result as $rs):?>
                                    <option value="<?= $rs->Topic; ?>"><?= $rs->Topic; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Score Announcement Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control form-control-lg" id="date" placeholder="Max Score" name="date">
                        </div>
                    </div>

                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button id="assignAnnounc" type="submit" name="submit2" class="btn " style="background-color: lightgray;"><strong>Submit</strong></button>
                    </div>
                </form>
            </div>

            <?php
                if (isset($_POST["submit2"])) {
                    if (!$_SESSION["courseID"] == "" && !$_POST["select"] == "" && !$_POST["date"] == "") {
                        $qb->setTopicAnnounceDate($_SESSION["courseID"], $_POST["select"], $_POST["date"]);
                        echo "<script type='text/javascript'>alert('Set Announcement Date Complete!');</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('ERROR : There are Empty Input');</script>";
                    }
                }
            ?>

            <div class="content-details-subject">
                <h1 class="headText">Advisor Utility</h1>
                <div class="col-sm-2"></div>

                <div class="col-sm-4">
                    <button id="btn-export-score" name="exportScore" type="submit" class="btn  btn-manage-score">Export Score</button>
                </div>

                <div class="col-sm-4">
                    <button id="btn-import-grade" name="importGrade" type="submit" class="btn  btn-manage-score">Import Grade</button>
                </div>

                <div class="col-sm-2"></div>

                <h3 class="headText" style="margin-bottom: 25px; margin-top: 100px; font-size: 1.5em;">Import CSV File</h3>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row" style="text-align: center">
                        <div class="col-sm-3"></div>
                        
                        <div class="custom-file col-sm-6">
                            <div class="input-group" style="margin: 0 auto;">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();" style="width: 175px;">Add Student into Course</span>
                                    <input name="newStudent" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                        style="display: none;" type="file">
                                </span>
                                <span class="form-control"></span>
                            </div>
                        </div>

                        <div class="col-sm-3"></div>
                    </div>

                    <div class="form-group row" style="text-align: center">
                        <div class="col-sm-3"></div>

                        <div class="custom-file col-sm-6">
                            <div class="input-group" style="margin: 0 auto;">
                                <span class="input-group-btn" >
                                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();" style="width: 175px;">Add Student's Score</span>
                                    <input name="studentScore" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                        style="display: none;" type="file">
                                </span>
                                <span class="form-control"></span>
                            </div>
                        </div>

                        <div class="col-sm-3"></div>
                    </div>

                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button type="submit" name="submit3" class="btn " style="background-color: lightgray;"><strong>Submit</strong></button>
                    </div>
                </form>

                <?php
                    if (isset($_POST["submit3"])) {
                        if (!empty($_FILES['newStudent']['name'])) {
                            $target_dir = "";
                            $target_file = $target_dir . basename($_FILES["newStudent"]["name"]);
                            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($fileType == "csv" && !empty($target_file)) {
                                move_uploaded_file($_FILES["newStudent"]["tmp_name"], $target_file);
                                $myfile = fopen(basename($_FILES["newStudent"]["name"]), "r");
                                $input = fread($myfile, filesize($_FILES["newStudent"]["name"]));
                                if (!empty($input)) {
                                    $array = preg_split("/[\s]+/", $input);
                                    $arraySize = count($array);
                                    for ($x = 0; $x < $arraySize; $x++) {
                                        if ($array[$x] != "") {
                                            $sub = explode(",", $array[$x]);
                                            $id = $sub[0];
                                            $name = $sub[1];
                                            $lastName = $sub[2];
                                            $email = $sub[3];
                                            $qb->addStudents($id, $email, $name, $lastName);
                                            $qb->addStudentsToCourse($_SESSION["courseID"], $id);
                                        }
                                    }
                                }
                                fclose($myfile);
                                unlink(basename($_FILES["newStudent"]["name"]));

                                echo "<script type='text/javascript'>alert('Add New Student Complete!');</script>";
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "<script type='text/javascript'>alert('ERROR : Invalid Input!');</script>";
                            }
                        } else if (!empty($_FILES['studentScore']['name'])) {
                            $target_dir = "";
                            $target_file = $target_dir . basename($_FILES["studentScore"]["name"]);
                            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($fileType == "csv" && !empty($target_file)) {
                                move_uploaded_file($_FILES["studentScore"]["tmp_name"], $target_file);
                                $myfile = fopen(basename($_FILES["studentScore"]["name"]), "r");
                                $input = fread($myfile, filesize($_FILES["studentScore"]["name"]));
                                if (!empty($input)) {
                                    $array = preg_split("/[\s]+/", $input);
                                    $arraySize = count($array);
                                    for ($x = 0; $x < $arraySize; $x++) {
                                        if ($array[$x] != "") {
                                            $sub = explode(",", $array[$x]);
                                            $topic = $sub[0];
                                            $id = $sub[1];
                                            $score = $sub[2];
                                            $qb->updateScore($_SESSION["courseID"], $id, $topic, $score);
                                        }
                                    }
                                }
                                fclose($myfile);
                                unlink(basename($_FILES["studentScore"]["name"]));

                                echo "<script type='text/javascript'>alert('Update Student Score -> Complete!');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('ERROR : Invalid Input!');</script>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST["deleteTopic"])) {
            $qb->removeTopic($_SESSION['courseID'], $_POST["deleteTopic"]);
            echo "<script type='text/javascript'>alert('Remove Topic!');</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }

        if (isset($_POST["deleteStd"])) {
            $qb->removeStudentFromCourse($_SESSION['courseID'], $_POST["deleteStd"]);
            echo "<script type='text/javascript'>alert('Remove Student!');</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
    ?>

    <script>
        function editStudent(element) {
            var studentID = element.value;

            var courseID = "<?php echo $_SESSION['courseID']; ?>";
            var email = "<?php echo $_SESSION['email']; ?>";
            var name = "<?php echo $_SESSION['name']; ?>";

            $.post('../globalVariable.php', {'postemail': email, 'postname': name, 'postCourseID': courseID, 'postStdID': studentID}).done(function (data) {
                location.href = 'studentDetails.php';
            });
        }
    </script>
</body>
</html>