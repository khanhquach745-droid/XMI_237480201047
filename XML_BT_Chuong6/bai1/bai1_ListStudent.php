<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        td.center, th.center {
            text-align: center;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">DANH SÁCH SINH VIÊN</h2>

<?php
// Đường dẫn tới file XML
$xmlFile = 'bai1_sinhvien.xml';

if (file_exists($xmlFile)) {
    // Đọc file XML bằng SimpleXML
    $xml = simplexml_load_file($xmlFile);
    
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="center">STT</th>';
    echo '<th class="center">ID</th>';
    echo '<th>Họ và tên</th>';       // Nếu làm đúng tên cột trong hình 2 thì thay thành: <th>Tên môn học</th>
    echo '<th>Ngày sinh</th>';        // Nếu làm đúng tên cột trong hình 2 thì thay thành: <th>Nhà xuất bản</th>
    echo '<th>Nơi sinh</th>';         // Nếu làm đúng tên cột trong hình 2 thì thay thành: <th>Tác giả</th>
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    $stt = 1;
    // Duyệt qua từng sinh viên trong XML
    foreach ($xml->student as $student) {
        echo '<tr>';
        echo '<td class="center">' . $stt++ . '</td>';
        echo '<td class="center">' . htmlspecialchars(trim($student->id)) . '</td>';
        echo '<td>' . htmlspecialchars(trim($student->name)) . '</td>';
        echo '<td>' . htmlspecialchars(trim($student->date)) . '</td>';
        echo '<td>' . htmlspecialchars(trim($student->city)) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p style="text-align: center; color: red;">Không tìm thấy tập tin sinhvien.xml!</p>';
}
?>

</body>
</html>