<?php
//include 'init.php';
$rowid=$_GET["rowid"];

switch ($rowid) {
	case '1':
		$sublevel='2705';
		break;
    case '2':
		$sublevel='2738';
		break;
	case '3':
		$sublevel='2712';
		break;
    case '4':
		$sublevel='2014';
		break;
	case '7':
		$sublevel='2713';
		break;
    case '8':
		$sublevel='2714';
		break;
	case '9':
		$sublevel='2739';
		break;
    case '10':
		$sublevel='2715';
		break;
	case '11':
		$sublevel='2740';
		break;
    case '13':
		$sublevel='2741';
		break;
	case '14':
		$sublevel='2005';
		break;
    case '15':
		$sublevel='2742';
		break;	
    case '16':
		$sublevel='2013';
		break;
	case '17':
		$sublevel='2012';
		break;
    case '18':
		$sublevel='2007';
		break;
	case '29':
		$sublevel='2709';
		break;	
	case '39':
		$sublevel='2707';
		break;	
	case '41':
		$sublevel='2701';
		break;		
	case '60':
		$sublevel='2702';
		break;	
	case '389':
		$sublevel='2706';
		break;	
	case '462':
		$sublevel='2306';
		break;	
	case '463':
		$sublevel='2302';
		break;	
	case '464':
		$sublevel='2303';
		break;	
	case '465':
		$sublevel='2304';
		break;	
	case '466':
		$sublevel='2305';
		break;	
	case '467':
		$sublevel='2301';
		break;	
	case '468':
		$sublevel='2711';
		break;			
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui" />


	<title>大猫电视</title>
    
    <link href="./css/video.css" rel="stylesheet">
    <script src="./js/video.js"></script>
    <script src="./js/videojs-live.js"></script>
</head>
<body>

 <video id="my_video_1" class="video-js vjs-default-skin" controls preload="auto" width="1000" height="500" 
  data-setup='{}'>
    <source src="http://scc.96396.cn:20238/uid$99/stamp$1502433133/keyid$69305520/auth$1929d055068a83cd2e18519002a4c07b/a000000000000000000000000000<?php echo $sublevel; ?>.m3u8?bke=scc.96396.cn&type=get_m3u8&host=scc.96396.cn:20228&port=20227&zip=1&proto=9&ext=qtype:400,sublevel:<?php echo $sublevel; ?>,b2c:2,starttime:,endtime:,oid:30160,eid:909191,code:,f:0,p:0,m:1" type="application/x-mpegURL">
  </video>
  
  <script>
  </script>




</body>
</html>
