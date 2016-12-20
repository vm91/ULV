<?php
    $message=strip_tags($_REQUEST['message']);
    $message=stripslashes($message);
    $header=strip_tags($_REQUEST['header']);
    $header=stripslashes($header);
    
    $courseId = $_REQUEST['courseid'];
    
    echo $message;
    
    include '../include/database.php';
   /* $user = new user;
    $user->UserID = $_SESSION['UID'];
    $name = $user->getInfo();
    */
    $course = new course();
    $course->CourseID = $courseId;
    $course->CourseMessageHeader = "header";
    $course->CourseMessage = $message;
    $course->CourseMessageHeader = $header;
    $course->newCoursefeed();
    exit();
?>

