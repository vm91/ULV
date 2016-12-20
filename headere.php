<?php
class header
{
    
    function topp ()
    {
        include('../html/courseTopp.php');
    }
    
    function courseStart()
    {
        echo '<div id="headerValg">';
        echo '<div id="headerValgdiv">';
        echo '<ul id="headerValgList">';
        include 'database.php';
    }
    
    function showCourses ()
    {
        // Show all Courses in Header.
        $courses = new course();
        $courses->showAllCourseNameInUlList();
    }
    
    function newCourse ()
    {
        // If user is Teacher, show "new Course" button.
        $user = new user();
        $user->UserID = $_SESSION['UID'];
        if ($user->isTeacher())
        {
            echo '<ul id="headerValgNewCourse">';
            echo '<a href="#"> Rediger Kurs </a>';
            echo '</ul>';
        }
    }
            
    function courseEnd()
    {
        echo '</div>';
        echo '</div>';
    }
    
    function courseItem ()
    {
        $courses = new course();
        $courses->CourseID = $_REQUEST['courseid'];
        $courses->CourseName = $_REQUEST['coursename'];
        $courses->showCourseItemInUlList();
    }
}
?>
