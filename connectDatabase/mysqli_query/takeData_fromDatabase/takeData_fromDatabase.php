<form action="takeData.php" method="POST">
    <input type="submit" value="Show Data" name="showData">
</form>


<?php
if (isset($_REQUEST['showData'])) {

    $databaseConnection = mysqli_connect('localhost', 'root', '', 'advance_php');
    // mysqli_connect("localhost","my_user","my_password","my_db")
    $query = "SELECT * FROM `user`";
    $request = mysqli_query($databaseConnection, $query);

    $countData_fromDatabase = mysqli_num_rows($request);

    if ($request) {
        echo 'Query successful<br>';
        if($countData_fromDatabase > 0){

            // var_dump($request);
            while ($row = mysqli_fetch_assoc($request)) {   // mysqli_fetch_row($request) whow data with index
                // echo "<pre>";
                // print_r($row);
                // echo "<br>";
                // echo "</pre>";

                echo $row['id']," ", $row['username']," ", $row['email']," ", $row['password']," ", $row['submit_date'];
                echo "<br>";
            }

        }else{ 
            echo "you don't have data in your database."; 
        }

    } else { 
        echo 'Query is not successful';
    }
}

?>