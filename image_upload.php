<?php
    $conn = new mysqli("localhost","root","","studendb");

    if($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }

    if(isset($_POST['submit'])){
        $file_name = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        $folder = 'images/'.$file_name;

        $query = mysqli_query($conn, "INSERT INTO image (file) VALUES ('$file_name')");

        if(move_uploaded_file($tempName, $folder)){
            echo "<h2>File Uploaded Successfully</h2>";
        }
        else{
            echo "<h2>File Not Uploaded</h2>";
        }
    }

?>