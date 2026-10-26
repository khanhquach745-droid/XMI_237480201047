<?php
$xmlFile = 'qlsv.xml';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetId = trim($_POST['id']);
    $newName = trim($_POST['name']);

    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->load($xmlFile);

    $updated = false;
    foreach ($dom->getElementsByTagName('student') as $student) {
        $idNode = $student->getElementsByTagName('id')->item(0);
        if ($idNode && trim($idNode->nodeValue) == $targetId) {
            $nameNode = $student->getElementsByTagName('name')->item(0);
            if ($nameNode) {
                $nameNode->nodeValue = $newName;
                $updated = true;
                break;
            }
        }
    }

    if ($updated) {
        $dom->save($xmlFile);
        $message = "Cập nhật thành công cho sinh viên ID: $targetId!";
    } else {
        $message = "Không tìm thấy sinh viên có ID: $targetId!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật sinh viên</title>
    <style>body { font-family: Arial; margin: 30px; }</style>
</head>
<body>
    <a href="trangchu.php">&larr; Quay lại trang chủ</a>
    <h3>Cập nhật thông tin sinh viên</h3>
    <p style="color: blue;"><?php echo $message; ?></p>
    <form method="POST">
        Nhập ID sinh viên cần sửa: <br><input type="text" name="id" required><br><br>
        Họ tên mới: <br><input type="text" name="name" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>