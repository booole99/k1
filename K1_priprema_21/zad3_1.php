<?php
require_once("funkcije.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="stilovi.css"/>
</head>
<body>
<h2>Zadatak 4</h2>
    <p style="text-align:justify;">Kreirati datoteku proizvodi.txt sa stavkama kupovine.
    Novu stavku kupovine upisati na kraju datoteke. Upisuje se id, naziv i cena artikla.<br>
    Za slucaj uspesnog upisa i citanja prikazati poruke.  
     </p>
<h1>Upis u datoteku</h1>
<h3>Unesite proizvod</h3>
<form action="zad3_1.php" method="post">
    <input type="number" min="1" max="10" step="1" value="1" name="id" id="id"/> id proizvoda<br><br>
    <input type="text" name="naziv" id="naziv" placeholder="Unesite naziv"/> naziv proizvoda<br><br>
    <input type="number" min="1" max="1000" step="1" value="1" name="cena" id="cena"/> cena proizvoda<br><br>
    <button type="submit">Snimi proizvod</button>
</form>
<?php
    //Provera da li su podaci za upis poslati
    if(isset($_POST['id']))
    {
        //Čitanje podataka
        $id=$_POST['id'];
        $naziv=$_POST['naziv'];
        $cena=$_POST['cena'];
        //provera ispravnosti unosa
        if($id=="0" or $id=="" or $naziv=="" or $cena=="0" or $cena=="")
        {echo poruke("Niste uneli sve podatke!!!");}
        else
        {
            //Pokušaj otvaranja datoteke u append modu
            $file=fopen("proizvodi.txt", "a");
            //Provera da li je datoteka otvorena
            if(!$file)
            {
                echo poruke("Neuspelo otvaranje datoteke!!!");
            }
            else
            {
                //generisanje stringa za upis u datoteku
                $stringZaUpis=$id."|".$naziv."|".$cena."\r\n";
                //Upis
                fwrite($file, $stringZaUpis);
                //zatvaranje datoteke
                fclose($file);
                echo poruke("Uspešno snimljeni podaci", 2);
				//echo '<div style="width:200px; height:20px; border: solid blue; background-color:green; color:yellow; font-weight:bold; margin-top:10px;">Uspešno snimljeni podaci</div>';
            }
        }
    }
?>
<h3>Uneti proizvodi</h3>
<p>
    <?php
        //Provera da li datoteka postoji, pošto je otvaramo u read modu
        if(file_exists("proizvodi.txt")){
            //Otvaranje datoteke za citanje
            $file=fopen("proizvodi.txt", "r");
            //provera otvoranja datoteke za citanje
            if(!$file)
            {
                echo poruke("Neuspelo otvaranje datoteke!!!");
            }
            else
            {
                //Čitanje red po red i ispis na stranici u paragrafima
                while($red=fgets($file)){
                    $podaci=explode("|", $red);
                    echo "<p class='sadrzaj'>";
                    echo "ID: <b>".$podaci[0]."</b><br>";
                    echo "Naziv: <b>".$podaci[1]."</b><br>";
                    echo "Cena: <b>".$podaci[2]." din.</b>";
                    echo "</p>";
                }
                fclose($file);
            }
        }
        else
         echo poruke("Datoteka ne postoji", 1);
    ?>
</p>
</body>
</html>