<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Petak 13</title>
</head>
<body>
<h2>Zadatak 3</h2>
    <p style="text-align:justify;">Unosi se datum. Napisati PHP skript koji prikazuje sve dane, po godinama, za petak 13.-ti od unetog datuma do trenutnog datuma. <br>
        Ukoliko korisnik ne unese datum,  ispisati poruku "Niste uneli početni datum".
     </p>
<form action="zad2_2.php" method="get">
    Unesite pocetni datum:<input type="date" name="pocetniDatum"><br>
    <input type="submit" name="btn_prikazi" value="Prikazi">
</form>

<?php
//Provera da li je korisnik kliknuo na dugme Posalji
if(isset($_GET["btn_prikazi"])){
    $pocetniDatum=strtotime($_GET["pocetniDatum"]);

//Provera da li je unet pocetni datum	
	if($pocetniDatum=="")
	{echo "Niste uneli početni datum!<br>";exit;}	

	//else
	//{	
    
    //trenutno vreme u timestampu
    $trenutnoVreme=mktime(0,0,0,date("m"),date("d"),date("y"));
    
    //Pretraga za datumom od pocetnog do trenutnog datuma 
    while ($pocetniDatum<=$trenutnoVreme){
	if(date("d",$pocetniDatum)==13)//ispitivanje da li je datum 13.
    break;
	$pocetniDatum+=(60*60*24);//pomeraj za jedan dan  
	}
	//Pretraga za danom u nedelji od pocetnog do trenutnog datuma 
    while ($pocetniDatum<=$trenutnoVreme){

        //ispitivanje da li je dan u nedelji petak
        if(date("N",$pocetniDatum)==5)
            echo date("d.m.Y",$pocetniDatum)."<br>";

        //pomeranje datuma za 1 mesec unapred
        $pocetniDatum=strtotime("+1 month", $pocetniDatum);
    //}
	}
}
?>
</body>

</html>