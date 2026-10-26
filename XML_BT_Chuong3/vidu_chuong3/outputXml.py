import xml.dom.minidom
doc = xml.dom.minidom.parse("Myxml.xml")
print(doc.nodeName)
print(doc.firstChild.tagName)
expertise = doc.getElementsByTagName("expertise")
print("%d expertise:"%expertise.length)
for skill in expertise:
    print(skill.getAttribute("name"))