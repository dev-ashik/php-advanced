<?php

    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
   
    echo $account_id = $_REQUEST['id'];
    
   
    $query = "DELETE FROM `user` WHERE id=$account_id";
    $request = mysqli_query($databaseConnection, $query);

    // $countData_fromDatabase = mysqli_num_rows($request);

    if ($request) {
        header("location: dataTable.php?deleted");
    }else{
        echo 'Query is not successful.<br>';
    }

?>