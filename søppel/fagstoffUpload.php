<?php
    session_start();
    if(!isset($_SESSION['UID']))
        header('location: logginn.php');
    if(!isset($_REQUEST['courseid']) || !isset($_REQUEST['coursename']))
        header('location: home.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="styleold.css" />
    <link rel="shortcut icon" href="bilder/wolfico.ico">
    <title>ULV</title>
</head>
<body>
<div id="rootContainer">
    <div id="headerMenu">
        <div id="menu"> 
            <a href="home.php"> Home</a>
            <div id="menuCourseNamediv">
                <div id="menuCourseNamedivCenter">
                    <?php
                        echo $_REQUEST['coursename'];
                    ?>
                    : Fagstoff
                </div>
            </div>
            <ul id="toppRight">
                <li> <a href="logginn.php?logout=true">Logg Ut</a> </li>
                <li> <a href="#"><img id="profilepic" src="bilder/meg.jpeg"/></a> </li>
            </ul>
        </div>
    </div>
    <img id="wolfSmall" src="bilder/wolfSmall.png"/>
    <div id="containerForms">
        <div id="createCourseSpace"></div>
        <div id="createCourseContainer">
            <form action="" method="post" enctype="multipart/form-data">
                <div id="courseNamediv>">
                    <?php
    if(isset($_REQUEST['submit']))
    {
        include 'include/files.php';
        //header('location: home.php');
    }
?>
                    <input class="courseNameclass" type="text" name="coursename" 
                           placeholder="Folder name" 
                           title="Please enter your folder name" 
                           value=""
                           value="Foldername"
                           tabindex="1"/>
                </div>
                <input type="file" class="button" multiple>
                
                <div id="uploadFiles">
                    <input class="courseNameclass" type="file" name="file" id="file">
                </div>
                    <input type="submit" id="submitCreateCourse" name="submit" value="Last Opp" />
            </form>
        </div>
    </div>  
</div>
</body>
</html>

