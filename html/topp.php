<div id="headerMenu">
    <div id="menu"> 
        <a href="index.php">Home</a>
        <div id="menuCourseNamediv">
            <?php
                if(isset($_REQUEST['coursename']))
                {
                    echo '<h1>';
                    echo $_REQUEST['coursename'];                        
                    echo '</h1>';
                }
            ?>
        </div>
        <a id="logOut" href="logginn.php?logout=true">Logg Ut</a> </li>
        <a href="#"><img id="profilepic" src="bilder/meg.jpeg" alt="min side"/></a>
    </div>
</div>
<a  href="index.php"><img id="wolfSmall" src="bilder/wolfSmall.png" alt="hjem"/></a>
