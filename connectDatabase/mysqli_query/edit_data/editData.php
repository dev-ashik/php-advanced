
<?php
    $account_id = $_REQUEST['hidden_id'];

    

    if(isset($_POST['hidden_id'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($username && $email && $password){

            
            $database_connection = mysqli_connect('localhost', 'root', '', 'advance_php');
            // mysqli_connect("localhost","my_user","my_password","my_db")
            
            if(!$database_connection){
                echo 'Not connected', mysqli_error();
            }
            
            
            $query = "UPDATE `user` SET `username`='$username',`email`='$email',`password`='$password' WHERE id = $account_id";
            $request = mysqli_query($database_connection, $query);
            
            if($request){
                // echo "update successful";
                header("location: dataTable.php?updated");
            }else{
                echo "Insert is not successful";   
            }

        }else{
            echo 'Fild can not be blank';
        }
    }
?>