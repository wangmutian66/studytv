	<?php
	if($_POST['name']=='2')
	{
		$url = "http://wxpayapi.99zan.net/api.php?/check&wx_id=zhuqishoufeu&qr_id=3&openid=damao";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$output = curl_exec($ch);
		curl_close($ch);
		$result = $output;
		echo $result;
	}else{
		$url = "http://wxpayapi.99zan.net/api.php?/get_img&wx_id=zhuqishoufeu&qr_id=3&openid=damao";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$output = curl_exec($ch);
		curl_close($ch);
        $result = $output;
		// $result = json_decode($result);
		echo $result;

	}
	?>