<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zadatak 1</h1>
    <form action="zad1.php" method="get">
        <input type="date" name="datum1"><br><br>
        <input type="date" name="datum2"><br><br>
        <button>Prikaži</button>
    </form>
    <hr>
    
    <?php
        if(isset($_GET['datum1']) AND isset($_GET['datum2'])){
            $datum1=strtotime($_GET['datum1']);
            $datum2=strtotime($_GET['datum2']);
            //echo $datum1." ".$datum2."<br>";
         
            if($datum2>$datum1){
                $razlika=$datum2-$datum1;
                $razlikaUDanima=$razlika/60/60/24;
                echo "Broj dana od ".date("d.m.Y", $datum1)." do ".date("d.m.Y", $datum2)." je: ".$razlikaUDanima;
            }else
                echo "Greška. Izaberite dobar opseg datuma.";
        }
    ?>
    
</body>
</html>