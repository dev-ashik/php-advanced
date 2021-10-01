<?php require '../headerFooter/header.php'; ?>



<!-- post method start-->
<!-- post methot do not show evey data in the link bar -->

<form action="./action.php" method="post">
    <input type="text" name="username" placeholder='username'><br>
    <input type="password" name="password" placeholder='password'><br>
    <input type="submit" value='Submit'>
</form>

<!-- post method end-->


<!-- get method start-->
<!-- get methot show evey data in the link bar -->
<!-- 
<form action="./home.php" method="get">
    <input type="text" name="username" placeholder='user name'><br>
    <input type="password" name="password" placeholder='password'><br>
    <input type="submit" value='Submit'>
</form> -->

<!-- get method end-->


<?php require '../headerFooter/footer.php'; ?>