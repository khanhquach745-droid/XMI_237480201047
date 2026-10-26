<?php
// Khởi tạo đối tượng Document
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;

$xml_file_name = 'danhsachlop.xml';

// Tạo các nút trên Document
$root = $dom->createElement('danhsach');

$sinhvien_node = $dom->createElement('sinhvien');

$attr_sinhvien_id = new DOMAttr('sinhvien_id', 'cn001');
$sinhvien_node->setAttributeNode($attr_sinhvien_id);

$child_sinhvien_hoten = $dom->createElement('hoten', 'Nguyen Trinh');
$sinhvien_node->appendChild($child_sinhvien_hoten);

$child_sinhvien_nganh = $dom->createElement('nganh', 'tin hoc');
$sinhvien_node->appendChild($child_sinhvien_nganh);

$child_sinhvien_tuoi = $dom->createElement('tuoi', 20);
$sinhvien_node->appendChild($child_sinhvien_tuoi);

$root->appendChild($sinhvien_node);

$dom->appendChild($root);

// Lưu vào tập tin 'danhsachlop.xml'
$dom->save($xml_file_name);

echo "$xml_file_name đã tạo thành công ";
?>