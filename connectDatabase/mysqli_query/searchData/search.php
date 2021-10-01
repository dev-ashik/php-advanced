<?php require '../../../style/style.php'; ?> <!-- import style.css -->

<form action="search.php" method="post">
    <input type="text" name="searchData">
    <input type="submit" name="search" value="search">
</form>

<?php

    if(isset($_REQUEST['search'])){
        
        $search_data = $_REQUEST['searchData'];

        $db_connect = mysqli_connect('localhost', 'root', '', 'advance_php');
        $query = "SELECT * FROM `user` WHERE `username` LIKE '%$search_data%'";
        $db_request = mysqli_query($db_connect, $query);

        ?>
            <!-- table header -->
            <table class="table">
                <thead class="table_head">
                    <tr>
                        <th class="center">Serial No.</th>
                        <th class="center">ID</th>
                        <th class="center">Photo</th>
                        <th class="center table_bigWidth">user name</th>
                        <th class="table_email table_bigWidth">Email</th>
                        <th class="center table_bigWidth">Password</th>
                        <th>Time</th>
                    </tr>
                </thead>
            </table>

            <?php

        $serialNo = 0;
        while($dataRow = mysqli_fetch_assoc($db_request)){
            $serialNo++;
            $db_id = $dataRow['id'];
            $db_profilePictureName = $dataRow['profilePicture'];
            $db_username = $dataRow['username'];
            $db_email = $dataRow['email'];
            $db_password = $dataRow['password'];
            $db_uploadTime = $dataRow['submit_date'];

            ?>
            <table class="table">
                    <tbody>
                        <tr>
                            <td class="center"><?php echo $serialNo ?></td>
                            <td class="center"><?php echo $db_id ?></td>
                            <td class="center"><img height="30px" width="30px" src="../../../profile_info/uploads/<?php echo $db_profilePictureName ?>" alt="pic"></td>
                            <td class="center table_bigWidth"><?php echo $db_username ?></td>
                            <td class="table_email table_bigWidth"><?php echo $db_email ?></td>
                            <td class="center table_bigWidth"><?php echo $db_password ?></td>
                            <td><?php echo $db_uploadTime ?></td>
                        </tr>
                    </tbody>
                </table>

            
            <?php

        }

    }


?>


