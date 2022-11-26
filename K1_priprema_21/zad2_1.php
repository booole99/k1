<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zadatak 2</title>
</head>
<body>
    <h2>Zadatak 2</h2>
    <p style="text-align:justify;">Unose se datumi rođenja članova porodice. Napisati PHP skript kojim se vrši sortiranje
        datuma, u opadajućem redosledu i prikazuje broj godina svakog člana. <br>
        Ukoliko korisnik unese  neki od datuma rođenja da je veći od tekućeg, ispisati za broj godina "nije rođen".
     </p>
<!--forma sa tabelom radi bolje organizacije elemenata. -->
<form action="zad2_1.php" method="GET">
    <table>
        <tr>
            <td>
                Član 1
            </td>
            <td>
                <input type="date" name="clan1">
            </td>
        </tr>
        <tr>
            <td>
                Član 2
            </td>
            <td>
                <input type="date" name="clan2">
            </td>
        </tr>
        <tr>
            <td>
                Član 3
            </td>
            <td>
                <input type="date" name="clan3">
            </td>
        </tr>
        <tr>
            <td>
                Član 4
            </td>
            <td>
                <input type="date" name="clan4">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btn_posalji" value="Posalji">
            </td>
        </tr>
    </table>
</form>
<!--PHP kod -->
<?php
//Provera da li je korisnik kliknuo na dugme Posalji
if (isset($_GET["btn_posalji"])) {
    
    //Ucitavanje prosledjenih datuma i smestanje u niz
    $clanovi = [$_GET["clan1"], $_GET["clan2"], $_GET["clan3"], $_GET["clan4"]];
	//var_dump($clanovi);

    //Provera da li je korisnik uneo sve datume
	if($_GET["clan1"]=="" or $_GET["clan2"]=="" or $_GET["clan3"]="" or $_GET["clan4"]=="")
	{echo "Niste naveli datume!<br>";}
    
	else
	{	
    //Sortiranje niza u opadajuće redosledu
    for ($i = 0; $i < count($clanovi) - 1; $i++) {
        for ($j = $i + 1; $j < count($clanovi); $j++) {
            //Koristimo funkciju strtotime da prosledjeni string format datuma prebaci u timestamp
            if (strtotime($clanovi[$i]) > strtotime($clanovi[$j])) {
                $tmp = $clanovi[$i];
                $clanovi[$i] = $clanovi[$j];
                $clanovi[$j] = $tmp;
            }
        }
    }
    echo "<br> <h2>Clanovi porodice poređani po starini:</h2><br>";
    
	//ispis clanova
	    for ($i = 0; $i < count($clanovi); $i++) {
    
	//Broj godina dobija se kada se izracuna razlika sekundi od trenutnog datuma i datuma rodjenja,
	//podelimo sa brojem sekundi u jednom danu koje pomnožimo sa brojem dana u godini (60*60*24*365)
    //koristimo mktime funkciju za racunanje broja sekundi tekuceg datuma

    $brojGodina = (mktime(0, 0, 0, date("m"), date("d"), date("y")) - strtotime($clanovi[$i])) /(60 * 60 * 24*365);
    
    //Proveravamo da li je korisnik uneo datum "veci" od trenutnog
    if ($brojGodina < 0)
            $brojGodina = "nije rođen";
        echo ($i+1).". po starosti star je:$brojGodina godine<br>";
    }
	}
	}
?>
</body>
</html>