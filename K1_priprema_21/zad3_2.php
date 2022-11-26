<?php
    require_once("funkcije.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="stilovi.css">
</head>
<body>
<h1>Racun kupovine</h1>
<h3>Izaberite proizvod za kupovinu</h3>
<form action="zad3_2.php" method="get">
    <?php
    //Provera da li datoteka postoji, pošto je otvaramo u read modu
        if(file_exists("proizvodi.txt")){
            //Pokušaj otvaranja datoteke
            $file=fopen("proizvodi.txt", "r");
            //provera da li je datoteka otvorena
            if(!$file)
            {
                echo poruke("Neuspelo otvaranje datoteke!!!");
            }
            else
            {
                //Generisanje HTML koda za select element
                echo '<select name="idProizvoda" id="idProizvoda">
                    <option value="0" selected>--Izaberite proizvod--</option>';
                //Čitanje red po red i ispis na stranici u paragrafima
                while($red=fgets($file)){
                    $podaci=explode("|", $red);
                    //Generisanje  HTML koda za option elemente
                    echo "<option value='".$podaci[0]."'>".$podaci[1]." (".$podaci[2]." din.)</option>";
                }
                fclose($file);
                echo "</select><br><br>";
                //Generisanje HTML koda za button element
                echo '<button type="submit">Kupi proizvod</button>';
            }
        }
        else
            echo poruke("Datoteka ne postoji",1);
		//echo '<div style="width:150px; height:20px; border: solid blue; background-color:blue; color:yellow; font-weight:bold;">Datoteka ne postoji</div>';
    ?>
</form>
<?php
    //Kod za ubacivanje proizvoda u "kupljeni.txt"
    //Provera da li postoji id proizvoda za kupovinu
    if(isset($_GET['idProizvoda']) )
    {
        //Čitanje id-ja i konverzija u broj
        $idProizvoda=intval($_GET['idProizvoda']);
        //Provera ispravnosti id-je proizvoda
        if($idProizvoda==0 or $idProizvoda=="")
            echo poruke("Neodgovarajući proizvod!!!");
        else
        {
            //Čitanje proizvodi.txt
            $file=fopen("proizvodi.txt", "r");
            $podaciZaUpis="";
            //Pretraga da se nađe proizvod koji odgovara unetom id-ju
            while($red=fgets($file)){
                $podaci=explode("|", $red);
                //Provera da li je to odgovarajući proizvod
                if($idProizvoda==$podaci[0])           {
                    $podaciZaUpis=$red;
                    //Ako smo našli proizvod, nema potrebe da dalje pretražujemo
                    fclose($file);
                    break;
                }
            }
            //Provera da li je nađen proizvod
            if($podaciZaUpis=="")
                echo poruke("Nije nađen proizvod!!!", 1);
            else
            {
                //upis proizvoda u kupljeni.txt
                $file2=fopen("kupljeni.txt", "a");
                fwrite($file2,$podaciZaUpis);
                fclose($file2);
            }

        }
    }
?>

<h3>Kupljeni proizvodi</h3>
<p>
    <?php
    //Provera da li datoteka postoji, pošto je otvaramo u read modu
    if(file_exists("kupljeni.txt")){
        //Pokušaj otvaranja datoteke
        $file=fopen("kupljeni.txt", "r");
        //provera da li je datoteka otvorena
        if(!$file)
        {
            echo poruke("Neuspelo otvaranje datoteke!!!");
        }
        else
        {
            $suma=0;
            //Čitanje red po red i ispis na stranici u paragrafima
            while($red=fgets($file)){
                $podaci=explode("|", $red);
                    echo "<p class='sadrzaj'>";
                    echo "ID: <b>".$podaci[0]."</b><br>";
                    echo "Naziv: <b>".$podaci[1]."</b><br>";
                    echo "Cena: <b>".$podaci[2]." din.</b>";
                    echo "</p>";
                    $suma+=intval($podaci[2]);
               
            }
            echo "<h4>UKUPNO: $suma</h4>";
        }
    }
    else
        echo poruke("Nemate kupljen ni jedan proizvod", 1);
    ?>
</p>
</body>
</html>