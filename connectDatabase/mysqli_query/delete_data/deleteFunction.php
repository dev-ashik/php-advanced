<?php

    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
   
    $account_id = $_REQUEST['id'];
    echo $receive_profilePictureName = $_REQUEST['profilePictureName'];

    
   
    $query = "DELETE FROM `user` WHERE id=$account_id";
    $request = mysqli_query($databaseConnection, $query);

    // $countData_fromDatabase = mysqli_num_rows($request);

    if ($request) {
        // to delete phot from folder using "unlink()" funcion
        unlink("../../../profile_info/uploads/$receive_profilePictureName");

        header("location: dataTable.php?deleted");
    }else{
        echo 'Query is not successful.<br>';
    }

?>