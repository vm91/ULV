<?php
    session_start();
    if(!isset($_SESSION['UID']))
        header('location: logginn.php');
    if(!isset($_REQUEST['courseid']) || !isset($_REQUEST['coursename']))
        header('location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
        <script type="text/javascript" src="js/newsfeed.js"></script>
</head>

<body>
    <?php
    include 'include/html.php';
        $html = new html();
        $html->topp();
        
    ?>
    <div id="containerForms">
        <div id="createCourseSpace"></div>
        <div id="createCourseContainer">
            <form action="" method="post">
                <!--<div id="courseParticipant">
                    <div>
                        <div class="tag">Checkbox Big</div>
                        <input type="checkbox" id="checkbox-2-1" class="regular-checkbox big-checkbox" /><label for="checkbox-2-1"></label><label class="checkboxGroupText">Heisann!!!!!</label>
                        <input type="checkbox" id="checkbox-2-2" class="regular-checkbox big-checkbox" /><label for="checkbox-2-2"></label>
                        <input type="checkbox" id="checkbox-2-3" class="regular-checkbox big-checkbox" /><label for="checkbox-2-3"></label>
                        <input type="checkbox" id="checkbox-2-4" class="regular-checkbox big-checkbox" /><label for="checkbox-2-4"></label>
                    </div>
                </div>-->
                    <input type="submit" id="submitCreateCourse" name="createcourse" value="Create Course" />
            </form>
        </div>
    </div>  
</body>
</html>