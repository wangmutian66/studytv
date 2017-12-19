<?php
 header('Content-Type: text/html; charset=utf-8');
 session_start();

 if(@$_SESSION["islogin"]!=1){
 	echo "<script>location.href='login.html'</script>";
 	die();
 }



?>