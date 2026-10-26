<?php
$xmlFile = 'bai3_Laptop.xml';

if (file_exists($xmlFile)) {
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->load($xmlFile);

    $laptops = $dom->getElementsByTagName('laptop');
    $updated = false;

    foreach ($laptops as $laptop) {
        $nameNode = $laptop->getElementsByTagName('name')->item(0);
        if ($nameNode && trim($nameNode->nodeValue) == 'Dell Inpiron 2020') {
            $nameNode->nodeValue = 'Toshiba 2021'; // Cập nhật tên mới[cite: 4]
            $updated = true;
            break;
        }
    }

    if ($updated) {
        $dom->save($xmlFile);
        echo "Cập nhật tên laptop thành công!";
    } else {
        echo "Không tìm thấy laptop 'Dell Inpiron 2020' để cập nhật!";
    }
} else {
    echo "Không tìm thấy file $xmlFile!";
}
?>