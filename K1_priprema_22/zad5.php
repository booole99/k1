<?php
    function upis($putanja, $stringZaUpis){
        $file=fopen($putanja, "a");
        fwrite($file, $stringZaUpis);
        fclose($file);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .proizvod{
            border:1px solid black;
            margin: 2px;
            padding: 2px;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>Zadatak 5</h1>
    <form action="zad5.php" method="post">
        <input type="text" name="ime" placeholder="Unesite ime"> 
        <select name="tip" id="tip">
            <option value="0">--Izaberite tip--</option>
            <option value="Mlečni proizvodi">Mlečni proizvodi</option>
            <option value="Testo">Testo</option>
            <option value="Sokovi">Sokovi</option>
            <option value="Slatkiši">Slatkiši</option>
        </select> 
        <input type="number" name="cena" value="0"> 
        <button>Snimi podatke</button>
    </form>
    <hr>
    <?php
    $putanja="datoteke/proizvodi.txt";
    if(isset($_POST['ime']) and isset($_POST['tip']) and isset($_POST['cena'])){
        $ime=$_POST['ime'];
        $tip=$_POST['tip'];
        $cena=$_POST['cena'];
        if($ime!="" and $tip!="0" and $cena!=0){
            $stringZaUpis="{$ime}#{$tip}#{$cena}\n";
            upis($putanja, $stringZaUpis);
        }
        else
        echo "Morate uneti sve podatke!!!<hr>";  
    }
    
    if(file_exists($putanja)){
        $file=fopen($putanja, "r");
        while(($red=fgets($file))!=false){
            //$red=nl2br($red);
            $tmpNiz=explode("#", $red);
            echo "<div class='proizvod'><b>{$tmpNiz[0]}</b> ({$tmpNiz[2]} din.)<br>{$tmpNiz[1]}</div>";
        }
        
        fclose($file);
    }
    else
        echo "Datoteka ne postoji!!!!";
    ?>
</body>
</html>