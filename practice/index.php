<?php
include_once "./controllers/TestController.php";
$mainController = new MainContoroller();
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
	<h1>회원가입 페이지 1단계</h1>
	
	<h3>
		안녕. <?php echo $_GET['name']; ?>님
	</h3>
	
	<form method="post" action="index.php">
		<input type="text" name="name">
		<input type="submit">
	</form>
	<ol>
		<li><a href="index.php?mode=step_01">약관동의</a></li>
		<li><a href="index.php?mode=step_02">본인확인</a></li>
		<li><a href="index.php?mode=step_03">회원정보입력</a></li>
		<li><a href="index.php?mode=regist">회원가입처리 단계</a></li>
		<li><a href="index.php?mode=complete">회원가입완료</a></li>
	</ol>

	<p>
		function test
	</p>
	
	<pre>
		문자열 확인 함수 strlen()
	</pre>
	<?php
		$str = "hello.
		my name is jisoo";
		echo strlen($str);
	?>

	<?php
		echo nl2br($str);
	?>

    <?php 
        print_r($mainController->getList());
    ?>
	<ol>
		<li><a href="practice1.php">연습1</a></li>
		<li><a href="practice2.php">연습2 - 조건문</a></li>
		<li><a href="practice3.php">연습3 - 반복문</a></li>
        <li><a href="practice4.php">연습4 - 배열</a></li>
	</ol>

    <form action="Create.php" method="post">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <input type="submit">
    </form>
	
 </body>
</html>