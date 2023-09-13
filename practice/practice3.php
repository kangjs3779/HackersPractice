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
	<h1>반복문 연습!</h1>
    
    <h3>for문</h3>
    <p>
        <?php
            $star = "*";

            for($i = 0; $i < 5; $i++) {
                echo $star;
                echo "<br>";
                $star .= "*";
            }
        ?>
    </p>

    <h3>while문</h3>
    <p>
        <?php
            $star = "*";
            $i = 0;

            while ($i < 5) {
                echo $star;
                echo "<br>";
                $star .= "*";
                $i++;
            }
        ?>
    </p>

    <h3>foreach문</h3>
    <p>
        <?php
            $arr = array(1, 2, 3, 4, 5);
            foreach ($arr as $val) {
                $val = $val * 2;
                echo $val;
                echo "<br>";
            }
        ?>
    </p>
 </body>
</html>
