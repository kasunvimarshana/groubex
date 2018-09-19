<?php

require_once("../util/MyInit.php");

class DocObjBoImpl implements DBBLL{
	
	private $docObjDaoImpl;
	
	public function __construct(){
		$this->docObjDaoImpl = new DocObjDaoImpl();
	}
	
	public function f_save($obj){
		return $this->docObjDaoImpl->f_save($obj);
	}
    public function f_update($obj){
        return $this->docObjDaoImpl->f_update($obj);
	}
    public function f_delete($id){
		return $this->docObjDaoImpl->f_delete($id);
	}
    public function f_search($id){
		return $this->docObjDaoImpl->f_search($id);
	}
    public function f_list(){
		return $this->docObjDaoImpl->f_list();
	}
    public function f_searcWithParams($params){
        return $this->docObjDaoImpl->f_searcWithParams($params);
    }
	
}

?>