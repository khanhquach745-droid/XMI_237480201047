<?php
$xmlFile = 'qlsv.xml';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $city = trim($_POST['city']);

    if (!empty($id) && !empty($name)) {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->load($xmlFile);

        $students = $dom->getElementsByTagName('students')->item(0);

        $student = $dom->createElement('student');
        $student->appendChild($dom->createElement('id', $id));
        $student->appendChild($dom->createElement('name', $name));
        $student->appendChild($dom->createElement('date', $date));
        $student->appendChild($dom->createElement('city', $city));

        $students->appendChild($student);
        $dom->save($xmlFile);
        $message = "Thêm sinh viên thành công!";
    } else {
        $message = "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>body { font-family: Arial; margin: 30px; } form { width: 300px; }</style>
</head>
<body>
    <a href="trangchu.php">&larr; Quay lại trang chủ</a>
    <h3>Thêm sinh viên mới</h3>
    <p style="color: green;"><?php echo $message; ?></p>
    <form method="POST">
        ID: <br><input type="text" name="id" required><br><br>
        Họ tên: <br><input type="text" name="name" required><br><br>
        Ngày sinh (dd-mm-yyyy): <br><input type="text" name="date"><br><br>
        Thành phố: <br><input type="text" name="city"><br><br>
        <button type="submit">Thêm sinh viên</button>
    </form>
</body>
</html>