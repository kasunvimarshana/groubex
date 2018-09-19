<?php
ob_start();
require_once("../util/MyInit.php");
	$docObj = new DocObj();
    $docObjBoImpl = new DocObjBoImpl();

    if(isset($_GET["id"])){
       $id = $_GET["id"];
       $docObj = $docObjBoImpl->f_search($id);
    }

    $tmpQrCode = $_SERVER['HTTP_HOST']."/src/view/index.php?id=".$docObj->getId();

header("Content-type: image/jpeg");  
header("Cache-Control: no-store, no-cache");  
header('Content-Disposition: attachment; filename="avatar.jpg"');
$img_data = file_get_contents("https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $tmpQrCode;?>&chs=177x177&chld=H|3");
echo $img_data;
ob_end_flush();
?>