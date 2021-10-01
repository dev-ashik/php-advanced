<?php

    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
   
    $account_id = $_REQUEST['id'];
    $account_profilePicture_name = $_REQUEST['profileImageName'];
    
   
    $query = "DELETE FROM `user` WHERE id=$account_id";
    $request = mysqli_query($databaseConnection, $query);

    // $countData_fromDatabase = mysqli_num_rows($request);

    if ($request) {
        // delete file from host
        // to delete at first we need permition  "properties >> Sequrity >> Edit >> all check >> apply >> ok"
        unlink("uploads/$account_profilePicture_name");

        header("location: dataTable.php?deleted");
    }else{
        echo 'Query is not successful.<br>';
    }
