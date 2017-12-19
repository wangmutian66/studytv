<?php
$heilongjiang=file_get_contents("http://heilongjiang.imobiletv.cn/channels.json?category=cctv&_=1502330218483");
$satellite=file_get_contents("http://heilongjiang.imobiletv.cn/channels.json?category=satellite&_=1502785182548");
$hljtv=file_get_contents("http://heilongjiang.imobiletv.cn/channels.json?category=local&_=1503650085639");

$satellite=json_decode($satellite,true);
$heilongjiang=json_decode($heilongjiang,true);
$hljtv=json_decode($hljtv,true);
unset($heilongjiang["channels"][15]);
$sate_array=array("29","39","41","60");
foreach ($satellite["channels"] as $key => $value) {
     if(!in_array($value["id"],$sate_array)){
         unset($satellite["channels"][$key]);
     }
}



$heilongjiang['channels'] = array_merge($heilongjiang['channels'],$satellite['channels'],$hljtv['channels']); 
$heilongjiang['preview_imgs'] = $heilongjiang['preview_imgs']+$satellite['preview_imgs']+$hljtv['preview_imgs']; 
$heilongjiang['tv_items'] = $heilongjiang['tv_items']+$satellite['tv_items']+$hljtv['tv_items']; 



$heilongjiang=json_encode($heilongjiang);
echo $heilongjiang;
?>