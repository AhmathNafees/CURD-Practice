<?php
    $conn = new mysqli("localhost","root","","studendb");

    if($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }

    if(isset($_POST['submit'])){
        
    }

?>