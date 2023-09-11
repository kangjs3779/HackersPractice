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
		<?php
			echo $_GET['id'];
		?>
	</h2>
	<p>
		<?php
			echo file_get_contents("data/".$_GET['id'].".txt");	
		?>
	</p>
 </body>
</html>
