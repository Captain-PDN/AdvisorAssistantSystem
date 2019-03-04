<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CS Advisor Assistant System</title>

    <!--	<link rel="stylesheet" type="text/css" href="bulma-0.7.4/css/bulma.min.css">-->
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
                <a class="navbar-brand"style="color: white">CS Advisor Assistant System</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a class="active"href="#newSubjectAdvisor">Add New Subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> Hello name advisor **edit javascript</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid" >
        <!--        <h1 style="text-align: center">Add New Advisor</h1>-->
        <div class="content-details-subject scrollIt" >
            <h1 class="headText">Subject ID Subject Name</h1>
            <table class="table" style="text-align: center">
                <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Max Scores</th>
                    <th>Score Rate (percent)</th>
                    <th>Delete </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>HW1</td>
                    <td contenteditable="true">20</td>
                    <td contenteditable="true">10</td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>HW2</td>
                    <td contenteditable="true">40</td>
                    <td contenteditable="true">5</td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>HW3</td>
                    <td contenteditable="true">10</td>
                    <td contenteditable="true">10</td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="content-details-subject" >
            <h1 class="headText">Add New Assignment</h1>
            <form>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Assignment Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-lg" id="inputAssignmentName" placeholder="Assignment Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Max Score</label>
                    <div class="col-sm-9">
                        <input type="number" min="0" max="100" class="form-control  form-control-lg" id="inputMaxScore<" placeholder="Max Score">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Score Rate (percent)</label>
                    <div class="col-sm-9">
                        <input type="number" min="0" max="100" class="form-control  form-control-lg" id="inputScoreRate" placeholder="Score Rate (percent)">
                    </div>
                </div>

                <div style="width: fit-content;margin: 0 auto">
                    <button id="btn-add-Assign" type="submit" class="btn ">Submit</button>
                </div>
            </form>
        </div>
        <div class="content-details-subject" >
            <h1 class="headText">Announcement Score</h1>
            <form>
                <div class="form-group row">

                    <label for="sel1" class="col-sm-3 col-form-label">Type of Exam</label>
                    <div class="col-sm-9 form-control-lg"">
                        <select class="form-control" id="examType">
                            <option value="1">Mid-term</option>
                            <option value="2">Final</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Score Announcement Date</label>
                    <div class="col-sm-9">
                        <input type="date"  class="form-control  form-control-lg" id="date" placeholder="Max Score">
                    </div>
                </div>

                <div style="width: fit-content;margin: 0 auto">
                    <button id="btn-add-Assign" type="submit" class="btn ">Submit</button>
                </div>
            </form>
        </div>

        <div class="content-details-subject">
            <h1 class="headText">Announcement Score</h1>
            <div class="form-group row" style="text-align: center">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <button id="btn-new-student" name="addNewStudent" type="submit" class="btn btn-manage-score">Add New Student</button>
                </div>
                <div class="custom-file col-sm-2">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Add New Student CSV File</label>
                </div>
                <div class="custom-file col-sm-2">
                    <input type="file" class="custom-file-input " id="customFile">
                    <label class="custom-file-label" for="customFile">Add Score CSV File</label>
                </div>
                <div class="col-sm-2">
                    <button id="btn-export-score" name="exportScore" type="submit" class="btn  btn-manage-score">Export Score</button>
                </div>
                <div class="col-sm-2">
                    <button id="btn-import-grade" name="importGrade" type="submit" class="btn  btn-manage-score">import Grade</button>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>


        <div class="content-details-subject scrollIt" >
            <h1 class="headText">Student</h1>
            <table class="table" style="text-align: center">
                <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Lastname</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>5910256354</td>
                    <td>Suzy</td>
                    <td>Dean</td>
                    <td>
                        <button  class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>5910047698</td>
                    <td>Thomas</td>
                    <td>Lee</td>
                    <td>
                        <button  class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>5910074595</td>
                    <td>Mia</td>
                    <td>Jones</td>
                    <td>
                        <button  class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <button  class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>



    </div>

</body>
</html>