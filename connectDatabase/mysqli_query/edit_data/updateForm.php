
<?php
    if(isset($_REQUEST['id'])){
        $account_id = $_REQUEST['id'];

        $db_connection = mysqli_connect('localhost', 'root', '', 'advance_php');
        $query = "SELECT `username`, `email`, `password` FROM `user` WHERE id = $account_id";
        $request = mysqli_query($db_connection, $query);

        while($db_Row = mysqli_fetch_assoc($request)){

            $username = $db_Row['username'];
            $email = $db_Row['email'];
            $password = $db_Row['password'];
        }
    }    

?>

<form action="editData.php" method="POST">
    <input type="hidden" value="<?php echo $account_id ?>" name="hidden_id">
    User Name: <input type="text" value="<?php echo $username ?>" name="username"><br>
    Email: <input type="text" value="<?php echo $email ?>" name="email"><br>
    Password: <input type="password"value="<?php echo $password ?>" name="password"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="update" name="submit">
</form>
