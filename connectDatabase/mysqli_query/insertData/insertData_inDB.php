
<form action="insertData.php" method="POST">
    User Name: <input type="text" name="username"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="submit" name="submit">
</form>


<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($username && $email && $password){

            
            $database_connection = mysqli_connect('localhost', 'root', '', 'advance_php');
            // mysqli_connect("localhost","my_user","my_password","my_db")
            // var_dump($database_connection);
            
            if(!$database_connection){
                echo 'Not connected', mysqli_error();
            }
            
            
            $query = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
            $request = mysqli_query($database_connection, $query);
            
            if($request){
                echo "Insert successful";
            }else{
                echo "Insert is not successful";
                
            }
        }else{
            echo 'Fild can not be blank';
        }
    }
?>