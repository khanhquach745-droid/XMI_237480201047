import xml.etree.ElementTree as ET
# Doc tap tin XML
tree = ET.parse("hoso.xml")
root = tree.getroot()
# Duyet danh sach nhan vien
i = 1
for nv in root.findall("nhanvien"):
    manv = nv.find("manv").text
    hoten = nv.find("hoten").text
    donvi = nv.find("donvi").text
    luong = nv.find("luong").text
    print("Nhan vien", i)
    print("Ma NV:", manv)
    print("Ho ten:", hoten)
    print("Don vi:", donvi)
    print("Luong:", luong)
    print("--------------------")
    i += 1