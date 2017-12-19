<?php





    $timestamp=time();
    $url="http://tv.99zan.net/gps/index4.php";
    $noncestr=create_password(15);
 
    $appid="wx04c33fb26c909219";
    $appSecret="c524a3d5e212613d6ad7f8e0ac618b92";
    $access_token=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appSecret);
   
    $access_token=json_decode($access_token,true);
    $access_token=$access_token["access_token"];
    $ticket=file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$access_token."&type=jsapi");
    $jsapi_ticket=json_decode($ticket,true);
    $jsapi_ticket=$jsapi_ticket["ticket"];
 
    $str = "jsapi_ticket=".$jsapi_ticket."&noncestr=".$noncestr."&timestamp=".$timestamp."&url=".$url; 
                                                                     
    	
    $signature=sha1($str);

  
   
    function create_password($pw_length = ''){ 
    
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
		$password =''; 
		for ( $i = 0; $i < $pw_length; $i++ ) 
		{ 
		    $password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
		} 
		return $password; 
	} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="text/javascript" src="http://www.zhuqiyun.com/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="./js/mapnew.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=lnEXnENwerw7FOR9otv8o1AwTUKr3IcS"></script>
	<script type="text/javascript">
        
        $(document).ready(function(){
        	wx.config({
		        debug: false,// 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		        appId: "<?php echo $appid; ?>",// 必填，公众号的唯一标识
		        timestamp: "<?php echo $timestamp; ?>",// 必填，生成签名的时间戳
		        nonceStr: "<?php echo $noncestr; ?>",// 必填，生成签名的随机串
		        signature: "<?php echo $signature; ?>",// 必填，签名，
		        jsApiList: [ 
		        'getLocation',
		        //'openLocation'
		      ] 
		    });
            var winw=$(window).width();
            var winh=$(window).height();
            $("#allmap").css({"width":winw,"height":winh});



            wx.ready(function(){
            	
            });
             
            
        });
        
        function sub(){
            var imei=$("#imei").val();
            wx.getLocation({
			    type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
			    success: function (res) {
			    
			        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
			        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
			        var speed = res.speed; // 速度，以米/每秒计
			        var accuracy = res.accuracy; // 位置精度

                    $.ajax({
		            	url:"./ShowMonitorTips.php",
		            	type:"POST",
		            	data:{num:imei},
		            	dataType:"json",
		            	success:function(data){
		            	    
		                    var Result=data.Result;

                            var Lng=Result.Lng;
                            var Lat=Result.Lat;
                            console.log("latitude:"+latitude);
                            console.log("longitude:"+longitude);
                            console.log("Lat:"+Lat);
                            console.log("Lng:"+Lng);

                            map_init(longitude,latitude,Lng,Lat);           

		            	}
		            });

			    }
			});
        }   
            
			
	
	</script>

</head>
<body>
    <div class="" style="position: relative; z-index: 5;">
    	 <input type="text" value="517071900784" placeholder="请输入IMEI号" id="imei">
    	 <input type="button" value="确定" onclick="sub()">
    </div>
	<div id="allmap" style="width:100%; height:100%; position: absolute; top:0; left:0; right:0; bottom: 0;z-index: 4;"></div>
</body>
</html>