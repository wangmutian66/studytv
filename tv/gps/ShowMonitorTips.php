
<?php
    //http://cha.honggps.com/api/monitor/ShowMonitorTips
    //$url="http://localhost/web_services.php";
    //$array=array("DeviceNumber"=>"517071900784");
    //P3P: CP="CAO PSA OUR"
/**
 *
Cookie: ASP.NET_SessionId=sqizgal2ttujuymbryg3zafw; UserType=1; .ASPXAUTH=766556B487F5BFDB8AB9FBB1A326854908FC72381E74220DCBB6A563E13E4CCAA409504883728D53403F139EF3A851415461914E7BADBB12466221FF0224EBBDEC055E23F013A3E81619939BCE000F53C9E1B7C1653CC8517122465DF43AE8D8522B18DEB9AE5B529968A6F055F9E5A7

*/
$num=isset($post['num'])?$post['num']:"517071900784";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://cha.honggps.com/api/monitor/ShowMonitorTips');
$headers[]='Host: cha.honggps.com';
$headers[]='Connection: keep-alive';
$headers[]='Content-Length: 31';
$headers[]='Pragma: no-cache';
$headers[]='Cache-Control: no-cache';
$headers[]='Origin: http://cha.honggps.com';
$headers[]='User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36';
$headers[]='Content-Type: application/json';
$headers[]='Accept: application/json, text/javascript, */*; q=0.01';
$headers[]='X-Requested-With: XMLHttpRequest';
$headers[]='Referer: http://cha.honggps.com/Monitor/Index';
$headers[]='Accept-Encoding: gzip, deflate';
$headers[]='Accept-Language: zh-CN,zh;q=0.8';
$headers[]='Cookie:ASP.NET_SessionId=00xgeov4otroy0oirx3zr1cv; UserType=1; .ASPXAUTH=9CE5C4FE5A4B4F990BE5BBFD9A6AAC86B62FBEA1375E2758603FBDE1CCFAC4AAD2ED414460BC8D82BEF3E204B79F6146CE2E27A2DB21B4A696F5C61C116DBC31BD57D0A9D3ECF730B4FA85DA2C6D78DA1159C46ACE4F700FF6E604CB44A9A428D34517C73BD6D758079455603A17EBF0';
curl_setopt ( $curl, CURLOPT_HEADER, 0 );
curl_setopt ( $curl, CURLOPT_HTTPHEADER, $headers );
curl_setopt ( $curl, CURLOPT_POST, 1);
//设置post数据
$post_data = array(
    "DeviceNumber"=>$num
);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
$result = curl_exec ( $curl );

?>

