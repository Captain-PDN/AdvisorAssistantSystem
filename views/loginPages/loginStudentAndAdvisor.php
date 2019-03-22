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

    <style>
        #my-signin2 {
            width: 100%;
        }

        #my-signin2 > div {
            margin: 0 auto;
        }
    </style>
</head>

<body id="body-background">
    <div class="center-div" style="margin-top: 5%;">
        <div id="div-image" class="col-lg-6 col-md-6">
            <img id="ku-logo" src="../../images/KU_SubLogo.png">
        </div>

        <div id="div-form" class="col-lg-6 col-md-6" style="margin-top: -20px;">
            <div class="center-form form-login-student-advisor">
                <p id="head-text-login">LOGIN</p>
                <form>
                    <div class="form-group">
                        <div type="submit" id="my-signin2"></div>
                        <script>
                            function onSuccess(googleUser) {
                                var profile = googleUser.getBasicProfile();
                                var email = profile.getEmail();
                                var name = profile.getName();

                                $.post('../globalVariable.php', {'postemail': email, 'postname': name}).done(function (data) {
                                    location.href = 'check.php';
                                });
                            }

                            function onFailure(error) {
                                console.log(error);
                            }

                            function renderButton() {
                                gapi.signin2.render('my-signin2', {
                                    'scope': 'profile email',
                                    'width': 240,
                                    'height': 50,
                                    'longtitle': true,
                                    'theme': 'dark',
                                    'onsuccess': onSuccess,
                                    'onfailure': onFailure
                                });
                            }
                        </script>

                        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
                        <br>
                    </div>

                    <br><br>
                    <button onclick="location.href = 'preLogin.php';" type="button" style="width: 72%;">BACK</button>
                </form>
            </div>
        </div>
    </div>
</body>