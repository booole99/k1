<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zadatak 2</h1>
    <form action="zad2.php" method="get">
      <label for="datum">Datum vaseg rodjenja:</label><br><br>
      <input type="date" name="datum" id="datum"><br><br>
      <button type="submit">Prikazi</button><br>
    </form>
    <?php
        if(isset($_GET['datum']))
        {
            $rodjenje=strtotime($_GET['datum']);
            $danas=strtotime('today');
            echo "Za datum rodjenja izabrali ste: " . date('d. m. Y.',$rodjenje);
            echo "<br>";
            $i=0;
            if($rodjenje<$danas){
                while($rodjenje<$danas){
                    
                    echo $i.'. '.date('d. m. Y. - l',$rodjenje).'<br>';
                    $i++;
                    $rodjenje= strtotime("+1 year",$rodjenje);
                } 
            }else
                echo "Izaberite datum pre danasnjeg datuma!";
        } 
    
    ?> 
</body>
</html>