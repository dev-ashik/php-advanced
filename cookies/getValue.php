<?php

    
    if(isset($_COOKIE['user'])){  // to catch cookie data use $_COOKIE['']
        echo "set Cookies {$_COOKIE['user']}";
    }else{
        echo "Cookies is empty!";
    }

?>