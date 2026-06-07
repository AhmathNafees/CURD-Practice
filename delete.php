<?php
// 1. Database connection settings
$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "studentdb";

// 2. Create Connection
$conn = new mysqli($servername, $username, $password, $db);

// 3. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Get ID safely from URL
$id = isset($_GET['del']) ? intval($_GET['del']) : 0;
echo ("This is ID".$id);

// 5. Delete student record
if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Record deleted successfully!</div>";
        echo "<script>location.replace('regForm.php')</script>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting record.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Invalid ID.</div>";
}

// 6. Close connection
$conn->close();
?>
