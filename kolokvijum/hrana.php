<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="hrana.php" method="post">
        <select name="hrana" id="hrana">
            <option value="0">Izaberite hranu</option>
            <?php
            $putanja = "hrana.txt";
            $file = fopen($putanja, "r") or die("Greska");
            while(($red=trim(fgets($file)))!=NULL){
                echo "<option value='$red'>$red</option>";
            }
            fclose($file);
            ?>
        </select> <br> <br>
        <input type="text" name="cena" id="cena" placeholder="cena"> <br> <br>
        <input type="text" name="broj" id="broj" placeholder="Broj telefona"> <br> <br>
        <button>Prikazi</button> <br>
    </form>

    <?php
    if(isset($_POST['hrana']) && isset($_POST['cena']) && isset($_POST['broj'])){
        $hrana = $_POST['hrana'];
        $cena = $_POST['cena'];
        $broj = $_POST['broj'];

        $putanja = "poruceno.txt";
        $file = fopen($putanja, "a") or die("Greska");

        $upis = $hrana."(".$cena."RSD)"."-".$broj."\n";

        fwrite($file, $upis);
        fclose($file);
    }

    $putanja="poruceno.txt";
    $file = fopen($putanja, "r") or die("Greska");
    while(!feof($file)){
        echo fgets($file)."<br>";
    }

    ?>

</body>
</html>