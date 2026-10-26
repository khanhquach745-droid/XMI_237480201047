<?php
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;

// Tạo thẻ gốc <laptops>
$laptops = $dom->createElement('laptops');
$dom->appendChild($laptops);

// Dữ liệu laptop mẫu
$data = [
    [
        'name' => 'Dell Inpiron 2020',
        'cpu' => 'Core i5 2.6Ghz',
        'ram' => '8GB'
    ],
    [
        'name' => 'Lenovo ThinPack 2022',
        'cpu' => 'Core i7 3.6Ghz',
        'ram' => '16GB'
    ]
];

foreach ($data as $item) {
    $laptop = $dom->createElement('laptop');

    $name = $dom->createElement('name', $item['name']);
    $laptop->appendChild($name);

    // Lưu ý: Trong đề bài câu 1, thẻ cpu dùng thẻ đóng là </donvi>, 
    // tuy nhiên chuẩn XML thông thường nên đóng đúng tên thẻ. Dưới đây dùng thẻ <cpu> và đóng </cpu> đúng logic.
    $cpu = $dom->createElement('cpu', $item['cpu']);
    $laptop->appendChild($cpu);

    $ram = $dom->createElement('ram', $item['ram']);
    $laptop->appendChild($ram);

    $laptops->appendChild($laptop);
}

$filename = 'bai3_Laptop.xml';
if ($dom->save($filename)) {
    echo "Tạo tập tin <b>$filename</b> thành công!";
} else {
    echo "Lỗi khi tạo tập tin $filename!";
}
?>