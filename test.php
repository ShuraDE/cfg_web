<?php
$xml = simplexml_load_file("obj.xml");

//print_r($xml);

foreach($xml->children() as $obj) {
	print($obj->ArmaObject[0]->className . "<br/>");
	print($obj->displayName . "<br/>");
}

foreach($xml->children()->children() as $obj) {
	print($obj->className . "<br/>");
	print($obj->displayName . "<br/>");
}

?>