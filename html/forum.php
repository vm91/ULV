<div id="forum">
    <?php
        $room_file=file("room1.txt",FILE_IGNORE_NEW_LINES);
        for($line=0;$line<count($room_file);$line++)
        {
            $messageArr=explode("<!@!>",$room_file[$line]);
            echo '<div class="forumPost">';
                echo $messageArr[1];
            echo '</div>';
        }
    ?>
    <form onsubmit="sendMessage();return false;" id="messageForm">	    
        <input id="message" type="text">
        <input id="send" type="submit" value="Send">
        <div id="serverRes"></div>
    </form>
</div>