<?php

    require_once("../util/MyInit.php");
    $docObjBoImpl = new DocObjBoImpl();

    if(isset($_GET["delete"])){
       global $docObjBoImpl;
       $id = $_GET["delete"];
       $docObjBoImpl->f_delete($id);
    }
    $docObjs = $docObjBoImpl->f_list();

?>