<?php
$html = '<div id="example">
          <p>Element 1</p>
          <p>Element 2</p>
          <p>Element 3</p>
        </div>';

$doc = new DOMDocument();
$doc->loadHTML($html);

$xpath = new DOMXpath($doc);
$elements = $xpath->query('//div[@id="example"]/p');

$array = array();
foreach ($elements as $element) {
  $array[] = $element->nodeValue;
}

print_r($array);
?>