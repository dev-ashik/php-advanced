<?php require '../../headerFooter/header.php';


$usr =  $_REQUEST['username'];
$usrPass = $_REQUEST['password'];


$hash_format = "$2y$07$"; // "$2y$time$"
$salt = "sadfjlakafaldjsdklff22"; // do not use ";". Error "*0"
$conC = $hash_format . $salt;

echo $usrPass;
echo "<br/>";
echo crypt($usrPass, $conC);


require '../../headerFooter/footer.php';
