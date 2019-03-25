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

    <link rel="stylesheet" href="../../css/adminCSS/adminHome.css" >
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
        <div  style="background: url('../../images/sky-bg.jpg') no-repeat fixed;background-size: cover;" >
            <span align="left">
                <img src="../../images/KU_SubLogo.png" style="height: 150px; width: 150px">
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
                        <li><a href="newAdvisor.php">+New Advisor</a></li>
                        <li><a class="active"  href="newStudent.php">+New Student</a></li>
                        <li><a href="newSubject.php">+New Subject</a></li>
                        <li><a href="changePassword.php">Change Password</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello <?php
                            echo $_SESSION["adminName"];
                        ?></a></li>
                        <li><a href="../loginPages/loginAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-bottom: 10px;">
            <div id="content-new-Advisor">
                <h1 class="headText">Add New Student</h1>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control form-control-lg" id="inputStudentFirstname"
                                   placeholder="Student Firstname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" name="lastName" class="form-control form-control-lg" id="inputStudentLastname"
                                   placeholder="Student Lastname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Student ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control form-control-lg" id="inputStudentID"
                                   placeholder="Student ID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">KU Email Address</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control form-control-lg" id="inputStudentEmail"
                                   placeholder="studentEmail@ku.th">
                        </div>
                    </div>

                    <h3 class="headText" style="margin-bottom: 10px; margin-top: 35px;">OR</h3>

                    <div class="input-group" style="max-width: 350px; margin: 0 auto;">
                        <span class="input-group-btn">
                            <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Import CSV File</span>
                            <input name="fileToUpload" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                   style="display: none;" type="file">
                        </span>
                        <span class="form-control"></span>
                    </div>

                    <br>

                    <p align="middle">Note: If you have selected CSV file. It will insert data in CSV file only.</p>

                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button id="button-submit" type="submit" name="submit" class="btn" style="margin-top: 15px;">Submit</button>
                    </div>
                </form>

                <?php
                    require "../../vendor/autoload.php";
                    use \Core\QueryBuilder;

                    if (isset($_POST["submit"])){
                        $qb = new QueryBuilder();

                        if (!empty($_FILES['fileToUpload']['name'])) {
                            $target_dir = "";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            if ($fileType == "csv" && !empty($target_file)) {
                                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                                $myfile = fopen(basename($_FILES["fileToUpload"]["name"]), "r");
                                $input = fread($myfile, filesize($_FILES["fileToUpload"]["name"]));
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
                                        }
                                    }
                                }
                                fclose($myfile);
                                unlink(basename($_FILES["fileToUpload"]["name"]));

                                echo "<script type='text/javascript'>alert('Add New Student(s) Complete!'); window.location.href = 'home.php';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('ERROR : Invalid Input!');</script>";
                            }
                        } else if ($_POST['name'] != '' && $_POST['lastName'] != '' && $_POST['id'] != '' && $_POST['email'] != '') {
                            if (strpos($_POST["email"], '@ku.th') !== false) {
                                $qb->addStudents($_POST['id'], $_POST['email'], $_POST['name'], $_POST['lastName']);
                                echo "<script type='text/javascript'>alert('Add New Student(s) Complete!'); window.location.href = 'home.php';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('ERROR : Wrong E-mail!');</script>";
                            }
                        } else {
                            echo "<script type='text/javascript'>alert('ERROR : There are Empty Input!');</script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>