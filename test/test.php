<?php
include "../src/Feexpay.php";
use Adikpeto\Feexpay;
$NewEcho = new Adikpeto\Feexpay\Feexpay("63e586c1fe4c35f54de9749c","fp_M6tuzYgsYl39d6kJvdaLmYGQcEAdzGmk0txgEWvLRivVhbeK4UCwbDiyMlj9UPMO","","");
// $responseGetId = $NewEcho->paiementLocal(1,"22990877433","MTN","Adikpeto Aristide","adikpetoaristidezeus@gmail.com");

// $status = $NewEcho->getPaiementStatus($responseGetId);

// var_dump($status);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Site for use FeexPay


    <div id="render"><?php $NewEcho->init(100) ?></div>
    
</body>
</html>


