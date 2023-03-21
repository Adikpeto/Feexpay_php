<?php
include "../src/Feexpay.php";
use Adikpeto\Feexpay;
$NewEcho = new Adikpeto\Feexpay\Feexpay("63e586c1fe4c35f54de9749c",2,"","","");
$responseGetId = $NewEcho->getIdAndMarchanName();
var_dump($responseGetId);


