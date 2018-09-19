<?php

    require_once("../util/MyInit.php");
	$docObj = new DocObj();
    $docObjBoImpl = new DocObjBoImpl();

    if(isset($_GET["id"])){
       global $docObj; 
       global $docObjBoImpl;
       $id = $_GET["id"];
       $docObj = $docObjBoImpl->f_search($id);
       $tmpViews = $docObj->getViews();
       $tmpViews = $tmpViews + 1;
       $docObj->setViews($tmpViews);
       $docObjBoImpl->f_update($docObj);
    }

    $arrayVideo = array('mp4');
    $arrayImage = array('jpeg', 'jpg', 'png', 'gif');
    $arrayDoc = array('pdf');

?>