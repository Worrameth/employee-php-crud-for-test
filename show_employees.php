<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>รหัสพนักงาน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>เงินเดือน</th>
                <th>วันที่เริ่มทำงาน</th>
                <th>ตำแหน่ง</th>
                <th>สถานะการทำงาน</th>
                <th>การจัดการ</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $status_color = ($row["status"] == "ทำงาน") ? "green" : "red";

        echo "<tr>
                <td>{$row["employee_id"]}</td>
                <td>{$row["full_name"]}</td>
                <td>{$row["salary"]}</td>
                <td>{$row["start_date"]}</td>
                <td>{$row["position"]}</td>
                <td style='color: $status_color;'>{$row["status"]}</td>
                <td>
                    <a href='edit.php?id={$row["employee_id"]}'>แก้ไข</a>
                    <a href='delete.php?id={$row["employee_id"]}'>ลบ</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "ไม่พบข้อมูลพนักงาน";
}

$conn->close();
?>