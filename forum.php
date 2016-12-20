<?php
    session_start();
    if(!isset($_SESSION['UID']))
        header('location: logginn.php');
    /*if(!isset($_REQUEST['courseid']) || !isset($_REQUEST['coursename']))
        header('location: index.php');*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
        <script type="text/javascript" src="js/forumValg.js"></script>
        
</head>

<body>
    <?php
    include 'include/html.php';
        $html = new html();
        $html->topp();
        $html->courseStart();
        $html->showCourses();
        $html->courseEnd();
        $html->courseItem();
        
        $html->startContainer();
        $html->forumValg();
        $html->endContainer(); 
        
        //$html->bottom();
    ?>
</body>
</html>