<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <!-- // $putanja="sadrzaj.txt";
    // $sadrzaj=file_get_contents($putanja);
    // $sadrzaj=str_replace("\n", "<br>", $sadrzaj);
    // echo $sadrzaj."<br><br>";

    // $putanja2="sadrzaj.txt";
    // $file = fopen($putanja2, "r") or die("Greska");
    // while(!feof($file)){
    //     echo fgets($file)."<br>";
    // }
    // echo $sadrzaj."<br><br>";

    // $putanja3="sadrzaj.txt";
    // $file = fopen($putanja3, "r") or die("Greska");
    // while(!feof($file)){
    //     echo fgetc($file)."<br>";
    // }
    // echo $sadrzaj."<br><br>";

    // $putanja4="sadrzaj.txt";
    // $file = fopen($putanja4, "r") or die("Greska");
    // while (feof($file)){
    //     $temp=explode("#", fgets($file));
    //     for($i=0; $i<count($temp); $i++){
    //         echo $temp[$i]."<br>";
    //     }
    // }

    // $putanja="sadrzaj.txt";
    // $upis="\ncetvrti red";
    // $file=fopen($putanja, "a") or die("Greska");
    // fwrite($file, $upis);
    // fclose($file);

    // $putanja="sadrzaj.txt";
    // $upis="\npeti red";
    // $file=fopen($putanja, "a") or die("Greska");
    // fwrite($file, $upis);
    // fclose($file);

    // $putanja="sadrzaj.txt";
    // $upis="\npeti red";
    // $file=fopen($putanja, "a") or die("Greska");
    // fwrite($file, $upis);
    // fclose($file); -->

    <form action="index.php" method="post">
    Ime: <input type="text" name="ime" id="ime"> <br><br>
    <select name="smer" id="smer">
    <option value="0">Izaberi smer</option>
    <?php
    $putanja = "smer.txt";
    $file=fopen($putanja, "r") or die("Greska");
    while(($red=trim(fgets($file)))!=NULL){
        echo "<option value=$red>$red</option>";
    }
    fclose($file);
    ?>
    </select><br><br>
    <button>Prikazi</button>

    <?php

    if(isset($_POST['ime'])&& isset($_POST['smer'])){
        $ime = $_POST['ime'];
        $smer = $_POST['smer'];

        $upis = $ime."-".$smer."\n";
        $putanja="studenti.txt";
        $file = fopen($putanja, "a") or die("Greska");

        fwrite($file, $upis);
        fclose($file);
    }

    $putanja="studenti.txt";
    $file=fopen($putanja, "r") or die("Greska");
    while(!feof($file)){
        echo fgets($file)."<br>";
    }

    ?>
    
    </form>

    
</body>
</html>