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
	echo $obj->className . " - " . $obj->parent . "<br/>";
	if (!empty($obj->log)) {
		foreach($obj->log as $val) {
			echo ".l." . $val . "<br/>";
		}
		foreach($obj->parents as $val) {
			echo "..#" . $val->tier . " " . $val->entry . "<br/>";
		}		
	}
}

class ArmaObjectXML {
	var $tag;
	var $item;
	var $itemSub;
	var $subCol = false;

	function sax_start($sax, $tag, $attr) {
		switch ($tag) {
			case 'ArmaObject':
				$this->item = new ArmaObject; 
				break;
			case 'parents':
				$this->parents = array();
				$subCol = true;
				break;
			case 'LogLines':
				$this->log = array();
				break;
			case 'ParentHiraObject':
				$this->itemSub = new ArmaObjectParent;
				break;
			default:
				if(!empty($this->item)) {
					$this->tag = $tag;
				}
				break;
		}
	}
	
	function sax_end($sax, $tag) {
		switch ($tag) {
			case 'ArmaObject':
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
				break;
			case 'parents':
				//array_push($this->itemObj->parents, $this->item);
				//print_r(($this->itemObj->parents));
				//print_r(($this->item));
				break;
			case 'ParentHiraObject':
				//$this->item = $this->itemObj;
				break;
		}	  
	}
	
	function character_data($sax, $data) {
		if (!empty($this->item) && !empty(trim($data))) {
			if (isset($this->item->{$this->tag})) {
				$this->item->{$this->tag} .= trim($data);
			} else {
				switch ($this->tag) {
					case 'Line':
						echo "push " . $data;
						array_push($this->item->log, trim($data));
						break;
					case 'tier':
						$this->itemSub->tier = trim($data);
						break;
					case 'entry':
						$this->itemSub->entry = trim($data);
						array_push($this->item->parents, $this->itemSub);
						break;
					default:
					//nothing to, space for modifications
				}
			}
		}  
	}   
}
?>