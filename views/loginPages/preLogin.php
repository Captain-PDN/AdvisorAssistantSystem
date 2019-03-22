<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../css/loginCSS/login.css" >
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700i" rel="stylesheet">
</head>

<body id="body-background">
    <div class="center-div" style="margin-top: 5%;">
        <div id="div-image" class="col-lg-6 col-md-6">
            <img id="ku-logo" src="../../images/KU_SubLogo.png">
        </div>

        <div id="div-form" class="col-lg-6 col-md-6" style="margin-top: 40px;">
            <div class="center-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <p id="head-text-login">LOGIN</p>
                    <button type="submit" class="btn" name="admin">as Administrator</button>
                    <p style="font-size: 20px; margin-top: 20px;">OR</p>
                    <button type="submit" class="btn" name="stdAndAvs">as Advisor / Student</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST["admin"])) {
            header('location:loginAdmin.php');
        }
        else if (isset($_POST["stdAndAvs"])) {
            header('location:loginStudentAndAdvisor.php');
        }
    ?>
</body>
</html>

