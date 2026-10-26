<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách nhân sự</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; font-family: Arial; }
        th, td { border: 1px solid #333; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .center { text-align: center; }
        .right { text-align: right; }
    </style>
</head>
<body>

<h2 style="text-align: center;">DANH SÁCH CÔNG NHÂN</h2>

<?php
$xmlFile = 'bai2_nhansu.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    
    echo '<table>';
    echo '<tr>';
    echo '<th>STT</th>';
    echo '<th>Mã số</th>';
    echo '<th>Họ tên</th>';
    echo '<th>Đơn vị</th>';
    echo '<th>Lương</th>';
    echo '</tr>';
    
    $stt = 1;
    foreach ($xml->congnhan as $cn) {
        echo '<tr>';
        echo '<td class="center">' . $stt++ . '</td>';
        echo '<td class="center">' . $cn->maso . '</td>';
        echo '<td>' . $cn->hoten . '</td>';
        echo '<td>' . $cn->donvi . '</td>';
        echo '<td class="right">' . $cn->luong . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo '<p style="text-align: center; color: red;">Chưa tìm thấy file nhansu.xml! Hãy chạy file CreateCongnhan.php trước.</p>';
}
?>

</body>
</html>