<?php
include_once 'armaObjects.php';

$debug = 5;
$armaObjectList = array();

$objClass = new ArmaObjectXML;
//$aObjs = new ArmaObjects("obj.xml");

$sax = xml_parser_create();
xml_set_object($sax,$objClass);
xml_set_element_handler($sax, 'sax_start', 'sax_end');
xml_set_character_data_handler($sax, 'character_data');
xml_parser_set_option($sax, XML_OPTION_CASE_FOLDING, false);
//xml_parser_set_option($sax, XML_OPTION_SKIP_WHITE, true);
xml_parse($sax, file_get_contents('obj.xml'), true);
xml_parser_free($sax);


foreach($armaObjectList as $obj) {
	echo $obj->className . "<br/>" . $obj->displayName . "<br/>";
}


class ArmaObjectXML {
	var $tag;
	var $item;

	function sax_start($sax, $tag, $attr) {
	  if ($tag == 'ArmaObject') { 
		$this->item = new ArmaObject; 
	  } elseif (!empty($this->item)) {
		$this->tag = $tag;
	  }
	}
	
	function sax_end($sax, $tag) {
	  if ($tag == 'ArmaObject') { 
		global $armaObjectList;
		$this->item->display();
		array_push($armaObjectList, $this->item);
		unset($this->item);
	  }
	}
	
	function character_data($sax, $data) {
		if (!empty($this->item)) {
		  if (isset($this->item->{$this->tag})) {
			$this->item->{$this->tag} .= trim($data);
		  }
		}  
	}   
}
//$xml = simplexml_load_file("obj.xml");

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
/*
$allData = new ArmaObjects($xml->children());


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