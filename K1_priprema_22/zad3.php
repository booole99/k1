<?php
    function razlika($ukupno){
        if($ukupno<time()){
            $protekloVreme=time()-$ukupno;
            $dani=floor($protekloVreme/60/60/24);
            $satiPreostalo=$protekloVreme-$dani*24*60*60;
            $sati=floor($satiPreostalo/60/60);
            $minutiPreostalo=$satiPreostalo-$sati*60*60;
            $minuti=floor($minutiPreostalo/60);
            return $dani." dana, ".$sati." sati, ".$minuti." minuta";
        }
        else
            return "Izaberite datum pre danasnjeg datuma!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zadatak 3</h1>
    <form action="zad3.php" method="get">
        <input type="date" name="datum"><br><br>
        <input type="time" name="vreme"><br><br>
        <button>Prikaži</button>
    </form>
    <hr>
    <?php
        if(isset($_GET['datum']) AND isset($_GET['vreme'])){
            $datum=$_GET['datum'];
            $vreme=$_GET['vreme'];
            $ukupno=strtotime($datum." ".$vreme.":00");
            echo date("d.m.Y H:i:s", $ukupno)."<br>";
            echo razlika($ukupno);
        }
    ?>
</body>
</html>