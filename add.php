<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน</title>
</head>

<body>
    <h2>เพิ่มข้อมูลพนักงาน</h2>
    <form action="insert.php" method="post">
        <label for="full_name">ชื่อ-นามสกุล:</label>
        <input type="text" name="full_name" required><br>

        <label for="salary">เงินเดือน:</label>
        <input type="number" name="salary" required><br>

        <label for="start_date">วันที่เริ่มทำงาน:</label>
        <input type="date" name="start_date" required><br>

        <label for="position">ตำแหน่ง:</label>
        <input type="text" name="position" required><br>

        <label for="status">สถานะการทำงาน:</label>
        <select name="status" required>
            <option value="ทำงาน">ทำงาน</option>
            <option value="ลาออก">ลาออก</option>
        </select><br>

        <input type="submit" value="เพิ่มข้อมูล">
    </form>

    <br>
    <a href="index.php">กลับสู่หน้ารายการพนักงาน</a>
</body>

</html>