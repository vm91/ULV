<?php


$bil = new bil();
$bil->høyde = 100;
$bil->tyngde = 100;

$bil2 = new bil();
$bil->høyde = 200;
$bil->tyngde = 200;

class bil 
{
    public $høyde;
    public $bredde;
    public $tyngde;
    public $toppfart;
    
    function bensinforbruk(){
        return $this->tyngde * 100;
    }
}
?>
