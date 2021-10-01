<?php require '../style/style.php'; ?> <!-- import style.css -->

<!-- html area start -->
<form action="insertData_function.php" method="POST" enctype="multipart/form-data"> <!-- goes to insertData.php to insert data -->
    User Name: <input type="text" name="username"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    male<input type="radio" name="gender" value="male">female<input type="radio" name="gender" value="female"><br>
    <select name="country" id="">
        <option value="">select Your country</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="China">China</option>
    </select><br>
    Picture: <input type="file" name="upload_image" value="upload"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="submit" name="submit">
</form>


<form action="dataTable.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="searchData">
    <input type="submit" value="search" name="search">
</form>
<!-- html area end -->


<!-- php area start -->
<?php
    $count = 0;
    if(isset($_REQUEST['deleted'])){
        echo "<font color='greenyellow'>Delete Successful.<br></font>";
    }else if(isset($_REQUEST['updated'])){
        echo "<font color='greenyellow'>update Successful.<br></font>";
    }else if(isset($_REQUEST['inserted'])){
        // insert come from insertData_function.php
        echo "<font color='greenyellow'>Insert Successful.<br></font>";
    }else if(isset($_REQUEST['notInserted'])){
        // insert come from insertData_function.php
        echo "<font color='red'>Insert is not Successful.<br></font>";
    }else if(isset($_REQUEST['fildEmpty'])){
        echo "<font color='red'>fild can not be empty.<br></font>";
        // fildEmpty come from insertData_function.php
    }




?>
<!-- php area end-->




<!-- table header -->
<form action="dataTable.php" method="POST">
<table class="table">
    <thead class="table_head">
        <tr>
            <th>Serial no.</th>
            <th>ID</th>
            <th>Profile</th>
            <th class="table_bigWidth">user name</th>
            <th>Gender</th>
            <th>Country</th>
            <th class="table_bigWidth">Email</th>
            <th class="table_bigWidth">Password</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</form>
<?php

// shwo data after search
if(isset($_REQUEST['search'])){
    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
    $query = "SELECT * FROM `user`";
    $request = mysqli_query($databaseConnection, $query);
    // var_dump($request);
    $countData_fromDatabase = mysqli_num_rows($request);
    if($countData_fromDatabase>1){
        $search_data = $_REQUEST['searchData'];
        $query = "SELECT * FROM `user` WHERE `username` LIKE '%$search_data%'";
        $search_request = mysqli_query($databaseConnection, $query);

        while($db_row = mysqli_fetch_assoc($search_request)){
            $account_id = $db_row['id'];
            $username = $db_row['username'];
            $gender = $db_row['gender'];
            $country = $db_row['country'];
            
            $profilePicture = $db_row['profilePicture'];
            $email = $db_row['email'];
            $password = $db_row['password'];
            $time = $db_row['submit_date'];
            $count++;
            ?>
            <form action="dataTable.php">
            <!-- shwo data after search -->
            <table class="table">
                <tbody>
                    <tr>
                        <td class="center"><?php echo $count ?></td>
                        <td class="center "><?php echo $account_id ?></td>
                        <td class="center"><img height="40px" width="40px" src="./uploads/<?php echo $profilePicture ?>" alt="img"></td>
                        <td class="table_bigWidth center"><?php echo $username ?></td>
                        <td class="center"><?php echo $gender ?></td>
                        <td class="center"><?php echo $country ?></td>
                        <td class="table_bigWidth"><?php echo $email ?></td>
                        <td class="table_bigWidth center"><?php echo $password ?></td>
                        <td><?php echo $time ?></td>
                        <td><a href="./updateForm.php?id=<?php echo $account_id; ?>">Edit</a> || <a onclick="return confirm('are you sure?\nyou want to delete?')" href="./deleteFunction.php?id=<?php echo $account_id ?>&profileImageName=<?php echo $profilePicture ?>">Delete</a></td>
                    </tr>
                </tbody>
            </table>
            </form>
            <?php
        }
    }else{
        echo "<font color='red'>you don't have data in your database.<br></font>"; 
    }



}else{
    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")


    $query = "SELECT * FROM `user`";
    $request = mysqli_query($databaseConnection, $query);
    // var_dump($request);

    $countData_fromDatabase = mysqli_num_rows($request);

    if ($request) {
        // echo 'Query successful<br>';
        

            
            if($countData_fromDatabase > 0){
            
            
        
            
            while ($row = mysqli_fetch_assoc($request)) {   // mysqli_fetch_row($request) whow data with index
                

                $account_id = $row['id'];
                $username = $row['username'];
                $gender = $row['gender'];
                $country = $row['country'];
                $profilePicture = $row['profilePicture'];
                $email = $row['email'];
                $password = $row['password'];
                $time = $row['submit_date'];
                $count++;
                ?>
                
                    <!-- show data without search -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="center"><?php echo $count ?></td>
                            <td class="center "><?php echo $account_id ?></td>
                            <td class="center"><img height="40px" width="40px" src="./uploads/<?php echo $profilePicture ?>" alt="img"></td>
                            <td class="table_bigWidth center"><?php echo $username ?></td>
                            <td class="center"><?php echo $gender ?></td>
                            <td class="center"><?php echo $country ?></td>
                            <td class="table_bigWidth"><?php echo $email ?></td>
                            <td class="table_bigWidth center"><?php echo $password ?></td>
                            <td><?php echo $time ?></td>
                            <td><a href="./updateForm.php?id=<?php echo $account_id; ?>">Edit</a> || <a onclick="return confirm('are you sure?\nyou want to delete?')" href="./deleteFunction.php?id=<?php echo $account_id ?>&profileImageName=<?php echo $profilePicture ?>">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
                
                <?php
            }
            
        }else{ 
            echo "<font color='red'>you don't have data in your database.<br></font>"; 
        }

    } else { 
        echo "<font color='red'>Query is not successful.<br></font>"; 
    }
}

?>