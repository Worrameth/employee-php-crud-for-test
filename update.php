<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST["employee_id"];
    $full_name = $_POST["full_name"];
    $salary = $_POST["salary"];
    $start_date = $_POST["start_date"];
    $position = $_POST["position"];
    $status = $_POST["status"];

    $sql = "UPDATE employees SET 
            full_name = '$full_name',
            salary = '$salary',
            start_date = '$start_date',
            position = '$position',
            status = '$status'
            WHERE employee_id = '$employee_id'";

    if ($conn->query($sql) === TRUE) {
        echo "บันทึกการแก้ไขข้อมูลพนักงานสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ข้อมูลไม่ถูกต้อง";
}
header("location: http://localhost/test/index.php");

$conn->close();
?>