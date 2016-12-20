function randomPassword(length)
{
  chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  pass = "";
  for(x=0;x<length;x++)
  {
    i = Math.floor(Math.random() * 62);
    pass += chars.charAt(i);
  }
  return pass;
}
function formSubmit()
{
  skjema.Passord.value = randomPassword(skjema.length.value);
  return false;
}


// VALIDER *************************************************
function valider_Fornavn()
{
        regEx = /^[a-zA-ZæøåÆØÅ ]{2,30}$/;
        OK = regEx.test(document.skjema.Fornavn.value);
        if(!OK)
        {
                document.getElementById("feilFornavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
                return false;
        }
        document.getElementById("feilFornavn").innerHTML="Godkjent";
        return true;
}
function valider_Etternavn()
{
        regEx = /^[a-zA-ZæøåÆØÅ ]{2,30}$/;
        OK = regEx.test(document.skjema.Etternavn.value);
        if(!OK)
        {
                document.getElementById("feilEtternavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
                return false;
        }
        document.getElementById("feilEtternavn").innerHTML="Godkjent";
        return true;
}
function valider_Brukernavn()
{
        regEx = /^[a-zA-Z ]{2,30}$/;
        OK = regEx.test(document.skjema.Brukernavn.value);
        if(!OK)
        {
                document.getElementById("feilBrukernavn").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
                return false;
        }
        document.getElementById("feilBrukernavn").innerHTML="Godkjent";
        return true;
}
function valider_Epost()
{
        regEx = /^[a-zA-Z0-9\.\_]+@[a-zA-Z0-9\.\_]+\.[a-z]{2,50}$/;
        OK = regEx.test(document.skjema.Epost.value);
        if(!OK)
        {
                document.getElementById("feilEpost").innerHTML="Feil i epost";
                return false;
        }
        document.getElementById("feilEpost").innerHTML="Godkjent";
        return true;
}
function valider_Telefonnr()
{
        regEx = /^[0-9]{8}$/;
        OK = regEx.test(document.skjema.Telefonnr.value);
        if(!OK)
        {
                document.getElementById("feilTelefonnr").innerHTML="Feil, feltet må inneholde bare 8 sifferet tall";
                return false;
        }
        document.getElementById("feilTelefonnr").innerHTML="Godkjent";
        return true;
}
function valider_Adresse()
{
        regEx = /^[a-zA-Z???0-9'.\s]{2,50}$/;
        OK = regEx.test(document.skjema.Adresse.value);
        if(!OK)
        {
                document.getElementById("feilAdresse").innerHTML="Må inneholde en gyldig adresse";
                return false;
        }
        document.getElementById("feilAdresse").innerHTML="Godkjent";
        return true;
}
function valider_Postnr()
{
        regEx = /^[0-9]{4}$/;
        OK = regEx.test(document.skjema.Postnr.value);
        if(!OK)
        {
                document.getElementById("feilPostnr").innerHTML="Feil, feltet må inneholde fire sifferet";
                return false;
        }
        document.getElementById("feilPostnr").innerHTML="Godkjent";
        return true;
}
function valider_Poststed()
{
        regEx = /^[a-zA-ZæøåÆØÅ ]{2,30}$/;
        OK = regEx.test(document.skjema.Poststed.value);
        if(!OK)
        {
                document.getElementById("feilPoststed").innerHTML="Feil, feltet må inneholde bare bokstaver fra a til å";
                return false;
        }
        document.getElementById("feilPoststed").innerHTML="Godkjent";
        return true;
}
function valider_Fodselsnr()
{
        regEx = /^[0-9]{6}$/;
        OK = regEx.test(document.skjema.Fodselsnr.value);
        if(!OK)
        {
                document.getElementById("feilFodselsnr").innerHTML="Ugyldig fødselsnr. Det må 6 sifferet. DDMMÅÅ";
                return false;
        }
        document.getElementById("feilFodselsnr").innerHTML="Godkjent";
        return true;
}
function valider_Passord()
{
        regEx = /^[a-zA-Z0-9\.]{1,50}$/i;
        OK = regEx.test(document.skjema.Passord.value);
        if(!OK)
        {
                document.getElementById("feilPassord").innerHTML="Feil i Passord";
                return false;
        }
        document.getElementById("feilPassord").innerHTML="Godkjent";
        return true;
}
function valider_alle()
{		
        FornavnOK = valider_Fornavn();
        EtternavnOK = valider_Etternavn();
        BrukernavnOK = valider_Brukernavn();
        EpostOK = valider_Epost();
        TelefonnrOK = valider_Telefonnr();
        AdresseOK = valider_Adresse();
        PostnrOK = valider_Postnr();
        FodselsnrOK = valider_Fodselsnr();
        PassordOK = valider_Passord();
        if(FornavnOK && EtternavnOK && BrukernavnOK && EpostOK && TelefonnrOK && AdresseOK && PostnrOK && FodselsnrOK && PassordOK)
        {
                return true;
        }
        return false;
}