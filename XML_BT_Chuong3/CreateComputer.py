import xml.etree.ElementTree as ET
# Tao nut goc computers
root = ET.Element("computers")
# Tao computer thu nhat
computer1 = ET.SubElement(root, "computer")
name1 = ET.SubElement(computer1, "name")
name1.text = "Lê gia Trưởng"
cpu1 = ET.SubElement(computer1, "cpu")
cpu1.text = "Core i5 intel 1570 2.6Ghz"
ram1 = ET.SubElement(computer1, "ram")
ram1.text = "8TG"
# Tao computer thu hai
computer2 = ET.SubElement(root, "computer")
name2 = ET.SubElement(computer2, "name")
name2.text = "Lê hãi tù"
cpu2 = ET.SubElement(computer2, "cpu")
cpu2.text = "Core i7000 3.6Ghz"
ram2 = ET.SubElement(computer2, "ram")

ram2.text = "16GB"
# Tao cay XML
tree = ET.ElementTree(root)
# Ghi ra file Computer.xml
tree.write("Computer.xml", encoding="utf-8", xml_declaration=True)
print("Da tao file Computer.xml thanh cong!")