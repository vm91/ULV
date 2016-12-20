<?php
    $message=strip_tags($_REQUEST['message']);
    $message=stripslashes($message);
    $courseId = $_REQUEST['courseid'];
    echo $courseId;
    /*
    include 'database.php';
    $user = new user;
    $user->UserID = $_SESSION['UID'];
    $name = $user->getInfo();
     */

    $name = "ulf";
    $room_file=file("feed.txt",FILE_IGNORE_NEW_LINES);

    $room_file[]=time()."<!@!>".$name."<!@!>".$message;
    if (count($room_file)>20)
        $room_file=array_slice($room_file,1);
    $file_save=fopen("feed.txt","w+");
    flock($file_save,LOCK_EX);
    for($line=0;$line<count($room_file);$line++)
    {
        fputs($file_save,$room_file[$line]."\n");
    };
    flock($file_save,LOCK_UN);
    fclose($file_save);
    echo "sentok";
    exit();
?>

