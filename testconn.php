<?php
    $conn=new mysqli("localhost","root","","studentDb");

    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }

    $sql="SELECT * FROM student";
    $result= $conn->query($sql);
    
    $count=1;
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $uid=$row['id'];
            $name=$row['name'];
            $address=$row['address'];
            $mobile=$row['mobile'];
        
            echo <<<Row
            <tr>
                <td>$count</td>
                <td>$name</td>
                <td>$address</td>
                <td>$mobile</td>

                <td>
                    <a href="edit.php?edit=$uid" class="btn btn-success">Edit</a>
                    <a href="delete.php?del=$uid" class="btn btn-danger">Delete</a>
                </td>
                
            </tr>
            Row;
            $count++;

        }
    }
    else{
        echo"Data Not found";
    }
                            
?>
































<?php 

    $conn=new mysqli("localhost","root","","Studentdb");

    if($conn->connect_error){
        die("connection faild".$conn->connect_error);
    }

    $sql="SELECT * FROM student";
    $result=$conn->query($sql);

    $count=1;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $uid=$row['id'];
            $name=$row['name'];
            $age=$row['age'];

            echo <<<Row
            <tr>
                <td>$count</td>
                <td>$name</td>
                <td>$age</td>

                <td>
                    <a href="edit.php?$uid" class=" btn btn-check">Edit</a>
                </td>
            </tr>
            Row;
            $count++;

        }

    }else{
        echo "Data Not Found";
    }

?>

