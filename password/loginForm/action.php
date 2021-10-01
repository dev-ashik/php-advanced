<?php require '../headerFooter/header.php';



// REQUEST can get valu from get and post method

$usr =  $_REQUEST['username'];
$pass = $_REQUEST['password'];

// echo $usr, "<br>", $pass, "<br>";


echo "<a href='https://www.bing.com'>$usr</a>", "<br>";
echo "<a href='https://www.bing.com'>{$_REQUEST['username']}</a>", "<br>"; // for method we need to use "{}"






require '../headerFooter/footer.php';
