import xml.etree.ElementTree as ET

# Đọc file XML
tree = ET.parse("BT_mo_rong/Sinhvien.xml")

# Lấy phần tử gốc
root = tree.getroot()

# Nhập mã sinh viên cần xóa
ma_can_xoa = input("Nhap ma sinh vien can xoa: ")

# Biến kiểm tra có tìm thấy hay không
tim_thay = False

# Duyệt danh sách sinh viên
for sinhvien in root.findall("sinhvien"):

    masv = sinhvien.find("masv").text

    if masv == ma_can_xoa:
        root.remove(sinhvien)

        tim_thay = True
        break

# Nếu tìm thấy thì lưu lại
if tim_thay:
    tree.write("BT_mo_rong/Sinhvien.xml", encoding="utf-8", xml_declaration=True)
    print("Da xoa sinh vien!")
else:
    print("Khong tim thay sinh vien!")