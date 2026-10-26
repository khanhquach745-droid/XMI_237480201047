import xml.etree.ElementTree as ET
# Doc file Computer.xml
tree = ET.parse("Computer.xml")
# Lay nut goc
root = tree.getroot()
# Tao computer moi
computer = ET.Element("computer")
# Tao the name
name = ET.SubElement(computer, "name")
name.text = "Asus 2021"
# Tao the cpu
cpu = ET.SubElement(computer, "cpu")
cpu.text = "Core i5 3.0Ghz"
# Tao the ram
ram = ET.SubElement(computer, "ram")
ram.text = "16GB"
# Them computer vao cuoi danh sach
root.append(computer)
# Luu lai file
tree.write("Computer.xml", encoding="utf-8", xml_declaration=True)
print("Da them may tinh Asus thanh cong!")