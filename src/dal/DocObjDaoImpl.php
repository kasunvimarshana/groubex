<?php

require_once("../util/MyInit.php");

class DocObjDaoImpl implements DBDAL{
	
	private $dbCon;
        
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
	
	public function f_save($obj){
		if (!($obj instanceof DocObj)){
			throw new Exception("invalid argument");
		}
        $id = $obj->getId();
	    $url = $obj->getUrl();
	    $document = $obj->getDocument();
	    $note = $obj->getNote();
        $varDate = $obj->getVarDate();
        $views = $obj->getViews();
		
		$sql = "INSERT INTO DocObj (url, document, note, varDate) VALUES (:url, :document, :note, :varDate)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':url', $url);
		$stmt->bindParam(':document', $document);
		$stmt->bindParam(':note', $note);
		$stmt->bindParam(':varDate', $varDate);

		$affected = $stmt->execute();
		$insertId;
		if($affected > 0){
			$insertId = $this->dbCon->lastInsertId();
		}
		return $insertId;
	}
    public function f_update($obj){
		if (!($obj instanceof DocObj)){
			throw new Exception("invalid argument");
		}
		$id = $obj->getId();
	    $url = $obj->getUrl();
	    $document = $obj->getDocument();
	    $note = $obj->getNote();
        $varDate = $obj->getVarDate();
        $views = $obj->getViews();
        
		$sql = "UPDATE DocObj SET url = :url, document = :document, note = :note, varDate = :varDate, views = :views WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':url', $url);
		$stmt->bindParam(':document', $document);
		$stmt->bindParam(':note', $note);
		$stmt->bindParam(':varDate', $varDate);
        $stmt->bindParam(':views', $views);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    public function f_delete($id){
		if(!is_numeric($id)){
			throw new Exception('invalid argument');
		}
		$sql = "DELETE FROM DocObj WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    public function f_search($id){
		if(!is_numeric($id)){
			throw new Exception('invalid argument');
		}
		$sql = "SELECT * FROM DocObj WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        
		$temp = $stmt->fetch();
        $docObj = new DocObj();
        
        $docObj->setId($temp["id"]);
        $docObj->setUrl($temp["url"]);
        $docObj->setDocument($temp["document"]);
        $docObj->setNote($temp["note"]);
        $docObj->setVarDate($temp["varDate"]);
        $docObj->setViews($temp["views"]);
        
        return $docObj;
	}
    public function f_list(){
		$sql = "SELECT * FROM DocObj ORDER BY varDate, id DESC";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        
        $temps = $stmt->fetchAll();
        $docObjs = array();
        foreach($temps as $temp){
            $docObj = new DocObj();
            $docObj->setId($temp["id"]);
            $docObj->setUrl($temp["url"]);
            $docObj->setDocument($temp["document"]);
            $docObj->setNote($temp["note"]);
            $docObj->setVarDate($temp["varDate"]);
            $docObj->setViews($temp["views"]);
            
            $docObjs[] = $docObj;
        }
        
        return $docObjs;
	}
    
    public function f_searcWithParams($params){
		if(!is_array($params)){
			throw new Exception('invalid argument');
		}
		$sql = "SELECT * FROM DocObj";
        $whereQ = array();
        $queryV = array();
        foreach($params as $key=>$value){
            if(is_array($value)){
                $val = $value[0];
                $op = ($value[1])?$value[1]:"=";
                $whereQ[] = $key." ".$op." :".$key;
                $aKey = ":".$key;
                $queryV[$aKey] = $val;
            }
        }
        if(!empty($whereQ)){
            $sql = "SELECT * FROM DocObj WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
		
        $temps = $stmt->fetchAll();
        $docObjs = array();
        foreach($temps as $temp){
            $docObj = new DocObj();
            $docObj->setId($temp["id"]);
            $docObj->setUrl($temp["url"]);
            $docObj->setDocument($temp["document"]);
            $docObj->setNote($temp["note"]);
            $docObj->setVarDate($temp["varDate"]);
            $docObj->setViews($temp["views"]);
            
            $docObjs[] = $docObj;
        }
        
        return $docObjs;
	}
	
}

?>