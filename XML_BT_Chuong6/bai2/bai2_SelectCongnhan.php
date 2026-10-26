<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm nhân viên</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        .card { width: 350px; border: 1px solid #ccc; padding: 15px; border-radius: 5px; box-shadow: 2px 2px 5px #eee; }
    </style>
</head>
<body>

<h2>THÔNG TIN NHÂN VIÊN (Mã số: 003)</h2>

<?php
$xmlFile = 'bai2_nhansu.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    $found = false;

    // Tìm kiếm nhân viên có maso == '003'[cite: 3]
    foreach ($xml->congnhan as $cn) {
        if (trim($cn->maso) == '003') {
            $found = true;
            echo '<div class="card">';
            echo '<p><b>Mã số:</b> ' . $cn->maso . '</p>';
            echo '<p><b>Họ tên:</b> ' . $cn->hoten . '</p>';
            echo '<p><b>Đơn vị:</b> ' . $cn->donvi . '</p>';
            echo '<p><b>Lương:</b> ' . $cn->luong . '</p>';
            echo '</div>';
            break;
        }
    }

    if (!$found) {
        echo '<p style="color: red;">Không tìm thấy nhân viên có mã số 003!</p>';
    }
} else {
    echo '<p style="color: red;">Không tìm thấy file nhansu.xml!</p>';
}
?>

</body>
</html>