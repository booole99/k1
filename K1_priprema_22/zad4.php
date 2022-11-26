<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zadatak 4</h1>
    <form action="zad4.php" method="post">
        <input type="text" name="naslov" placeholder="Unesite naslov"><br><br>
        <textarea name="tekst" cols="20" rows="10" placeholder="Unesite tekst"></textarea><br><br>
        <button>Snimite vest</button>
    </form>
    <hr>
    <?php
        $putanja="datoteke/vesti.txt";
        if(isset($_POST['naslov']) and isset($_POST['tekst'])){
            $naslov=$_POST['naslov'];
            $tekst=$_POST['tekst'];
            if($naslov!="" and $tekst!=""){
                $stringZaUpis=date("d.m.Y H:i:s")."\n{$naslov}\n{$tekst}\n\n";
                $file=fopen($putanja, "a");
                fwrite($file, $stringZaUpis);
                fclose($file);
            }
            else
                echo "Morate uneti sve podatke!!!<hr>";
        }
        if(file_exists($putanja)){
            $sadrzaj=file_get_contents($putanja);
            $sadrzaj=nl2br($sadrzaj);
            echo $sadrzaj;
        }
        else
            echo "Datoteka ne postoji!!!!";
    ?>
</body>
</html>