<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="style/stylelogginn.css" />
    <link rel="shortcut icon" href="bilder/wolfico.ico">
    <title>ULV</title>
</head>
<body>
<!---<div id="rootContainer">
--->
    <div id="headerMenu">
        <h1>ULV</h1>
    </div>
    <div id="container">
        
        <div id="logo">
            <img src="bilder/wolfLogo.png"/>
        </div>
        <div id="loggInnContainer">
            
            
            
                <form action="" method="post" id="loggInnForm">
				<table>
				<tr><td>
				Brukernavn
				</td><td>
                    <input class="inn" type="text" name="username" 
                           placeholder="Brukernavn" 
                           title="Skriv inn brukernavn" 
                           value="" data-validators="required"
                           value="Username"
                           tabindex="1"/>
                </td></tr>
                    <!--onclick="this.value='';"
                           onfocus="this.select()" 
                           onblur="this.value=!this.value?'Username':this.value;" 
                    data-validators="required" -->
				<tr><td>Passord
				</td><td>
                    <input class="inn" type="password" name="password" 
                           id="password" autocomplete="off" 
                           placeholder="Passord" 
                           title="Skriv inn passord" 
                           value="" 
                           tabindex="2">
				</td><td>
                    <input type="submit" id="submitButton" name="login" value="Logg inn" tabindex="3"/>
				</td></tr>
				</table>
			    </form>
            
        </div>
    </div>
</div>
</body>
</html>

<?php
    if(isset($_REQUEST['login']))
    {
        echo 'hei';
        include 'include/database.php';
        
        $user = new user();
        $user->UserName = $_REQUEST['username'];
        $user->Password = $_REQUEST['password'];
        $uid = $user->login();
        
        // FJERN DENNE -----------------------------------------
          $_SESSION['UID'] = "1";
          header('location: index.php');
        
        //----------------------------------------------------
        
        
        if ($uid < 0)
            echo "Brukernavnet er feil";
        else 
        {
            $_SESSION['UID'] = $uid;
            header('location: index.php');
        }
    }
    if(isset($_REQUEST['logout']))
    {
        $_SESSION['UID'] = null;
    }
?>
