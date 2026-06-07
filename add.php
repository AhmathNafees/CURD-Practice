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

    // 4. Handle form submission
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];

        // 5. Insert into table (make sure you created a table called 'users')
        $sql="INSERT INTO student(name,address,mobile) VALUES('$name','$address','$mobile')";
        if($conn->query($sql)===TRUE){
            echo "New record created successfully! ";
            echo "<script>location.replace('regForm.php')</script>";
        }
        else{
            echo"Error".$sql."</br>".$conn->error;
        }
    }
    // 6. Close connection
    $conn->close();

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
                </div>
                <div class="card-body">
                    <button class=" btn btn-primary">
                        <a href="regForm.php" class=" text-light">Back</a>
                    </button>
                    <form action="add.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class=" form-control" placeholder="Enter the Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class=" form-control" placeholder="Enter the Address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" class=" form-control" placeholder="Enter the Mobile No" name="mobile">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2" name="submit">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>