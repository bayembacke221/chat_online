<?php
    
class Domain {
		
	private $_url = "";
	private $_domain = "";
		
	
	public function __construct(){
		
	}
	
	public function domain(){
		
		$_host = (String) null;
		
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
			$this->_url = "https";
		}else{
			$this->_url = "http"; 
		}  
		
		$this->_url .= "://"; 
		
		if($_SERVER['SERVER_NAME'] == "localhost"){
			
			$this->_url .= $_SERVER['HTTP_HOST'];
			
			if($_SERVER['SCRIPT_FILENAME'] != $_SERVER['DOCUMENT_ROOT']){
				$_host = explode("/", substr($_SERVER['SCRIPT_FILENAME'], (strlen($_SERVER['DOCUMENT_ROOT']) + 1), strlen($_SERVER['SCRIPT_FILENAME'])), 2); 	
			}

			if(isset($_host[0])){
				$this->_url .= '/' . $_host[0] . '/';
			}
		}else{
			$this->_url .= $_SERVER['HTTP_HOST'] . '/'; 
		}
		
		$this->_domain = $this->_url;
		
		
		
		return $this->_domain;
		
	}
	
	public function current_url(){
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
			$this->_url = "https";
		}else{
			$this->_url = "http"; 
		}  
		
		$this->_url .= "://"; 
		$this->_url .= $_SERVER['HTTP_HOST']; 
		$this->_url .= $_SERVER['REQUEST_URI']; 
		
		return $this->_url;
	}
}


?>