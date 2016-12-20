<?php
    session_start();
    if(!isset($_SESSION['UID']))
    {
        header('location: logginn.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
    <link rel="shortcut icon" href="bilder/wolfico.ico">
    <title>ULV</title>
</head>
<body>
    <?php
        include 'include/html.php';
        $html = new html();
        $html->topp();
        $html->newCourse();
        $html->endContainer();
    ?>
</body>
</html>
<?php
    if(isset($_REQUEST['createcourse']))
    {
        include 'database.php';
        
        $course = new course();
        $course->CourseName = $_REQUEST['coursename'];
        $courseId = $course->newCourse();
        if ($courseId > -1)
        {
            header('location: index.php');
        }
    }
?>
