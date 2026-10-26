import xml.etree.ElementTree as ET
# Doc tap tin XML
tree = ET.parse("hoso.xml")
root = tree.getroot()
# In ten nut goc
print(root.tag)
# Duyet cac nhan vien
for nv in root:
    print(nv.tag)
    # Duyet cac the con cua nhan vien
    for the in nv:
        print(the.tag)