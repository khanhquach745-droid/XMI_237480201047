<?php
$sxml = simplexml_load_file('danhsachlop2.xml');
$doc = new DOMDocument();
$doc->load('danhsachlop2.xml');
$doc->preserveWhiteSpace = true;
$doc->formatOutput = true;

// ------------------------- Giá trị tìm kiếm để xóa -------------------------
$removeName = "Nguyễn Hoàng";// ghi đầy đử Nguyễn Hoàng Tiến thì bên danhsachlop2 sẽ bị xóa 
$sroot = $doc->getElementsByTagName('danhsach')->item(0);
$slist = $sxml->sinhvien;

// ------------------------- Tìm trong tập tin XML -------------------------
echo '<h2> XÓA SINH VIÊN </h2>';
for ($i = 0; $i < count($slist); $i++) {
    if($slist[$i]->hoten == $removeName){
        echo '<b> Họ tên:</b> ' . $slist[$i]->hoten . '<br>';
        $Ssinhvien = $doc->getElementsByTagName('sinhvien')->item($i);
        $sroot->removeChild($Ssinhvien); // Xóa nút $Ssinhvien
    }
}
$doc->save('danhsachlop2.xml');
echo "Đã xóa sinh viên $removeName.";

$Selements = $doc->getElementsByTagName('.');
foreach($Selements as $Selement){
    echo $Selement->nodeValue.'<br>';
    if($Selement->nodeValue === ""){
        echo "Có dòng trống";
        $Selement->parentNode->removeChild($Selement); // Xóa nút Selement
    }
}
$doc->save('danhsachlop2.xml');
?>