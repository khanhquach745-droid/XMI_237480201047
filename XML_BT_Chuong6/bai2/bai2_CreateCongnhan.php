<?php
// Tạo đối tượng DOMDocument
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true; // Định dạng khoảng trắng thụt lề đẹp mắt

// Tạo thẻ gốc <danhsach>
$danhsach = $dom->createElement('danhsach');
$dom->appendChild($danhsach);

// Mảng dữ liệu công nhân
$congnhans = [
    [
        'maso' => '001',
        'hoten' => 'Nguyễn Thế Anh',
        'donvi' => 'Hành chính',
        'luong' => '5.000.000'
    ],
    [
        'maso' => '002',
        'hoten' => 'Nguyễn Thanh Bình',
        'donvi' => 'Kỹ thuật',
        'luong' => '7.000.000'
    ],
    [
        'maso' => '003',
        'hoten' => 'Vương Thúy Phượng',
        'donvi' => 'Tổ chức',
        'luong' => '8.000.000'
    ]
];

// Duyệt qua mảng để thêm từng công nhân vào XML
foreach ($congnhans as $cn) {
    $congnhan = $dom->createElement('congnhan');

    $maso = $dom->createElement('maso', $cn['maso']);
    $congnhan->appendChild($maso);

    $hoten = $dom->createElement('hoten', $cn['hoten']);
    $congnhan->appendChild($hoten);

    $donvi = $dom->createElement('donvi', $cn['donvi']);
    $congnhan->appendChild($donvi);

    $luong = $dom->createElement('luong', $cn['luong']);
    $congnhan->appendChild($luong);

    $danhsach->appendChild($congnhan);
}

// Lưu file XML
$filename = 'bai2_nhansu.xml';
if ($dom->save($filename)) {
    echo "Tạo tập tin <b>$filename</b> thành công!";
} else {
    echo "Lỗi khi tạo tập tin $filename!";
}
?>