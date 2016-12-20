<?php
$lastreceived=$_REQUEST['lastreceived'];
$room_file=file("room1.txt",FILE_IGNORE_NEW_LINES);
for($line=0;$line<count($room_file);$line++)
{
    $messageArr=explode("<!@!>",$room_file[$line]);
    
    // Rediger output i HTML
    if($messageArr[0]>$lastreceived)
    {
        echo '<div class="forumPost">';
            echo $messageArr[1];
        echo '</div>';
    }
}
echo "<SRVTM>".$messageArr[0];
?>
