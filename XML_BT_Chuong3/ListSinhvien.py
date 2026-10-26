import os
import xml.etree.ElementTree as ET
# Lay duong dan thu muc chua file Python
duongdan = os.path.dirname(os.path.abspath(__file__))
# Doc tap tin XML cung thu muc
tree = ET.parse(os.path.join(duongdan, "danhsach.xml"))
root = tree.getroot()
i = 1
for student in root.findall("student"):
    name = student.find("name").text.strip()
    date = student.find("date").text.strip()
    city = student.find("city").text.strip()
    print(f"{i}. {name:<16} {date} {city}")
    i += 1