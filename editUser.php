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
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
        <script type="text/javascript" src="js/newuser.js"></script>
</head>

<body>
    <?php
    include 'include/html.php';
        $html = new html();
        $html->topp();
        
        $html->startAdminContainer();
        $html->adminCourse();
        $html->endContainer();  
        
    ?>
</body>
</html>