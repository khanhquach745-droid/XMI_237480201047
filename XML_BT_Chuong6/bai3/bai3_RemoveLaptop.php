<?php
$xmlFile = 'bai3_Laptop.xml';

if (file_exists($xmlFile)) {
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->load($xmlFile);

    $laptopsList = $dom->getElementsByTagName('laptops')->item(0);
    $laptops = $dom->getElementsByTagName('laptop');
    $removed = false;

    // Duyệt ngược danh sách để xóa an toàn (Đã sửa lỗi thiếu dấu trừ ở đây)
    for ($i = $laptops->length - 1; $i >= 0; $i--) {
        $laptop = $laptops->item($i);
        $nameNode = $laptop->getElementsByTagName('name')->item(0);
        
        if ($nameNode && trim($nameNode->nodeValue) == 'Asus 2021') {
            $laptopsList->removeChild($laptop);
            $removed = true;
        }
    }

    if ($removed) {
        $dom->save($xmlFile);
        echo "Đã xóa thành công laptop 'Asus 2021'!";
    } else {
        echo "Không tìm thấy laptop 'Asus 2021' trong file!";
    }
} else {
    echo "Không tìm thấy file $xmlFile!";
}
?>