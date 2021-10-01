
<?php

    $file = $_FILES['profile'];
    // var_dump($file);
    $name = $file['name'];

    $type = $file['type'];
    $tmp_name = $file['tmp_name'];
    $size = $file['size'];
    floor($size/1000). "KB";

    $target_dir = "uploads/";
    if(!empty($name)){
        
        
        if(move_uploaded_file($tmp_name, $target_dir.$name)){
            echo "File upload successfull.";
            $path = $target_dir.$name;
            echo "<img src='$path' height='200px' width='150px' alt='img'>";
        }else{
            echo "File upload failed.";
        }
        // echo $loc;
    }else{
        echo "File not found.";
    }
?>
