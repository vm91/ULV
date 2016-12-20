<?php
    $feedId = $_REQUEST['feedid'];
    
    include '../include/database.php';
   /* $user = new user;
    $user->UserID = $_SESSION['UID'];
    $name = $user->getInfo();
    
    
    $course->CourseID = $courseId; 
    $course->CourseMessageHeader = "header";
    $course->CourseMessage = $message;
    */
    $course = new course();
    echo $course->getFeedMessage($feedId);
    
    
    exit();
?>

