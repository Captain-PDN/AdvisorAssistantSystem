<?php

namespace Core;

use \Core\Connection;

// require "../globalVariable.php";
//session_start();
class QueryBuilder {

    private $pdo;

    public function __construct() {
        $this->pdo = Connection::Make();
    }

    public function selectAll($table){
        $query = $this->pdo->prepare('select * from '.$table);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function login($username, $password){
        $query = $this->pdo->prepare('select * from admin');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);

        foreach($result as $rs){
            if ($rs->Username == $username && password_verify($password, $rs->Password)) {
                $_SESSION["adminName"] = $rs->Name;
                $_SESSION["adminUsername"] = $rs->Username;

                return true;
            }
        }
        return false;
    }

    public function registerAdmin($email, $password, $name){
        $query = $this->pdo->prepare('select * from admin');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);

        if ($query->rowCount() > 0){
            $id = '';
            $len = 0;
            foreach($result as $rs){
                $id = $rs->ID + 1;
                $id = $id.'';
                $len = strlen($id);
            }
            for ($x = 0; $x < 10-$len; $x++) {
                $tmp = '0'.$id;
                $id = $tmp;
            }
        } else {
            $id = "0000000000";
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->pdo->prepare('insert into `admin` values ("' .$id.'", "'.$email.'", "'.$password.'", "'.$name.'")');
        $query->execute();
    }

    public function adminChangePassword($adminID, $newPassword) {
        $id = str_pad($adminID, 10, "0", STR_PAD_BOTH);

        $query = $this->pdo->prepare('update admin set Password="'.$newPassword.'" where ID = "'.$id.'"');
        $query->execute();
    }

    public function adminAddTeacher($email, $name, $lastName) {
        $query = $this->pdo->prepare('select * from teacher');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            $id = '';
            $len = 0;
            foreach($result as $rs){
                $id = $rs->ID + 1;
                $id = $id.'';
                $len = strlen($id);
            }
            for ($x = 0; $x < 10-$len; $x++) {
                $tmp = '0'.$id;
                $id = $tmp;
            }
        }
        else{
            $id = "0000000000";
        }

        $query = $this->pdo->prepare('insert into `Teacher` values ("' .$id.'", "'.$email.'", "'.$name.'", "'.$lastName.'")');
        $query->execute();
    }

    public function addStudents($id, $email, $name, $lastName) {
        $query = $this->pdo->prepare('insert into `Student` values ("' .$id.'", "'.$email.'", "'.$name.'", "'.$lastName.'")');
        $query->execute();
    }

    public function recordStudentBehavior($studentID , $behaivorLevel, $behavior, $abnormaly, $recorder, $behaviorLevel) {
        $query = $this->pdo->prepare('select StudentID, Recorder from studentBehavior');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        $found = false;

        foreach ($result as $rs) {
            if ($rs->StudentID == $studentID && $rs->Recorder == $recorder) {
                $found = true;
            }
        }

        if ($found) {
            $query = $this->pdo->prepare('update studentBehavior set BehaviorLevel="'.$behaivorLevel.'", Behavior="'.$behavior.'", Anormaly="'.$abnormaly.'" WHERE studentID = "'.$studentID.'"');
            $query->execute();
        } else {
            $query = $this->pdo->prepare('insert into `studentBehavior` values ("'.$studentID.'", "'.$behaviorLevel.'", "'.$behavior.'", "'.$abnormaly.'", "'.$recorder.'")');
            $query->execute();
        } 
    }

    public function setStudentBehaviorLevel($studentID, $behaviorLevel, $recorder) {
        $query = $this->pdo->prepare('select StudentID, BehaviorLevel from studentBehavior');
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        $found = false;

        foreach ($result as $rs) {
            if ($rs->StudentID == $studentID && $rs->Recorder == $recorder) {
                $found = true;
            }
        }

        if ($found) {
            $query = $this->pdo->prepare('update studentBehavior set BehaviorLevel="'.$behaviorLevel.'" WHERE studentID = "'.$studentID.'" ');
            $query->execute();
        }
    }

    public function getStudentBehavior($studentID) {
        $query = $this->pdo->prepare('select Behaior from studentBehavior where StudentID="'.$studentID.'"');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function addCourse($courseID, $courseName, $courseCredit, $teacherID) {
        $query = $this->pdo->prepare('insert into `CourseInfo` values ("'.$courseID.'", "'.$courseName.'", "'.$courseCredit.'")');
        $query->execute();

        $query = $this->pdo->prepare('insert into `TeachCourse` values ("'.$courseID.'", "'.$teacherID.'")');
        $query->execute();
    }

    public function addminAddPreCourse($courseID, $preCourseID) {
        $query = $this->pdo->prepare('insert into `Prerequisite` values ("'.$courseID.'", "'.$preCourseID.'")');
        $query->execute();
    }

    public function addStudentsToCourse($courseID, $studentID) {
        $query = $this->pdo->prepare('insert into `Course` values ("'.$courseID.'", "'.$studentID.'")');
        $query->execute();
    }

    public function removeStudent($courseID, $studentID) {
        $query = $this->pdo->prepare('delete from `Course` where StudentID="'.$studentID.'"');
        $query->execute();
    }

    public function getScore($courseID, $teacherID) {
        $query = $this->pdo->prepare('select StudentID, Topic, MaxScore, Score from CourseScore inner joint TeachCourse on TeachCourse.ID="'.$courseID.'" and TeachCourse.TeacherID="'.$teacherID.'" and TeachCourse.ID=CourseScore.CourseID');
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function setScore($courseID, $studentID, $topic, $score) {
        $query = $this->pdo->prepare('insert into `CourseScore` values ("'.$courseID.'", "'.$studentID.'", "'.$topic.'", "'.$score.'")');
        $query->execute();
    }

    public function updateScore($courseID, $studentID, $topic, $score) {
        $query = $this->pdo->prepare('update `CourseScore` set score="'.$score.'" where CourseID="'.$courseID.'" and StudentID="'.$studentID.'" and Topic="'.$topic.'"');
        $query->execute();
    }

    public function addCourseTopic($courseID, $topic, $weigh, $maxScore, $announceDate) {
        $query = $this->pdo->prepare('insert into `CourseTopic` values ("'.$courseID.'", "'.$topic.'", "'.$weigh.'", "'.$maxScore.'", "'.$announceDate.'")');
        $query->execute();
    }

    public function setTopicMaxScore($courseID, $topic, $maxScore) {
        $query = $this->pdo->prepare('update `CourseTopic` set MaxScore="'.$maxScore.'" where CourseID="'.$courseID.'" and Topic="'.$topic.'"');
        $query->execute();
    }

    public function removeTopic($courseID, $topic) {
        $query = $this->pdo->prepare('delete from `CourseTopic` where CourseID="'.$courseID.'" and Topic="'.$topic.'"');
        $query->execute();
    }

    public function setTopicAnnounceDate($courseID, $topic, $announceDate) {
        $query = $this->pdo->prepare('update `CourseTopic` set ScoreAnnounceDate="'.$announceDate.'" where CourseID="'.$courseID.'" and Topic="'.$topic.'"');
        $query->execute();
    }
}

?>