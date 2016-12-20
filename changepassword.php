<?php
session_start();
if(!isset($_SESSION['UID']))
header('location: logginn.php');

include ("include/db_connect.php");
if($_REQUEST["Submit"]=="Update")
{
$sql="update bruker set Passord ='{$_REQUEST['newpassword']}' where BrukerID='{$_SESSION['UID']}'";echo $sql;
echo $_SESSION['UID'];
mysql_query($sql);
echo mysql_error();
header("Location:changepassword.php?msg=oppdatert");
echo "BrukerID";
//Email
$melding .= "Ditt nye passord : ".$_REQUEST["newpassword"]. "\r\n";
$til = $_REQUEST["Epost"];
$subject = "Nytt passord for Ulverktøy";
$fra = "admin@ulv.com";
$headers = "Fra:" . $fra;
if (mail($til,$subject,$melding, $header)) { 
print ( "Mailen er sendt \n" ); 
} 
else { print ( "En feil oppstod ved sending av mail, gå tilbake og send på nytt.\n");} 

}

$passord= $_REQUEST[newpassword];
$pwd = hash('sha256', $passord);

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV Endre Passord</title>

<script language="javascript" type="text/javascript">
function validate()
{

var formName=document.frm;

if(formName.newpassword.value == "")
{
document.getElementById("newpassword_label").innerHTML='Tast inn ditt nye passord';
formName.newpassword.focus();
return false;
}
else
{
document.getElementById("newpassword_label").innerHTML='';
}


if(formName.cpassword.value == "")
{
document.getElementById("cpassword_label").innerHTML='Tast inn ditt nye passord pånytt';
formName.cpassword.focus();
return false;
}
else
{
document.getElementById("cpassword_label").innerHTML='';
}


if(formName.newpassword.value != formName.cpassword.value)
{
document.getElementById("cpassword_label").innerHTML='Passordene er ikke like';
formName.cpassword.focus()
return false;
}
else
{
document.getElementById("cpassword_label").innerHTML='';
}
}
</script>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
</head>
<body>

<form action="" method="post" name="frm" id="frm" onSubmit="return validate();">
<table width="47%" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="center"></td>
</tr>
<td colspan="2">Endre Passord</span></td>
</tr>
<?php if($_REQUEST[msg]=="updated") { ?>
<td colspan="2"><span class="style7">Passordet har blitt endret.</span></td>
</tr>
<?php } ?>
<tr>
<td>Nytt Passord:</span></td>
<td><input type="password" name="newpassword" id="newpassword" size="20" autocomplete="off"/>&nbsp; <label id="newpassword_label" class="level_msg"></td>
</tr>
<tr>
<td>Bekreft Passord:</span></td>
<td><input type="password" name="cpassword" id="cpassword" size="20" autocomplete="off">&nbsp; <label id="cpassword_label" class="level_msg"></td>
</tr>
<td colspan="2" align="center"><input type="submit" name="Submit" value="Endre" onSubmit="return validate();"/></td>
</tr>

</table>
</form>
</body>
</html>
