import xml.etree.ElementTree as ET
# Doc file Computer.xml
tree = ET.parse("Computer.xml")
# Lay nut goc
root = tree.getroot()
# Duyet tat ca cac the
for element in root.iter():
    print(element.tag)