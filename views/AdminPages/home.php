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
    <link rel="stylesheet" href="../../css/advisorCSS/advisorCSS.css" >
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700i" rel="stylesheet">

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
    <div>
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
                        <a class="navbar-brand" style="color: white;">CS Advisor Assistant System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a class="active" href="home.php">Home</a></li>
                            <li><a href="newAdvisor.php">+New Advisor</a></li>
                            <li><a href="newStudent.php">+New Student</a></li>
                            <li><a href="newSubject.php">+New Subject</a></li>
                            <li><a href="changePassword.php">Change Password</a></li>
                            <li><a href="signUpAdmin.php">Sign-Up Admin</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello
                                <?php
                                    require "../../vendor/autoload.php";
                                    use \Core\QueryBuilder;

                                    echo $_SESSION["adminName"];
                                ?></a></li>
                            <li><a href="../loginPages/loginAdmin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        
        <div class="container">
            <br>
            <h1 class="headText">Advisor List</h1>
            <div class="row search">
                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" class="form-control input-sm" placeholder="Search Advisor... (Firstname & Lastname)"
                           onkeyup="searchAdvisor()" id="inputAdvisor">
                </div>
            </div>

            <div class="content-details-subject scrollIt" style="max-width: 640px; max-height: 384px;">
                <table class="table" style="text-align: left;" id="advisorTable">
                    <thead>
                    <tr>
                        <th class="col-sm-4">Advisor Firstname</th>
                        <th class="col-sm-4">Advisor Lastname</th>
                        <th class="col-sm-4">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $qb = new QueryBuilder();
                    $result = $qb->selectAll("Teacher");
                    ?>
                    <?php foreach($result as $rs): ?>
                        <tr>
                            <td><?= $rs->Name; ?></td>
                            <td><?= $rs->Lastname; ?></td>
                            <td><?= $rs->Email; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <br>
            <h1 class="headText">Student List</h1>
            <div class="row search">
                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" class="form-control input-sm" placeholder="Search Student... (ID or Firstname & Lastname)"
                           onkeyup="searchStudent()" id="inputStudent">
                </div>
            </div>

            <div class="content-details-subject scrollIt" style="max-width: 768px; max-height: 384px;">
                <table class="table" style="text-align: left;" id="studentTable">
                    <thead>
                    <tr>
                        <th class="col-sm-3">Student ID</th>
                        <th class="col-sm-3">Student Firstname</th>
                        <th class="col-sm-3">Student Lastname</th>
                        <th class="col-sm-3">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $qb = new QueryBuilder();
                    $result = $qb->selectAll("Student");
                    ?>
                    <?php foreach($result as $rs): ?>
                        <tr>
                            <td align="center"><?= $rs->ID; ?></td>
                            <td><?= $rs->Name; ?></td>
                            <td><?= $rs->Lastname; ?></td>
                            <td><?= $rs->Email; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <br>
            <h1 class="headText">Subject List</h1>
            <div class="row search">
                <div class="col-sm-4 col-sm-offset-4">
                    <input type="text" class="form-control input-sm" placeholder="Search Subject... (ID or Name)"
                           onkeyup="searchSubject()" id="inputSubject">
                </div>
            </div>

            <div class="content-details-subject scrollIt" style="max-width: 768px; max-height: 384px;">
                <table class="table" style="text-align: left;" id="subjectTable">
                    <thead>
                    <tr>
                        <th class="col-sm-3">Subject ID</th>
                        <th class="col-sm-6">Subject Name</th>
                        <th class="col-sm-3">Credit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $qb = new QueryBuilder();
                    $result = $qb->selectAll("CourseInfo");
                    ?>
                    <?php foreach($result as $rs): ?>
                        <tr>
                            <td align="center"><?= $rs->CourseID; ?></td>
                            <td><?= $rs->Name; ?></td>
                            <td align="center"><?= $rs->Credit; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function searchAdvisor() {
            var input = document.getElementById("inputAdvisor");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("advisorTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    var txtFirstValue = tr[i].getElementsByTagName("td")[0].textContent;
                    var txtSecondValue = tr[i].getElementsByTagName("td")[1].textContent;
                    var txt = txtFirstValue + " " + txtSecondValue;
                    if (txt.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchStudent() {
            var input = document.getElementById("inputStudent");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("studentTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    var idValue = td.textContent;
                    var txtFirstValue = tr[i].getElementsByTagName("td")[1].textContent;
                    var txtSecondValue = tr[i].getElementsByTagName("td")[2].textContent;
                    var txt = txtFirstValue + " " + txtSecondValue;
                    if (txt.toUpperCase().indexOf(filter) > -1 || idValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchSubject() {
            var input = document.getElementById("inputSubject");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("subjectTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    var idValue = td.textContent;
                    var txtValue = tr[i].getElementsByTagName("td")[1].textContent;
                    if (idValue.toUpperCase().indexOf(filter) > -1 || txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>