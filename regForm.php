<?php
    $conn= new mysqli("localhost","root","","studentdb");
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }
    $sql="SELECT * FROM student";
    $result=$conn->query($sql);
    
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
                    <a href="add.php" class="btn btn-success">Add New</a>
                    <table class=" table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile No</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                                <a href="delete.php?del=$uid" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                            

                        </tbody>

                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <form action="image_upload.php" method="post" enctype="multipart/form-data" >
        <input type="file" name="image"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
// 5. Close connection
$conn->close();
?>

