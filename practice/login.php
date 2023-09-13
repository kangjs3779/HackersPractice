<?php
session_start();
$_SESSION['username'] = 'testuser';
$_SESSION['userpw'] = 'testPW';
$_SESSION['veriCode'] = '12345';

echo "username : ".$_SESSION['username']."<br>";
echo "userpw : ".$_SESSION['userpw']."<br>";
echo "veriCode : ".$_SESSION['veriCode']."<br>";
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
	<h1>로그인 페이지</h1>
 </body>
</html>
