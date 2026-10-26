import xml.etree.ElementTree as ET
# Doc tap tin XML
tree = ET.parse("hoso.xml")
root = tree.getroot()
# Tim nhan vien co ma 002
for nv in root.findall("nhanvien"):
    manv = nv.find("manv").text
    if manv == "002":
        print("Ma NV:", manv)
        print("Ho ten:", nv.find("hoten").text)
        print("Don vi:", nv.find("donvi").text)
        print("Luong:", nv.find("luong").text)