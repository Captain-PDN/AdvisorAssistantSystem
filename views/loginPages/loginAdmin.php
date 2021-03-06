<?php
    if (!isset($_SESSION)) {
        session_start();
    } else {
        session_destroy();
        session_start();
    }
?>

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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700i" rel="stylesheet">
</head>

<body id="body-background">
    <div class="center-div" style="margin-top: 5%;">
        <div id="div-image" class="col-lg-6 col-md-6">
            <img id="ku-logo" src="../../images/KU_SubLogo.png">
        </div>

        <div id="div-form" class="col-lg-6 col-md-6" style="margin-top: -20px;">
            <div class="center-form">
                <p id="head-text-login">LOGIN</p>
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input  class="form-control-lg" type="text" name="username" id="adminInputEmail1"  placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="adminInputPassword1" placeholder= "Password">
                    </div>

                    <button type="submit" name="submit" class="btn ">SIGN IN</button>
                </form>

                <br><br><button onclick="location.href = 'preLogin.php';" type="button" name="submit" class="btn " style="width: 100%;">BACK</button>

                <?php
                    require "../../vendor/autoload.php";
                    use \Core\QueryBuilder;

                    if (isset($_POST["submit"])){
                        $qb = new QueryBuilder();
                        
                        if ($qb->login($_POST['username'], $_POST['password'])) {
                            header('location:../adminPages/home.php');
                        } if ($_POST['username'] == '' || $_POST['password'] == '') {
                            echo "<script type='text/javascript'>alert('ERROR : There are Empty Input!');</script>";
                        } else {
                            echo "<script type='text/javascript'>alert('ERROR : Wrong Username or Password!');</script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>