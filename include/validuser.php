<?php
class validuser {
    public $valid;
    public $notvalid;
    public $user;
    
    function __construct() {
        $this->valid = true;
        $this->notvalid = "";
    }
    
    public function valid($user){
        // Skjekker om det validerer
        // Hvis det validerer, setter inn i databasen
        // Param : Må være av classe user fra database.php
            /*
        if($this->valid)
        {*/
            //Legg inn i databasen.
            $user->addUser();
            echo "Lagt inn i databasen:"."<br>";
            /*
        }
        else 
        {
            echo 'Vennligst aktiver Javascript!
                <br>
                Dette er ikke validert:
                <br>';
            echo $this->notvalid;
            echo "<br/>";
            echo "Du skrev: <br/>";
        }
             */
        
        //Viser innhold
        echo "Fornavn : " .$user->FirstName." <br/>";
        echo "Etternavn : " .$user->Surname." <br/>";
        echo "Brukernavn : " .$user->UserName." <br/>";
        echo "Epost : " .$user->email." <br/>";
        echo "Telefon nr : " .$user->phone." <br/>";
        echo "Adresse : " .$user->adress." <br/>";
        echo "Postnr : " .$user->zip." <br/>";
        if ($user->state != "")
            echo "Poststed : " .$user->state." <br/>";
        echo "Fødselsnr : " .$user->birth." <br/>";
    }

    /*
     * Alle disse funksjonen
     */
    
    public function setFirstname($firstname)
    {
        if (preg_match("/^[a-�A-�][a-�A-�.]{2,30}$/", $firstname))
            return $firstname;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i fornavn: ".$firstname."<br>";
            return $firstname;
        }
    }
    public function setSurname ($surname)
    {
        if (preg_match("/^[a-�A-�][a-�A-�.]{0,30}$/", $surname))
            return $surname;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i Etternavn: ".$surname."<br>";
            return $surname;
        }
    }
    
    public function setUsername ($username)
    {
        if (preg_match("/^[a-�A-�][a-�A-�.]{2,30}$/", $username))
            return $username;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i brukernavn: ".$username."<br>";
            return $username;
        }
    }
    
    public function setEmail ($email)
    {
        if (preg_match("/^[a-�A-�0-9]+@[a-�A-�.]{2,50}$/", $email))
            return $email;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i email: ".$email."<br>";
            return $email;
        }
    }
    
    public function setPhone ($phone)
    {
        if (preg_match("/^[0-9]{8}$/", $phone))
            return $phone;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i telefon nummer: ".$phone."<br>";
            return $phone;
        }
    }
    
    public function setAdress ($adress)
    {
        if (preg_match("/^[a-�A-�][a-�A-�.][0-9]{2,50}$/", $adress))
            return $adress;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i Adresse: ".$adress."<br>";
            return $adress;
        }
    }
    
    public function setZip ($zip)
    {
        if (preg_match("/^[0-9]{4}$/", $zip))
        {
            return $zip;
        }
        else {
            $this->valid = false;
            $this->notvalid += "Feil i Postnr: ".$zip."<br>";
            return $zip;
        }
    }
    
    public function setState ($state)
    {
        if ($state == "")
            return $state;
        else if (preg_match("/^[a-�A-�][a-�A-�.]{0,30}$/", $state))
            return $state;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i Poststed: ".$state."<br>";
            return $state;
        }
    }
    
    public function setBirth ($birth)
    {
        if (preg_match("/^[0-9]{6}$/", $birth))
            return $birth;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i Fødselsdato: ".$birth."<br>";
            return $birth;
        }
    }
    public function setPassword ($password)
    {
        if (preg_match("/^[0-9]{4}$/", $password))
            return $password;
        else {
            $this->valid = false;
            $this->notvalid += "Feil i passord: ".$password."<br>";
            return $password;
        }
    }
    
}
?>
