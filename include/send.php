<?php
echo $_SESSION['UID'];

$message=strip_tags($_REQUEST['message']);
$message=stripslashes($message);

include 'database.php';
$user = new user;
$name = $user->getInfo();

$room_file=file("room1.txt",FILE_IGNORE_NEW_LINES);

$room_file[]=time()."<!@!>".$name."<!@!>".$message;
if (count($room_file)>20)
    $room_file=array_slice($room_file,1);
$file_save=fopen("room1.txt","w+");
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

