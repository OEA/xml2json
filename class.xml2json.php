<?php

/**
* XML2JSON
*
* @author 	Ömer Aslan(OEASLAN) <omeremreaslan@gmail.com>
* @url 		https://github.com/OEASLAN/xml2json
* @date 	20/11/2014
*/

class XML2JSON{
	
	/**
	 * @var SimpleXMLElement $xml
	 */
	private $xml;

	/**
	 * @var JSONObject $json
	 */
	private $json;

	/**
	 * @var String $url
	 */
	private $url = null;

	/**
	 * @var String $string
	 */
	private $string = null;

	/**
	 * @var boolean $is_remote
	 */
	private $is_remote = false;

	/**
	 * Construction
	 */
	public function __construct(){
	}

	/**
	 * Setting $is_remote 
	 * @param boolean $is_remote
	 * @param boolean $is_curl
	 */
	public function setRemote($is_remote){
		$this->is_remote = ($is_remote) ? true : false ;
	}

	/**
	 * Creating SimpleXML DOM 
	 * @param String $xml_string
	 */
	private function setXML(){
		$this->xml = simplexml_load_string($this->string);
	}

	/**
	 * Remote Connection 
	 */
	public function remoteConnection(){
		$this->setXMLRemote();
	}

	/**
	 * Local Connection 
	 */
	private function localConnection(){
		$this->setXML();
	}

	/**
	 * Setting string
	 * @param String $string 
	 */
	public function setString($string){
		$this->string = $string;
	}

	/**
	 * Setting URL for Remote Connection 
	 * @param string $url
	 */
	public function setUrl($url){
		$this->url = $url;
	}

	/**
	 * Setting XML with file_get_contents
	 */
	private function setXMLRemote(){
		$this->string = file_get_contents($this->url);
		$this->setXML();
	}

	/**
	 * Starting the processes
	 */
	public function start(){
		if($this->is_remote){
			$this->remoteConnection();
		}else{
			$this->localConnection();
		}
		$this->convertXMLtoJSON();
	}

	/**
	 * Converting XML to JSON
	 */
	private function convertXMLtoJSON(){
		$this->json = json_encode($this->xml);

	}

	/**
	 * Returns JSON data
	 * @return JSON $this->json
	 */
	public function getJSON(){
		return $this->json;
	}

}