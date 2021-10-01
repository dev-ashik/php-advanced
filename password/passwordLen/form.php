<form action="./show.php" method="post">
    <input type="text" name="username" placeholder='username'><br>
    <input type="password" name="password" placeholder='password'><br>
    <input type="submit" value='Submit'>
</form>

<?php
    if(isset($_REQUEST['wrongPassword'])){
        echo $_REQUEST['wrongPassword'];
    }
?>