<?php
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$results = [];

if ($keyword !== '' && file_exists('qlsv.xml')) {
    $xml = simplexml_load_file('qlsv.xml');
    foreach ($xml->student as $s) {
        // Tìm kiếm theo tên hoặc ID
        if (stripos($s->name, $keyword) !== false || stripos($s->id, $keyword) !== false) {
            $results[] = $s;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm sinh viên</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table { border-collapse: collapse; width: 70%; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
    </style>
</head>
<body>
    <a href="trangchu.php">&larr; Quay lại trang chủ</a>
    <h3>Tìm kiếm thông tin sinh viên</h3>
    <form method="GET">
        <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Nhập tên hoặc ID...">
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php if ($keyword !== ''): ?>
        <h4>Kết quả tìm kiếm cho từ khóa: "<?php echo htmlspecialchars($keyword); ?>"</h4>
        <table>
            <tr>
                <th>ID</th><th>Họ tên</th><th>Ngày sinh</th><th>Thành phố</th>
            </tr>
            <?php
            if (count($results) > 0) {
                foreach ($results as $s) {
                    echo "<tr>";
                    echo "<td>{$s->id}</td>";
                    echo "<td>{$s->name}</td>";
                    echo "<td>{$s->date}</td>";
                    echo "<td>{$s->city}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align: center;'>Không tìm thấy kết quả phù hợp.</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>