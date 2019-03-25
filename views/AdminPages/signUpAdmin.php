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

    <link rel="stylesheet" href="../../css/adminCSS/adminHome.css">
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
        <div style="background: url('../../images/sky-bg.jpg') no-repeat fixed; background-size: cover;">
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
                    <a class="navbar-brand" style="color: white">CS Advisor Assistant System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="newAdvisor.php">+New Advisor</a></li>
                        <li><a href="newStudent.php">+New Student</a></li>
                        <li><a href="newSubject.php">+New Subject</a></li>
                        <li><a href="changePassword.php">Change Password</a></li>
                        <li><a class="active" href="signUpAdmin.php">Sign-Up Admin</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello
                        <?php
                            echo $_SESSION["adminName"];
                        ?></a></li>
                        <li><a href="../loginPages/loginAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-bottom: 10px;">
            <div id="content-new-Advisor">
                <h1 class="headText">Sign-Up Admin</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control form-control-lg" name="confirmPassword" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div style="width: fit-content; margin: 0 auto; text-align: center;">
                        <button id="button-submit" type="submit" name="submit" class="btn">Sign-Up</button>
                    </div>
                </form>

                <?php
                    require "../../vendor/autoload.php";
                    use \Core\QueryBuilder;

                    if (isset($_POST["submit"])) {
                        if ($_POST['username'] != '' && $_POST['password'] != '' && $_POST['name'] != '' && $_POST['confirmPassword'] != '') {
                            if ($_POST["password"] == $_POST["confirmPassword"]) {
                                $qb = new QueryBuilder();
                                $qb->registerAdmin($_POST['username'], $_POST['password'], $_POST['name']);
                                echo "<script type='text/javascript'>alert('Sign-Up Complete!'); window.location.href = 'home.php';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('ERROR : Password not MATCH!');</script>";
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