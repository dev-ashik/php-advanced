
<?php
    

    if(isset($_REQUEST['submit'])){
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $gender = $_REQUEST['gender'];
        $country = $_REQUEST['country'];

        // upload image
        $rec_file = $_FILES['upload_image'];
        // var_dump($rec_file);
        $imageName = $rec_file['name'];
        $image_tmp_name = $rec_file['tmp_name'];


        if(!empty($imageName)){
            $name_changer = uniqid().".png";
            $target_dir = "./uploads/";
            $imageUp = move_uploaded_file($image_tmp_name, $target_dir.$name_changer );
        }else{
            echo "your file is empty";
        }
        
        if($username && $email && $password & $imageName){

        
            $db_connection = mysqli_connect('localhost', 'root', '', 'advance_php');
            // mysqli_connect("localhost","my_user","my_password","my_db")

            $query = "INSERT INTO `user`(`profilePicture`, `username`, `email`, `password`, `gender`, `country`) VALUES ('$name_changer', '$username','$email','$password', '$gender', '$country')";
            $request = mysqli_query($db_connection, $query);

            if(isset($request)){
                header("location: dataTable.php?inserted");
            }else{
                header("location: dataTable.php?notInserted");
            }
        }else{
            header("location: dataTable.php?fildEmpty");
        }
    }


?>