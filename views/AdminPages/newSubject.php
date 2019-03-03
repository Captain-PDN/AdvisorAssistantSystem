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
                <a class="navbar-brand"style="color: white">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a class="active" href="#newAdvisor">Add New Advisor</a></li>
                    <li><a href="#newStudent">Add New Student</a></li>
                    <li><a href="#newSubject">Add New Subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello name admin **edit javascript</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container" >
        <!--        <h1 style="text-align: center">Add New Advisor</h1>-->
        <div id="content-new-Advisor" >
            <h1 style="text-align: center;margin-bottom: 35px;">Add New Subject</h1>
            <form>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control  form-control-lg" id="inputSubjectName" placeholder="Subject Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control  form-control-lg" id="inputStudentID" placeholder="Subject ID">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Subject Credit</label>
                    <div class="col-sm-9">
                        <input type="number"  min="1" max="5" class="form-control  form-control-lg" id="inputSubjectCredit" placeholder="Subject Credit">
                    </div>
                </div>

                <div style="width: fit-content;margin: 0 auto">
                    <button id="button-submit" type="submit" class="btn ">Submit</button>

                </div>


            </form>
        </div>

    </div>
</body>
</html>