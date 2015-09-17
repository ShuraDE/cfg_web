<?php
include_once 'armaObjects.php';

$debug = 5;

$aObjs = new ArmaObjects("obj_more.xml");

//$xml = simplexml_load_file("obj_more.xml");

/*
libxml_use_internal_errors(true);
try{
	$xmlToObject = simplexml_load_file("obj.xml"); //new SimpleXMLElement($notSoWellFormedXML);
} catch (Exception $e){
	echo 'Please try again later...';
	exit();
}
*/
//print_r($xml);

//$allData = new ArmaObjects($xml->children());

/*
foreach($xml->children() as $obj) {
	print($obj->ArmaObject[0]->className . "<br/>");
	//var_dump($obj->children());//
	
	print("<br/>");
	print($obj->children()->count());
	print("<br/>");
	
	
	
}

foreach($xml->children()->children() as $obj) {
	print($obj->className . "<br/>");
	print($obj->displayName . "<br/>");
	echo $obj->__toString();
	//var_dump($obj);
	print("<br/>");
	print($obj->children()->count());
	print("<br/>");
}

echo($obj->__toString());
*/
?>