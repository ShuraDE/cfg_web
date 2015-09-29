<?php
include_once 'armaObjects.php';
ini_set('implicit_flush', true);

$armaObjectList = array();
$objClass = new ArmaObjectXML;
$objectReadCounter = 0;

$inputFileXML = "obj_more.xml"; //"obj.xml"; //

$fileOutput = fopen("output.txt", "w") or die("Unable to open file!");		//output file

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
$objClass->writeOutData();


echo "<br/>reading " . $objectReadCounter . "<br/>";

fclose($fileOutput);

//test output
/*
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
*/

//xml reader
class ArmaObjectXML {
	var $tag; 		//active tag
	var $item; 		//armaObject
	var $itemSub; 	//ParentHiraObject
	var $writeOut = 10;
	
	function sax_start($sax, $tag, $attr) {
		switch ($tag) {
			case 'ArmaObject':
				$this->item = new ArmaObject; 
				break;
			case 'parents':
				//create array for ParentHiraObject
				$this->parents = array();
				break;
			case 'LogLines':
				//create array for error log
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
			//armaObject is done
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
				if (sizeof($armaObjectList)>$this->writeOut) {
					$this->writeOutData();
					$armaObjectList = array();
				}
				unset($this->item);
				break;
			case 'parents':
				//do nothing
				break;
			case 'ParentHiraObject':
				//do nothing
				break;
		}	  
	}
	
	//handle attribute values
	function character_data($sax, $data) {
		if (!empty($this->item) && !empty(trim($data))) {
			//default, add attribute to class armaObject
			if (isset($this->item->{$this->tag})) {
				$this->item->{$this->tag} .= trim($data);
			} else {
				//special collection in armaObject
				switch ($this->tag) {
					//for error logline
					case 'Line':
						array_push($this->item->log, trim($data));
						break;
					//for ParentHiraObject
					case 'tier':
						$this->itemSub->tier = trim($data);
						break;
					//for ParentHiraObject, last attribute, array_push
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
	
	
	//change to db merge, only for debug purpose
	function writeOutData() {
		global $fileOutput;	
		global $armaObjectList;
		
		foreach($armaObjectList as $obj) {
			fwrite($fileOutput, str_pad($obj->idx, 7, " ", STR_PAD_LEFT) . " - " . $obj->className . " - " . $obj->parent . "\n");
			if (!empty($obj->log)) {
				foreach($obj->log as $val) {
					fwrite($fileOutput,".l." . $val . "\n");
				}
				foreach($obj->parents as $val) {
					fwrite($fileOutput,"..#" . $val->tier . " " . $val->entry . "\n");
				}		
			}
		}		
	}
}
?>