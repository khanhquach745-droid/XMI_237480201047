import xml.etree.ElementTree as ET
# Doc file Computer.xml
tree = ET.parse("Computer.xml")
# Lay nut goc
root = tree.getroot()
# Lay danh sach computer
computers = root.findall("computer")
# Duyet tung computer
for i, computer in enumerate(computers, 1):
    name = computer.find("name").text.strip()
    cpu = computer.find("cpu").text.strip()
    ram = computer.find("ram").text.strip()
    print(i, ". name:", name)
    print("   cpu:", cpu)
    print("   Ram:", ram)
    print()