<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    $sql = "DELETE FROM employees WHERE employee_id = '$employee_id'";

    if ($conn->query($sql) === TRUE) {
        echo "ลบข้อมูลพนักงานสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ข้อมูลไม่ถูกต้อง";
}
header("location: http://localhost/test/index.php");

$conn->close();
?>