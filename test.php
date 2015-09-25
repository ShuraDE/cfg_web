<?php
include_once 'armaObjects.php';
ini_set('implicit_flush', true);

$armaObjectList = array();
$objClass = new ArmaObjectXML;
$objectReadCounter = 0;

$inputFileXML = "obj.xml"; //obj_more.xml

$debug_outputImports = false;



echo "read data<br/>";

$sax = xml_parser_create();
xml_set_object($sax,$objClass);
xml_set_element_handler($sax, 'sax_start', 'sax_end');
xml_set_character_data_handler($sax, 'character_data');
xml_parser_set_option($sax, XML_OPTION_CASE_FOLDING, false);
//xml_parser_set_option($sax, XML_OPTION_SKIP_WHITE, true);
xml_parse($sax, file_get_contents($inputFileXML), true);
xml_parser_free($sax);

echo "<br/>reading " . $objectReadCounter . "<br/>";
foreach($armaObjectList as $obj) {
	echo $obj->className . "-" . $obj->log . "-" . $obj->parents . "-" . $obj->parent . "<br/>";
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

/* todo, class corrections....	  
		
		switch ($tag) {
			case 'ArmaObject':
				$this->item = new ArmaObject; 
				break;
			case 'parents':
				$this->item = new ArmaObjectParents;
				break;
			case 'log':
				$this->item = new ArmaObjectParents;
				break;
			default:
				if(!empty($this->item)) {
					$this->tag = $tag;
				}
		}
*/		
	}
	
	function sax_end($sax, $tag) {
	  if ($tag == 'ArmaObject') { 
		global $armaObjectList;
		global $objectReadCounter;
		global $debug_outputImports;
		
		//raise import counter +1
		$objectReadCounter++;
		
		//output import
		if ($debug_outputImports) {
			echo str_pad($objectReadCounter, 7, " ", STR_PAD_LEFT) . " " . $this->item->className . "<br/>";
		} else {
			//$this->item->display();
			if ($objectReadCounter % 300 == 0) { echo "<br/>"; }
			echo "." ;
		}
		//append object to collection, clear active item
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
?>