<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>배열</h1>

    <p>
        <?php
            $array = array(
                "a" => "에이",
                "b" => "비",
                "c" => "씨"
            );

            echo $array['a'];
            echo "<br>";
            echo count($array);
        ?>
    </p>

    <p>
        <?php
            $arr = array(1, 2, 3, 4, '5');

            echo $arr[4];
            var_dump($arr);
        ?>
    </p>

    <p>
        <?php
            $arr1 = array('가','나','다');

            array_push($arr1, '라');
            var_dump($arr1);
        ?>
    </p>
</body>
</html>