<?php
    $userName = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $passLen = strlen($password);
    if($passLen>=8 && $passLen <=16){
        echo "perfect";
    }else{
        header("location: ./form.php?wrongPassword=password is not sequere");
    }

?>