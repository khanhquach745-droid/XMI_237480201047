<?php
$xml = simplexml_load_file("mess02.xml") or die("Lỗi");
foreach ($xml->children() as $sv) {
    echo $sv->ID . ", ";
    echo $sv->Ten;
    echo "<br>";
}
?>