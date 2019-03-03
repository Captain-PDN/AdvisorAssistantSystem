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
                    <li><a class="active" href="#home">Home</a></li>
                                        <li><a href="#news">Add New Advisor</a></li>
                                        <li><a href="#contact">Add New Student</a></li>
                                        <li><a href="#about">Add New Subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello name admin **edit javascript</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid" >
       <div id="content-home">
<!--           <h1 style="padding-top: 50px;margin-bottom: 30px;">Administrator</h1>-->

           <div class="col-md-4 headShowList">
               <p>ADVISOR</p>
               <div class="showList">
                   <p>show list advisor</p>
               </div>
           </div>
           <div class="col-md-4 headShowList">
               <p>STUDENT</p>
               <div class="showList">
                   <p>show list student</p>
               </div>
           </div>
           <div class="col-md-4 headShowList">
               <p>SUBJECT</p>
               <div class="showList">
                   <p>show list subject</p>
               </div>
           </div>

       </div>
    </div>

</div>
</body>
</html>