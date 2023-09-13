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
	<h1>조건문 연습</h1>
	<p>
		<?php
			$num1 = 40;
			if($num1 < 30) {
				echo "30미만";
			} elseif($num1 == 30) {
				echo "30임";
			} else {
				echo "30 초과";
			}
		?>
	</p>

	<h4>
		isset() : 뱐수가 존재하는지 안하는지 확인하는 코드
	</h4>

	<p>
		<?php
			$num2 = 5;
			$result = isset($num1);

			if($result) {
				echo "맞음";
			} else {
				echo "틀림";
			}
		?>

	</p>


 </body>
</html>
