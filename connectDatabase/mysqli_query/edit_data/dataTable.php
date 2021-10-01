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
            }else if(isset($_REQUEST['updated'])){
                echo "<font color='greenyellow'>update Successful.</font>";
            }
            ?>
            <!-- table header -->
            <table class="table">
                <thead class="table_head">
                    <tr>
                        <th class="table_count"></th>
                        <th class="table_id">ID</th>
                        <th>user name</th>
                        <th class="table_email">Email</th>
                        <th>Password</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <?php
            $count = 0;
            while ($row = mysqli_fetch_assoc($request)) {   // mysqli_fetch_row($request) whow data with index
                

                $account_id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $time = $row['submit_date'];
                $count++;
                ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="table_count"><?php echo $count ?></td>
                            <td class="table_id"><?php echo $account_id ?></td>
                            <td><?php echo $username ?></td>
                            <td class="table_email"><?php echo $email ?></td>
                            <td><?php echo $password ?></td>
                            <td><?php echo $time ?></td>
                            <td><a href="./updateForm.php?id=<?php echo $account_id; ?>">Edit</a> || <a href="./deleteFunction.php?id=<?php echo $account_id ?>">Delete</a></td>
                        </tr>
                    </tbody>
                </table>

                <?php
            }

        }else{ 
            echo "<font color='red'>you don't have data in your database.</font>"; 
        }

    } else { 
        echo "<font color='red'>Query is not successful</font>"; 
    }

?>