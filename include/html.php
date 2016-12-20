<?php
class html
{
    public $Courses;
    function __construct() {
        include 'database.php';
        $this->Courses = new course();
    }
    
    /*
     * Function topp
     * starter div rootcontainer
     * legger inn øverste linje i html
     * hvis inni et kurs, så blir kursnavn overskrift
     */
    function topp ()
    {
        echo '<div id="rootContainer">';
        include('html/topp.php');
    }
    
    function courseStart()
    {
        echo '<div id="headerValg">' . "\n";
        echo '<div id="headerValgList">' . "\n";
    }
    
    function showCourses ()
    {
        // Show all Courses in Header.
        $this->Courses->showAllCourseNameInUlList();
    }
    
    function newCourseButton ()
    {
        // If user is Teacher, show "new Course" button.
        $user = new user();
        $user->UserID = $_SESSION['UID'];
        if ($user->isTeacher())
        {
            echo '<ul id="headerValgNewCourse">' . "\n";
            echo '<a href="newCourse.php">Nytt Kurs</a>' . "\n";
            echo '</ul>' . "\n";
        }
    }
    
    function editCourseButton ()
    {
        // If user is Teacher, show "new Course" button.
        $user = new user();
        $user->UserID = $_SESSION['UID'];
        if ($user->isTeacher())
        {
            echo '<ul id="headerValgNewCourse">' . "\n";
            echo '<a href="editCourse.php"> Rediger Kurs </a>' . "\n";
            echo '</ul>' . "\n";
        }
    }
            
    function courseEnd()
    {
        echo '</div>';
        echo '</div>';
    }
    
    function courseItem ()
    {
        $this->Courses->CourseID = $_REQUEST['courseid'];
        $this->Courses->CourseName = $_REQUEST['coursename'];
        $this->Courses->showCourseItemInUlList();
    }
    
    function newCourse (){
        include("html/newCourse.html");
    }
    
    function admin (){
        include("html/admin.html");
    }
    
    function startContainer ()
    {
        echo '<div id="container">';
    }
    
    function startAdminContainer ()
    {
        echo '<div id="adminSpace"></div>';
        echo '<div id="adminContainer">';
    }
    
    function adminCourse () 
    {
        $this->Courses->adminCourse();
    }
    
    function newsfeed2 ()
    {
        include("html/newsfeed.html");
    }
    
    function newsfeed ()
    {
        echo '  <div id="newsfeed">
                    <h1>Nyheter</h1>
                    <div id="newsfeedStrek"></div>
                    <div id="newsfeedListFooterStrek"></div>
                    <div id="newsfeedArea">';
        $this->Courses->showAllMessageFromCourse();
        echo        '</div>';
        echo    '</div>';
    }
    
    function newsfeedCourse ()
    {
        echo '  <div id="newsfeed">
                    <h1>Nyheter</h1>
                    <div id="newsfeedStrek"></div>
                    <div id="newsfeedListFooterStrek"></div>';
        include("html/innerskrivfeed.php");
        echo        '<div id="newsfeedArea">';
        include ("html/tempfeed.php");
        /*
        $this->Courses->CourseID = $_REQUEST['courseid'];
        $this->Courses->showAllMessageFromThisCourse();  */
        echo        '</div>';
        echo    '</div>';
    }
    
    function deadline ()
    {
        include("html/deadlines.html");
    }
    
    function fagstoff ()
    {
        include("html/fagstoff.html");
    }
    
    function forumValg ()
    {
        include("html/forumvalg.php");
    }
    
    function forum ()
    {
        include("html/innerforum.php");
    }
    
    function adduser ()
    {
        include("html/adduser.html");
    }
    
    function uploadUser ()
    {
        include("html/uploadUser.html");
    }
    
    function endContainer ()
    {
        echo '</div>';
    }
    
    function bottom ()
    {
        include("html/bunn.html");
        echo '</div>'; // rootcontainer
    }
    
    function editCourse () {
        include("html/editCourse.html");
    } 
}
?>
