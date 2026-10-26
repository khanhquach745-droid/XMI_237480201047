<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tên các thẻ XML</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        ul { line-height: 1.6; }
    </style>
</head>
<body>

<h2>DANH SÁCH TÊN CÁC THẺ TRONG FILE nhansu.xml</h2>

<?php
$xmlFile = 'bai2_nhansu.xml';

if (file_exists($xmlFile)) {
    $dom = new DOMDocument();
    $dom->load($xmlFile);

    echo "<ul>";
    echo "<li><b>Thẻ gốc:</b> &lt;" . $dom->documentElement->nodeName . "&gt;</li>";
    
    // Lấy các thẻ con bên trong <congnhan> đầu tiên làm đại diện cho cấu trúc
    $congnhanNodes = $dom->getElementsByTagName('congnhan');
    if ($congnhanNodes->length > 0) {
        $firstWorker = $congnhanNodes->item(0);
        echo "<ul>";
        echo "<li><b>Thẻ chứa thông tin:</b> &lt;congnhan&gt;</li>";
        echo "<ul>";
        echo "<li>Các thẻ con bên trong:</li>";
        echo "<ul>";
        
        foreach ($firstWorker->childNodes as $child) {
            if ($child->nodeType === XML_ELEMENT_NODE) {
                echo "<li>&lt;" . $child->nodeName . "&gt;</li>";
            }
        }
        
        echo "</ul></ul></ul>";
    }
    echo "</ul>";

} else {
    echo '<p style="color: red;">Không tìm thấy file nhansu.xml!</p>';
}
?>

</body>
</html>