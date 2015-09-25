<?php
include_once 'armaObject.php';

class ArmaObjects {
	
	
	//todo umstellung auf SAX
	//http://www.codemiles.com/php-tutorials/php-sax-parser-in-action-t1436.html
	
	private $objects = array();
	private $maxItemsPerPackage = 500;
	private $counterItem = 0;
	private $counterPackage = 0;

    // XML parser variables
    var $parser;
    var $name;
    var $attr;
    var $data  = array();
    var $stack = array();
    var $keys;
    var $path; 
    
    var $type;
	
	public function __construct($data)
	{
		array_push($this->objects, new ArmaObject($data));
	}
	
	/*
	public function __construct($file)
	{
		$this->_file = $file;
	
		$this->_parser = xml_parser_create("UTF-8");
		xml_set_object($this->_parser, $this);
		
		echo("parsing...");
		
		xml_set_element_handler($this->_parser, "startTag", "endTag");
		xml_set_character_data_handler($this->_parser, "charXML");
		xml_parser_set_option($this->_parser, XML_OPTION_CASE_FOLDING, false);
		
		if ($this->type == 'url') {
			// if use type = 'url' now we open the XML with fopen
			 
			if (!($fp = @fopen($this->url, 'rb'))) {
				$this->error("Cannot open {$this->url}");
			}
		
			while (($data = fread($fp, 8192))) {
				if (!xml_parse($this->parser, $data, feof($fp))) {
					$this->error(sprintf('XML error at line %d column %d',
							xml_get_current_line_number($this->parser),
							xml_get_current_column_number($this->parser)));
				}
			}
		} else if ($this->type == 'contents') {
			// Now we can pass the contents, maybe if you want
			// to use CURL, SOCK or other method.
			$lines = explode("\n",$this->url);
			
			print_r($lines);
			
			foreach ($lines as $val) {
				if (trim($val) == '')
					continue;
				$data = $val . "\n";
				if (!xml_parse($this->parser, $data)) {
					$this->error(sprintf('XML error at line %d column %d',
							xml_get_current_line_number($this->parser),
							xml_get_current_column_number($this->parser)));
				}
			}
		}
	}
	
	private function charXML($parser, $data)    
	{
		if (trim($data) != '')
			$this->data[$this->keys]['data'][] = trim(str_replace("\n", '', $data));
	}	
	
	private function startTag($parser, $name, $attribs)
	{
		print_r($name);
		echo("call startTag");
		
        $this->stack[$name] = array();
        $keys = '';
        $total = count($this->stack)-1;
        $i=0;
        foreach ($this->stack as $key => $val)    {
            if (count($this->stack) > 1) {
                if ($total == $i)
                    $keys .= $key;
                else
                    $keys .= $key . '|'; // The saparator
            }
            else
                $keys .= $key;
            $i++;
        }
        if (array_key_exists($keys, $this->data))    {
            $this->data[$keys][] = $attr;
        }    else
            $this->data[$keys] = $attr;
        $this->keys = $keys; 
        
        print_r($this->keys);
        print_r($this->data[$keys]);
	}
	
	private function endTag($parser, $name)
	{
		var_dump($this->stack);
		
        end($this->stack);
        if (key($this->stack) == $name)
            array_pop($this->stack); 
	}
	
	private function parse()
	{
		$fh = fopen($this->_file, "r");
		if (!$fh) {
			die("Epic fail!\n");
		}
	
		while (!feof($fh)) {
			$data = fread($fh, 4096);
			xml_parse($this->_parser, $data, feof($fh));
		}
	}
	
	function error($msg)    {
		echo "<div align=\"center\">
		<font color=\"red\"><b>Error: $msg</b></font>
		</div>";
		exit();
	}	
	
	/*
	public function __construct($file) {
		$streamer = new SimpleXmlStreamer($file);
		$streamer->parse();		
	}
	

	public function __construct($data) {
		print("loading " . $data->children()->count() . " objects<br/>");
		foreach($data->children() as $obj) {
			array_push($this->objects, new ArmaObject($obj));
			$counterItem++;
			
			if ($this->counterItem >= $this->maxItemsPerPackage) {
				$counterPackage++;
				echo("loaded " . $this->counterItem * $this->counterPackage . "<br/>");
				
				//TODO transfer to database
				//clearing memory
				$this->objects = array();
				$this->counterItem = 0;
			}
			
			//echo(".");
			//sleep(0.1);
		}
		print("loading done<br/>");
		
	}
	*/
	
	
}

?>