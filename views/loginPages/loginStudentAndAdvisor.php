<?php
    session_start();
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- meta for google sign in -->
    <!-- <meta name="google-signin-scope" content="profile email"> -->
    <meta name="google-signin-client_id" content="695168024622-so64k2ce00pn1fifshc9m2asvdqsrn9h.apps.googleusercontent.com">

    <link rel="stylesheet" href="../../css/loginCSS/login.css" >
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- google sign in script -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700i" rel="stylesheet">
</head>

<body id="body-background">
    <div class="center-div">
        <div id="div-image" class="col-lg-6 col-md-6">
            <img id="ku-logo" src="../../images/KU_SubLogo.png">
        </div>

        <div id="div-form" class="col-lg-6 col-md-6">
            <div class="center-form form-login-student-advisor">
                <p id="head-text-login">LOGIN</p>
                <form>
                    <div class="form-group">
                        <div type="submit" class="btn g-signin2" data-onsuccess="onSignIn"><img id="logo-google" src="../../images/Google-G-Logo.png">Login With GOOGLE</div>
                    </div>
                    <a href="preLogin.php" id="back">BACK</a>
                </form>
            </div>
        </div>
    </div>

    <script language="javascript">
    // function for login
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var email = profile.getEmail();
            var name = profile.getName();

            $.post('../globalVariable.php', {'postemail': email, 'postname': name}).done(function (data) {
                location.href = 'check.php';
            });
        }
    </script>
</body>