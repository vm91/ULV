<div id="forum">
    <?php
        $forumFile=file("room1.txt",FILE_IGNORE_NEW_LINES);
        //echo var_export($forumFile);
        for($line=0;$line<count($forumFile);$line++)
        {
            $messageArr=explode("<!@!>",$forumFile[$line]);
            echo '<div class="forumPost">';
                echo '<div class="forumPostUser">';
                    echo '<img src="bilder/meg1.jpeg"/></br><a href="#">';
                    echo $messageArr[1];
                echo '</a></div>';   
                echo '<div class="forumPostMsg">';
                    echo $messageArr[2];
                echo '</div>';
            echo '</div>';
            echo '<div class="forumPostDate"><p>';
            echo "Torsdag 21/2 2009";
            echo '</p></div>';
        }
    ?>
    <div id="newPosts"></div>
    
    <div class="forumPost">
        <div class="forumPostUser">
            <img src="bilder/meg1.jpeg"/>
            </br>
            <a href="#">Meg</a>
        </div>   
        <form onsubmit="sendMessage();return false;" id="forumForm" class="forumPostMsg">	    
            <textarea rows="6" cols="60" id="messageForum"></textarea>
            </br>
            <div id="statusPost"></div>
            <div id="statusPostError"></div>
            <input id="send" type="submit" value="Send">
            </br></br>
        </form>
    </div>
</div>