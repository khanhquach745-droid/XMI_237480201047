import xml.etree.ElementTree as ET

# Đọc file XML
tree = ET.parse("BT_mo_rong/Sinhvien.xml")

# Lấy phần tử gốc
root = tree.getroot()

# Nhập thông tin sinh viên
masv = input("Nhap ma sinh vien: ")
hoten = input("Nhap ho ten: ")
lop = input("Nhap lop: ")
diem = input("Nhap diem: ")

# Tạo sinh viên mới
sinhvien = ET.SubElement(root, "sinhvien")

# Thêm các thông tin
ET.SubElement(sinhvien, "masv").text = masv
ET.SubElement(sinhvien, "hoten").text = hoten
ET.SubElement(sinhvien, "lop").text = lop
ET.SubElement(sinhvien, "diem").text = diem

# Lưu lại file XML
ET.indent(tree, space="    ")
tree.write("BT_mo_rong/Sinhvien.xml", encoding="utf-8", xml_declaration=True)

print("Da them sinh vien!")