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

    $sql = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // แสดงแบบฟอร์มแก้ไขข้อมูล
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>แก้ไขข้อมูลพนักงาน</title>
        </head>

        <body>
            <h2>แก้ไขข้อมูลพนักงาน</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">

                <label for="full_name">ชื่อ-นามสกุล:</label>
                <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" required><br>

                <label for="salary">เงินเดือน:</label>
                <input type="number" name="salary" value="<?php echo $row['salary']; ?>" required><br>

                <label for="start_date">วันที่เริ่มทำงาน:</label>
                <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" required><br>

                <label for="position">ตำแหน่ง:</label>
                <input type="text" name="position" value="<?php echo $row['position']; ?>" required><br>

                <label for="status">สถานะการทำงาน:</label>
                <select name="status" required>
                    <option value="ทำงาน" <?php echo ($row['status'] == 'ทำงาน') ? 'selected' : ''; ?>>ทำงาน</option>
                    <option value="ลาออก" <?php echo ($row['status'] == 'ลาออก') ? 'selected' : ''; ?>>ลาออก</option>
                </select><br>

                <input type="submit" value="บันทึกการแก้ไข">
            </form>

            <br>
            <a href="index.php">กลับสู่หน้ารายการพนักงาน</a>
        </body>

        </html>
        <?php
    } else {
        echo "ไม่พบข้อมูลพนักงาน";
    }
} else {
    echo "ข้อมูลไม่ถูกต้อง";
}

$conn->close();
?>