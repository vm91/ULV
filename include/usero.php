<?php 
class bruker
{
	private $fornavn;
	private $etternavn;
        private $brukernavn;
        private $epost;
        private $telefonnr;
	private $adresse;
	private $postnr;	
	private $fodselsnr;	
	private $passord;	
	
	public function set_fornavn($fornavn)
	{
		$this->fornavn= $fornavn;
	}
	public function get_fornavn()
	{
		return $this-> fornavn;
	}
	function valider_Fornavn($fornavn)
	{
		return preg_match("/^[a-�A-�][a-�A-�.]{2,30}$/", $_REQUEST["Fornavn"]);
	}
	public function set_etternavn($etternavn)
	{
		$this->etternavn= $etternavn;
	}
	public function get_etternavn()
	{
		return $this-> etternavn;
	}
	function valider_Etternavn($etternavn)
	{
		return preg_match("/^[a-�A-�][a-�A-�.]{0,30}$/", $_REQUEST["Etternavn"]);
	}
    public function set_brukernavn($brukernavn)
	{
		$this->brukernavn= $brukernavn;
	}
	public function get_brukernavn()
	{
		return $this-> brukernavn;
	}
	function valider_Brukernavn($brukernavn)
	{
		return preg_match("/^[a-�A-�][a-�A-�.]{2,30}$/", $_REQUEST["Brukernavn"]);
	}
	public function set_epost($epost)
	{
		$this->epost= $epost;
	}
	public function get_epost()
	{
		return $this-> epost;
	}
	function valider_Epost($epost)
	{
		return preg_match("/^[a-�A-�0-9]+@[a-�A-�.]{2,50}$/", $_REQUEST["Epost"]);
	}
    public function set_telefonnr($telefonnr)
	{
		$this->telefonnr= $telefonnr;
	}
	public function get_telefonnr()
	{
		return $this-> telefonnr;
	}	
	function valider_Telefonnr($telefonnr)
	{
		return preg_match("/^[0-9]{8}$/", $_REQUEST["Telefonnr"]);
	}
	public function set_Adresse($adresse)
	{
		$this->adresse= $adresse;
	}
	public function get_adresse()
	{
		return $this-> adresse;
	}
	function valider_Adresse($adresse)
	{
		return preg_match("/^[a-�A-�][a-�A-�.][0-9]{2,50}$/", $_REQUEST["Adresse"]);
	}
    public function set_postnr($postnr)
	{
		$this->postnr= $postnr;
	}
	public function get_postnr()
	{
		return $this-> postnr;
	}	
	function valider_Postnr($postnr)
	{
		return preg_match("/^[0-9]{4}$/", $_REQUEST["Postnr"]);
	}	
        public function set_fodselsnr($fodselsnr)
	{
		$this->fodselsnr= $fodselsnr;
	}
	public function get_fodselsnr()
	{
		return $this-> fodselsnr;
	}		
	function valider_Fodselsnr($fodselsnr)
	{
		return preg_match("/^[0-9]{6}$/", $_REQUEST["Fodselsnr"]);
	}
		public function set_passord($passord)
	{
		$this->passord= $passord;
	}
	public function get_passord()
	{
		return $this-> passord;
	}	
	function valider_Passord($passord)
	{
		return preg_match("/^[a-�A-�][a-�A-�.][0-9]{1,50}$/", $_REQUEST["Passord"]);
	}
 	public function delt_db()
    {
        $fornavn=$this->fornavn;
        $etternavn=$this->etternavn;
        $brukernavn=$this->brukernavn;
        $epost=$this->epost;
        $telefonnr=$this->telefonnr;
        $adresse=$this->adresse;
        $postnr=$this->postnr;
        $fodselsnr=$this->fodselsnr;
        $passord=$this->passord;
        $pwd = hash('sha256', $passord);
        include 'db_connect.php';
        $sql = "Insert into bruker (Fornavn,Etternavn,Brukernavn,Epost,Telefonnr,Adresse,Postnr,Fodselsnr,Passord)";
        $sql.= "Values ('$fornavn','$etternavn','$brukernavn','$epost','$telefonnr','$adresse','$postnr','$fodselsnr', '$pwd')";
        $resultat = mysql_query($sql);
        if(!$resultat)
        {
            trigger_error(mysql_error());
            return "Feil , kunne ikke sette inn i databasen. Kontakt Admin";
        }
        elseif(mysql_affected_rows ()==0)
        {
            trigger_error("Insert return 0 rows");
            return "Feil, kunne ikke sette inn i databasen. Kontakt Admin";
        }
    }

}
if(isset ($_REQUEST["valider"]))
{	
	$person = new bruker();
	if($person-> valider_Fornavn($_REQUEST["Fornavn"]))
	{
	$person->set_fornavn($_REQUEST["Fornavn"]);
	}
	else
	{
	echo "Feil fornavn";
	}
	if($person-> valider_Etternavn($_REQUEST["Etternavn"]))
	{
	$person->set_etternavn($_REQUEST["Etternavn"]);
	}
	else
	{
	echo "Feil etternavn";
	}
	if($person-> valider_Brukernavn($_REQUEST["Brukernavn"]))
	{
	$person->set_brukernavn($_REQUEST["Brukernavn"]);
	}
	else
	{
	echo "Feil brukernavn";
	}
	if($person-> valider_Epost($_REQUEST["Epost"]))
	{
	$person->set_epost($_REQUEST["Epost"]);
	}
	else
	{
	echo "Feil epost";
	}
    if($person-> valider_Telefonnr($_REQUEST["Telefonnr"]))
	{
	$person->set_telefonnr($_REQUEST["Telefonnr"]);
	}
	else
	{
	echo "Feil telefonnr";
	}
	if($person-> valider_Adresse($_REQUEST["Adresse"]))
	{
	$person->set_adresse($_REQUEST["Adresse"]);
	}
	else
	{
	echo "Feil Adresse";
	}
	if($person-> valider_Postnr($_REQUEST["Postnr"]))
	{
	$person->set_postnr($_REQUEST["Postnr"]);
	}
	else
	{
	echo "Feil postnr";
	}
	if($person-> valider_Fodselsnr($_REQUEST["Fodselsnr"]))
	{
	$person->set_fodselsnr($_REQUEST["Fodselsnr"]);
	}
	else
	{
	echo "Feil poststed";
	}
	if($person-> valider_Passord($_REQUEST["Passord"]))
	{
	$person->set_passord($_REQUEST["Passord"]);
	}
	else
	{
	echo "Feil passord";
	}
}
?>