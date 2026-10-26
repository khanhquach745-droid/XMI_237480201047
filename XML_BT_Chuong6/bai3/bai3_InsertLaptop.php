<?php
$xmlFile = 'bai3_Laptop.xml';

if (file_exists($xmlFile)) {
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->load($xmlFile);

    // Lấy thẻ gốc <laptops>
    $laptops = $dom->getElementsByTagName('laptops')->item(0);

    // Tạo thẻ <laptop> mới
    $laptop = $dom->createElement('laptop');

    $name = $dom->createElement('name', 'Asus 2021');
    $laptop->appendChild($name);

    $cpu = $dom->createElement('cpu', 'Core i5 3.0Ghz');
    $laptop->appendChild($cpu);

    $ram = $dom->createElement('ram', '16GB');
    $laptop->appendChild($ram);

    // Thêm vào cuối danh sách
    $laptops->appendChild($laptop);

    // Lưu lại file
    $dom->save($xmlFile);
    echo "Thêm laptop thành công! Kiểm tra lại file Laptop.xml.";
} else {
    echo "Không tìm thấy file $xmlFile!";
}
?>