<?php
header('Content-Type: text/html; charset=UTF-8');
$xmlFile = 'bai3_Laptop.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    
    echo "<pre>";
    $stt = 1;
    foreach ($xml->laptop as $item) {
        echo "{$stt}. name: {$item->name}\n";
        echo "    cpu: {$item->cpu}\n";
        echo "    Ram: {$item->ram}\n\n";
        $stt++;
    }
    echo "</pre>";
} else {
    echo "Không tìm thấy file $xmlFile! Hãy chạy file CreateLaptop.php trước.";
}
?>