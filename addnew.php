<?php 

   $conn=new mysqli("localhost","root","","studentdb");

   if($conn->connect_error){
    die("connection faild".$conn->connect_error);
   }

   $id=isset($_GET['edit'])? intval($_GET['edit']) : 0;

   $sql="SELECT * FROM student WHERE id=?";
   $stmt=$conn->prepare($sql);
   $stmt->bind_param("i",$id);
   $stmt->execute();
   $result=$stmt->get_result();
   $student=$result->fetch_assoc();

   if(isset($_POST['update'])){
    $id=intval($_POST['id']);
    $name=$_POST['name'];
    $age=$_POST['age'];

    $update=$conn->prepare("UPDATE student SET name=? age=? WHERE id=?");
    $update->bind_param("ssi",$name, $age, $id);

    if($update->execute()){
        echo "successfully update";
        echo "<script>location.replace(regfom.php)</script>";
    }
    else{
        echo "<div class=' alert alert-danger'> ERROR </div>";
    }

   }


?>