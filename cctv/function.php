<?php
	function sendSMS($mobile, $code) {
		
		$uid = "57665";		//数字用户名
		$pwd = "h5ef92";		//密码

		$content = urlencode(iconv('UTF-8', 'GB2312', "您的验证码为 " .$code." 【大猫电视】"));		//内容

		$http = 'http://http.yunsms.cn/tx/';

		$data = array(
			'uid'=>$uid,					//数字用户名
			'pwd'=>strtolower(md5($pwd)),	//MD5位32密码
			'mobile'=>$mobile,				//号码
			'content'=>$content,			//内容 如果对方是utf-8编码，则需转码iconv('gbk','utf-8',$content); 如果是gbk则无需转码
		);
         
		$post='';
		$row = parse_url($http);
		$host = $row['host'];
		$port = $row['port'] ? $row['port']:80;
		$file = $row['path'];

		while (list($k,$v) = each($data))
		{
			$post .= rawurlencode($k)."=".rawurlencode($v)."&";	//转URL标准码
		}

		$post = substr( $post , 0 , -1 );
		$len = strlen($post);
		$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
        
		if (!$fp) {
			return false;
		} else {
			$receive = '';
			$out = "POST $file HTTP/1.0\r\n";
			$out .= "Host: $host\r\n";
			$out .= "Content-type: application/x-www-form-urlencoded\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Content-Length: $len\r\n\r\n";
			$out .= $post;
            
			fwrite($fp, $out);
            
			while (!feof($fp)) {
				$receive .= fgets($fp, 128);
			}

			fclose($fp);

			$receive = explode("\r\n\r\n",$receive);

			unset($receive[0]);
            
			$re = implode("",$receive);
         
          
			return trim($re) == '100'? true : false;
		}
	}

	function check_mobile($mobile){
		return preg_match("/^1[3578]\\d{9}$/", $_POST['mobile']);
	}
     
    function allow_mobile($mobile){
    	$mob_array=array(
    		"18745016473",
    		"15004547218",
    		"13936581248",
    		"13904810979",
    		"15590890308",
    		"15776452841",
    		"18103632987",
    		"18246130572",
    		"18246081268",
    		"13936562051",
			"15145110657",
    		"13249747769");

        return in_array($mobile,$mob_array);
    } 




