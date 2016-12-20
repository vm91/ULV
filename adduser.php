<?php
    session_start();
    if(!isset($_SESSION['UID']))
    {
        header('location: logginn.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/styletopp.css" />
        <link rel="shortcut icon" href="bilder/wolfico.ico">
        <title>ULV</title>
        <script type="text/javascript" src="js/newuser.js"></script>
</head>

<body>
    <?php
    include 'include/html.php';
        $html = new html();
        $html->topp();
        
        $html->startAdminContainer();
        $html->adduser();
        $html->endContainer();
        
        $html->startAdminContainer();
        $html->uploadUser();
        $html->endContainer();
        
    ?>
</body>
</html>

<?php
    if(isset($_REQUEST["Bekreft"]))
    {
        include ('include/validuser.php');
        $valid = new validuser();
        $user = new user();
        
        // Legger inn i user
        // Validerer hver linje. 
        $user->FirstName = $valid->setFirstname($_REQUEST["Fornavn"]);
        $user->Surname = $valid->setSurname($_REQUEST["Etternavn"]);
        $user->email = $valid->setEmail($_REQUEST["Epost"]);
        $user->UserName = $valid->setUsername($_REQUEST["Brukernavn"]);
        $user->adress = $valid->setAdress($_REQUEST["Adresse"]);
        $user->phone = $valid->setPhone($_REQUEST["Telefonnr"]);
        $user->zip = $valid->setZip($_REQUEST["Postnr"]);
        $user->state = $valid->setState($_REQUEST["Poststed"]);
        $user->birth = $valid->setBirth($_REQUEST["Fodselsnr"]);
        $user->Password = $valid->setPassword($_REQUEST["Passord"]);
        
        // Viser hva som ble skrevet
        // Skjekk om det validerte 
        // Sett inn i databasen hvis valid
        // Skriver ut evt hva som er feil
        $valid->valid($user);

        
        //Email
        $melding = "Hei ".$user->FirstName. "\r\n";
        $melding .= "Brukernavn : ".$user->Surname."\r\n";
        $melding .= "Passord : ".$user->Password. "\r\n";
        $til = $_REQUEST["Epost"];
        $subject = "Velkommen som ny bruker av Ulverktøy";
        $fra = "admin@ulv.com";
        $header = "Fra:" . $fra;
        if (mail($til,$subject,$melding, $header)) { 
            print ( "Mailen er sendt \n" ); 
        } 
        else { 
            print ( "En feil oppstod ved sending av mail, gå tilbake og send på nytt.\n");} 
    }
    
    if(isset($_REQUEST["uploaduser"]))
    {
        //filtyper
        // Nye filtyper ligger her: http://filext.com/faq/office_mime_types.php
        $allowedExts = array("pdf", "txt");
        $tmp = explode(".", $_FILES["file"]["name"]);
        $extension = end($tmp);
        if ((($_FILES["file"]["type"] == "application/pdf")
            || ($_FILES["file"]["type"] == "text/plain"))
            && ($_FILES["file"]["size"] < 9800000)
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }
            else
            {
                echo "Opplastet filnavn: " . $_FILES["file"]["name"] . "<br>";
                "Type: " . $_FILES["file"]["type"] . "<br>";
                "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
                if (file_exists("upload/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " Eksisterer allerede. ";
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "upload/" . $_FILES["file"]["name"]);
                    echo "Lagret i: " . "user/" . $_FILES["file"]["name"];
                }
            }
        }
        else
        {
          echo "Ukjent filtype. VÃ¦r vennlig Ã¥ kontakt lÃ¦rer.";
        }
    }
?>