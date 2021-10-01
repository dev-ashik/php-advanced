<?php require '../../../style/style.php'; ?> <!-- import style.css -->

<?php


    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
    $query = "SELECT * FROM `user`";
    $request = mysqli_query($databaseConnection, $query);

    $countData_fromDatabase = mysqli_num_rows($request);

    

    if ($request) {
        // echo 'Query successful<br>';
        if($countData_fromDatabase > 0){

            // var_dump($request);

            if(isset($_REQUEST['deleted'])){
                echo "<font color='greenyellow'>Delete Successful.</font>";
            }


            ?>
            <!-- table header -->
            <form action="" method="POST">
            <table class="table">
                <thead class="table_head">
                    <tr>
                        <th class="center">ID</th>
                        <th class="center">Photo</th>
                        <th class="center table_bigWidth">user name</th>
                        <th class="table_email table_bigWidth">Email</th>
                        <th class="center table_bigWidth">Password</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            
            <?php

            while ($row = mysqli_fetch_assoc($request)) {   // mysqli_fetch_row($request) whow data with index
                

                $account_id = $row['id'];
                $profilePicture_name = $row['profilePicture'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $time = $row['submit_date'];

                ?>
                
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="center"><?php echo $account_id ?></td>
                            <td class="center"><img height="30px" width="30px" src="../../../profile_info/uploads/<?php echo $profilePicture_name ?>" alt=""></td>
                            <td class="center table_bigWidth"><?php echo $username ?></td>
                            <td class="table_email table_bigWidth"><?php echo $email ?></td>
                            <td class="center table_bigWidth"><?php echo $password ?></td>
                            <td><?php echo $time ?></td>
                            <td><a href="./deleteFunction.php?id=<?php echo $account_id ?> & profilePictureName=<?php echo $profilePicture_name ?>">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
                </form>
                <?php
            }

        }else{ 
            echo "<font color='red'>you don't have data in your database.</font>"; 
        }

    } else { 
        echo "<font color='red'>Query is not successful</font>"; 
    }

?>