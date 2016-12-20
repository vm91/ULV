<?php
//Tilkobling og valg av database

$tilkobling = mysql_connect('localhost','root','','ulv');
if (!$tilkobling)
{
    trigger_error(mysql_error());
    return "Kan ikke koble til server!";
}
$db = mysql_select_db("ulv");
if(!$db)
{
    trigger_error(mysql_error());
    return "Kan ikke koble til databasen. Vennligst kontakt admin.";
}
?>

