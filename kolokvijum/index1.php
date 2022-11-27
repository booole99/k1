<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$putanja4="sadrzaj.txt";
    $file = fopen($putanja4, "r") or die("Greska");
    while (!feof($file)){
        $temp=explode("#", fgets($file));
        for($i=0; $i<count($temp); $i++){
          echo $temp[$i]."<br>";
       }
    }
    ?>
    
</body>
</html>