import xml.etree.ElementTree as ET

# Đọc file XML
tree = ET.parse("BT_mo_rong/Sinhvien.xml")

# Lấy phần tử gốc
root = tree.getroot()

# Nhập mã sinh viên cần tìm
ma_can_tim = input("Nhap ma sinh vien: ")

# Biến kiểm tra có tìm thấy hay không
tim_thay = False

# Duyệt danh sách sinh viên
for sinhvien in root.findall("sinhvien"):

    masv = sinhvien.find("masv").text

    if masv == ma_can_tim:
        hoten = sinhvien.find("hoten").text
        lop = sinhvien.find("lop").text
        diem = sinhvien.find("diem").text

        print("Ma SV:", masv)
        print("Ho ten:", hoten)
        print("Lop:", lop)
        print("Diem:", diem)

        tim_thay = True
        break

# Nếu không tìm thấy
if tim_thay == False:
    print("Khong tim thay sinh vien!")