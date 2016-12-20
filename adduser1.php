<?php
include ("include/usero.php");
if($_REQUEST["Bekreft"])
{
$user = new bruker();
$user->set_fornavn($_REQUEST["Fornavn"]);
$user->set_etternavn($_REQUEST["Etternavn"]);
$user->set_brukernavn($_REQUEST["Brukernavn"]);
$user->set_epost($_REQUEST["Epost"]);
$user->set_telefonnr($_REQUEST["Telefonnr"]);
$user->set_adresse($_REQUEST["Adresse"]);
$user->set_postnr($_REQUEST["Postnr"]);
$user->set_fodselsnr($_REQUEST["Fodselsnr"]);
$user->set_passord($_REQUEST["Passord"]);

//Viser innhold
echo "<br/>";
echo "Her er detaljene om studenten fra forige side: <br/>";
echo "Fornavn : " .$user->get_fornavn()." <br/>";
echo "Etternavn : " .$user->get_etternavn()." <br/>";
echo "Brukernavn : " .$user->get_brukernavn()." <br/>";
echo "Epost : " .$user->get_epost()." <br/>";
echo "Telefon nr : " .$user->get_telefonnr()." <br/>";
echo "Adresse : " .$user->get_adresse()." <br/>";
echo "Postnr : " .$user->get_postnr()." <br/>";
echo "Fødselsnr : " .$user->get_fodselsnr()." <br/>";
$user->delt_db();

//Email
$melding = "Hei ".$_REQUEST["Fornavn"]. "\r\n";
$melding .= "Brukernavn : ".$_REQUEST["Brukernavn"]. "\r\n";
$melding .= "Passord : ".$_REQUEST["Passord"]. "\r\n";
$til = $_REQUEST["Epost"];
$subject = "Velkommen som ny bruker av Ulverktøy";
$fra = "admin@ulv.com";
$headers = "Fra:" . $fra;
if (mail($til,$subject,$melding, $header)) { 
print ( "Mailen er sendt \n" ); 
} 
else { print ( "En feil oppstod ved sending av mail, gå tilbake og send på nytt.\n");} 

}
?>