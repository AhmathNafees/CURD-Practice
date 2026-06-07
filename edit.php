<?php
    // 1. Database connection settings
    $servername ="localhost";
    $username= "root";
    $password="";
    $db="studentdb";

    // 2. Create Connection
    $conn = new mysqli($servername, $username, $password, $db);

    // 3. Check connection
    if($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
    }

    // 4. Get ID safely
    $id=isset($_GET['edit']) ? intval($_GET['edit']) : 0;

    // 5.Fetch Studet data
    $sql= "SELECT * FROM student WHERE id=? ";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // 6. Handle Update
    if(isset($_POST['update'])){
        $id= intval($_POST['id']);
        $name=$_POST['name'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];

        // 7. Update quary
        $update=$conn->prepare("UPDATE student SET name=?, address=?, mobile=? WHERE id=?");
        $update->bind_param("sssi", $name, $address, $mobile, $id);

        if($update->execute()){
            echo "New record created successfully! ";
            echo "<script>location.replace('regForm.php')</script>";
        }
        else{
            echo "<div class='alert alert-danger'>Error updating record.</div>"; 
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CURD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->


    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                <div class="card-header">
                    <h2>Student CRUD App</h2>
                    <h4>Edit Student</h4>
                </div>
                <div class="card-body">
                    <?php if ($student) { ?>

                    <a href="regForm.php" class=" text-light btn btn-primary">Back</a>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class=" form-control" placeholder="Enter the Name" name="name" value="<?php echo($student['name'])?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class=" form-control" placeholder="Enter the Address" name="address" value="<?php echo($student['address'])?>">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class=" form-control" placeholder="Enter the Mobile No" name="mobile" value="<?php echo($student['mobile'])?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2" name="update">Update</button>
                    </form>
                    <?php } else { ?>
                        <div class="alert alert-warning">Student not found.</div>
                    <?php } ?>

                </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php // 6. Close connection
    $conn->close();?> 