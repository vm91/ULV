<div id="headerMenu">
    <div id="menu"> 
        <a href="index.php">Home</a>
        <div id="menuCourseNamediv">
            <div id="menuCourseNamedivCenter">
                <?php
                    if(isset($_REQUEST['coursename']))
                        echo $_REQUEST['coursename'];
                ?>
            </div>
        </div>
        <ul id="toppRight">
            <li> <a href="logginn.php?logout=true">Logg Ut</a> </li>
            <li> <a href="#"><img id="profilepic" src="bilder/meg.jpeg"/></a> </li>
        </ul>
    </div>
</div>
<img id="wolfSmall" src="bilder/wolfSmall.png"/>
