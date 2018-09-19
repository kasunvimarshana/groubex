<?php

require_once("../util/MyInit.php");

class DocObj{
	
	private $id;
	private $url;
	private $document;
	private $note;
    private $varDate;
    private $views;
	
	public function __toString(){
		return get_class($this);
	}
	//setters
	public function setId($id){
		if(is_numeric($id)){
            $this->id = $id;
        }else{
            //throw new Exception("invalid argument");
        }
	}
    public function setUrl($url){
        $this->url = $url;
    }
    public function setDocument($document){
        $this->document = $document;
    }
	public function setNote($note){
        $this->note = $note;
    }
	public function setVarDate($varDate){
        if(checkDateF($varDate)){
            $this->varDate = $varDate;
        }else{
            //throw new Exception("invalid argument");
        }
    }
    public function setViews($views){
        $this->views = $views;
    }
	//getters
	public function getId(){
        return $this->id;
	}
    public function getUrl(){
        return $this->url;
    }
    public function getDocument(){
        return $this->document;
    }
	public function getNote(){
        return $this->note;
    }
	public function getVarDate(){
        return $this->varDate;
    }
    public function getViews(){
        return $this->views;
    }
}

?>