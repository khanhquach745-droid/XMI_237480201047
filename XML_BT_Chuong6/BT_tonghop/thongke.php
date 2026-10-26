<?php
$xmlFile = 'qlsv.xml';
$totalStudents = 0;
$cityStats = [];

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    $totalStudents = count($xml->student);
    foreach ($xml->student as $s) {
        $city = trim($s->city);
        if (!empty($city)) {
            if (!isset($cityStats[$city])) {
                $cityStats[$city] = 0;
            }
            $cityStats[$city]++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thống kê sinh viên</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        ul { line-height: 1.8; }
    </style>
</head>
<body>
    <a href="trangchu.php">&larr; Quay lại trang chủ</a>
    <h3>Thống kê danh sách sinh viên</h3>
    <p><b>Tổng số sinh viên:</b> <?php echo $totalStudents; ?></p>
    
    <h4>Thống kê theo Thành phố:</h4>
    <ul>
        <?php
        if (count($cityStats) > 0) {
            foreach ($cityStats as $city => $count) {
                echo "<li><b>{$city}:</b> {$count} sinh viên</li>";
            }
        } else {
            echo "<li>Chưa có dữ liệu thống kê.</li>";
        }
        ?>
    </ul>
</body>
</html>