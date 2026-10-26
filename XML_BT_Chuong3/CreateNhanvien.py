import xml.etree.ElementTree as ET
# Tao nut goc
root = ET.Element("danhsach")
# Tao nhan vien 1
nv1 = ET.SubElement(root, "nhanvien")
ET.SubElement(nv1, "manv").text = "001"
ET.SubElement(nv1, "hoten").text = "Nguyễn Thế Anh"
ET.SubElement(nv1, "donvi").text = "Hành chính"
ET.SubElement(nv1, "luong").text = "5.000.000"
# Tao nhan vien 2
nv2 = ET.SubElement(root, "nhanvien")
ET.SubElement(nv2, "manv").text = "002"
ET.SubElement(nv2, "hoten").text = "Nguyễn Thanh Bình"
ET.SubElement(nv2, "donvi").text = "Kỹ thuật"
ET.SubElement(nv2, "luong").text = "7.000.000"
# Tao nhan vien 3
nv3 = ET.SubElement(root, "nhanvien")
ET.SubElement(nv3, "manv").text = "003"
ET.SubElement(nv3, "hoten").text = "Vương Thúy Phượng"
ET.SubElement(nv3, "donvi").text = "Tổ chức"
ET.SubElement(nv3, "luong").text = "8.000.000"
# Tao cay XML
tree = ET.ElementTree(root)
# Ghi ra tap tin hoso.xml
ET.indent(tree, space="    ")
tree.write("hoso.xml", encoding="utf-8", xml_declaration=True)
print("Da tao tap tin hoso.xml thanh cong!")