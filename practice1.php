<?php
# DB 연동해서 데이터 불러오기
#MVC
#Model
#View
#Controller
$list = [
	['id' => 1, 'name' => "일" ],
	['id' => 2, 'name' => "이" ]
];


//$s_asd = ["a", "b"];

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
	<h1>Practice1</h1>
	<ol>
		<li><a href="practice1.php">init</a></li>
		<li><a href="practice1.php?id=a">A</a></li>
		<li><a href="practice1.php?id=b">B</a></li>
		<li><a href="practice1.php?id=c">C</a></li>
	</ol>
	
	<h2>
		연습1<br>
		<?php foreach($list as $row) { ?>
		<?=$row['id']?>/<?=$row['name']?><br>
		<?php } ?>
	</h2>

	<h2>
		연습2<br>
		<?php
			var_dump('11111');
		?>
	</h2>
	<p>
		<?php
			echo file_get_contents("data/".$_GET['id'].".txt");	
		?>
	</p>
 </body>
</html>