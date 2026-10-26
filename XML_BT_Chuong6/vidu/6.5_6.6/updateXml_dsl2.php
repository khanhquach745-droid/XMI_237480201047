<?php
$sxml = simplexml_load_file('danhsachlop2.xml');

$doc = new DOMDocument();
$doc->load('danhsachlop2.xml');
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;

// ------------------------- Giá trị tìm kiếm để cập nhật -------------------------
$searchName = "Huỳnh Trâm ";// nhập đầy đủ Huỳnh Trâm Anh sẽ bị thay Bằng Huỳnh Huy Tuấn
$newName = "Huỳnh Huy Tuấn";
$newAge = "52";
$newNganh = "Khoa học máy tính";

$StenMoi = $doc->createElement('hoten', $newName);
$StuoiMoi = $doc->createElement('tuoi', $newAge);
$SnganhMoi = $doc->createElement('nganh', $newNganh);

$sroot = $doc->getElementsByTagName('danhsach')->item(0);
$slist = $sxml->sinhvien;

// ------------------------- Tìm trong tập tin XML -------------------------
echo '<h2> CẬP NHẬT SINH VIÊN </h2>';
for ($i = 0; $i < count($slist); $i++) {
    if($slist[$i]->hoten == $searchName){
        echo '<b> Họ tên:</b> ' . $slist[$i]->hoten . '<br>';
        $Ssinhvien = $doc->getElementsByTagName('sinhvien')->item($i);
        $Shoten = $doc->getElementsByTagName('hoten')->item($i);
        $Stuoi = $doc->getElementsByTagName('tuoi')->item($i);
        $Snganh = $doc->getElementsByTagName('nganh')->item($i);

        $Ssinhvien->replaceChild($StenMoi, $Shoten); // Cập nhật nội dung nút
        $Ssinhvien->replaceChild($StuoiMoi, $Stuoi); // Cập nhật nội dung nút
        $Ssinhvien->replaceChild($SnganhMoi, $Snganh); // Cập nhật nội dung nút
    }
}

$doc->save('danhsachlop2.xml');
echo "Tập tin danhsachlop2.xml đã cập nhật thành công";
?>