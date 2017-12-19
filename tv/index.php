<?php
include 'init.php';



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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui" />
	<title>大猫电视</title>
	<script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="cctv-list" id="channels-list"></div>
	 <script type="text/javascript">

        //document.title="龙江视频-在线直播";
    	$("nav,.bottom-navigation").hide();
         
        var data=<?php echo $heilongjiang; ?>; 
        var str='<ul id="tv-list">';
        for(var i in data["channels"]){
            row=data["channels"][i];
        
       

            str+='<li data-href-url="http://tv.99zan.net/channels.php?rowid='+row["id"]+'" data-channel_id="1" class="ott">';
			str+='  <div class="img-placeholder">';
			console.log(row["id"]);  
			console.log(data["preview_imgs"][row["id"]]);  
			str+='    <img src="'+data["preview_imgs"][row["id"]]+'">';
			  
			str+='  </div>';
			str+='  <strong class="chn-name cctv">';
			    
			    
			str+='     <em class="ico" style="background-image: url('+row["logo"]["url"]+');"></em>';
			    
			str+='    <span>'+row["name"]+'</span>';
			str+='  </strong>';
			  
			tv_items=data["tv_items"][row["id"]];
            if(tv_items!=undefined){
				str+='    <span class="current">';
				str+= tv_items['current']['starttime'];
				str+='      <span class="tv-name">'+tv_items['current'].name+'</span>';
				str+='    </span>';
				  
				  
				str+='    <span class="next">';
				str+='      '+tv_items['next']['starttime'];
				str+='      <span class="tv-name">'+tv_items['next']['name']+'</span>';
				str+='    </span>';
		    } 
			  
			str+='</li>';
        }  
        str+="</ul>";
        $("#channels-list").html(str);

        $("#channels-list ul li").click(function(){
        	var hrefurl=$(this).attr("data-href-url");
        	window.location.href=hrefurl;
        });

        function getCookie(name)
		{
		var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
		if(arr=document.cookie.match(reg))
		return unescape(arr[2]);
		else
		return null;
		}

		function setCookie(name,value)
		{
		delCookie(name); 
		var Days = 30;
		var exp = new Date();
		exp.setTime(exp.getTime() + Days*24*60*60*1000);
		document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
		}

		function delCookie(name)
		{
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var cval=getCookie(name);
	    
		if(cval!=null)
		document.cookie= name + "="+cval+";expires="+exp.toGMTString();
		}
        window.onload=function(){
        	//alert("注入cookie");
        	//Hm_lvt_ae0304f5e04fe98e1072b4c093b68eba=1502327223; Hm_lpvt_ae0304f5e04fe98e1072b4c093b68eba=1502327223
        	setCookie('Hm_lpvt_ae0304f5e04fe98e1072b4c093b68eba','1502327223')
			setCookie('Hm_lvt_ae0304f5e04fe98e1072b4c093b68eba','1502327223')
			setCookie('OL_38015be6','ImEwMDViZGFiNWM0OTg0N2FjOTU1ZTVkMGQxZmMzZmVkNTM4YjZlODQ4MTcyOGRjOTEzZjZiYzU0YzUyNGY3ZTMi--a1f6ea137db6e566b92576ffbb86483a4a7928db')
			setCookie('IM_7df03bda','Im81OTZ2amdWWGV4WGxzbEp2MzAzbGg2ckV1UFki--48510dde676389abd7fd6e153e6850aeece991ee')
			setCookie('_imobiletv_session','d4a8b7e328c2c392392264054c0c1218') 

            

        }
		  


    </script>
</body>
</html>


