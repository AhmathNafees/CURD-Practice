<?php

    //1.connection
    $conn=new mysqli("localhost","root","","studentdb");

    //2.check connection
    if($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }

    //3. handel form
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $mobile= $_POST['mobile'];

        //4. SQL connection
        $sql="INSERT INTO student(name,address,mobile)VALUES('$name','$address','$mobile')";

        if($conn->query($sql)===TRUE){
            echo"data inserted";
        }
        else{
            echo "Error".$sql."</br>".$conn->error;
        }
    }

    //5.close connection
    $conn->close(); 

?>
