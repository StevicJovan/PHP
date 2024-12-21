<?php
$andol=$_POST['andol'];
$aspirin=$_POST['aspirin'];
$vitamin=$_POST['vitamin'];
$adresa=$_POST['adresa'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Apoteka - narudzbina </h2>
    <h2>Fiskalni racun</h2>

    <?php
    $date= date(DATE_RFC2822);
    echo "Roba narucena u: " . $date . "<br> <br>";
    
    echo "Kupili ste sledece artikle: " . "<br> <br>";

    $ukupno= $andol + $aspirin + $vitamin ;
    echo "Kupljenih prozivoda: " . $ukupno . "<br>";

    if($andol>0)
    {
        echo $andol . " andola" . "<br>";

        if($aspirin>0)
        {
        echo $aspirin. " aspirina" . "<br>";
        }

        if($vitamin>0)
        {
        echo $vitamin. " vitamina C" . "<br> <br>";
        }

    }

    define("andolcena",1200);
    define("aspirincena" ,300);
    define("vitamincena" ,400);

    $suma=0;
    $suma= $andol * andolcena + $aspirin * aspirincena + $vitamin * vitamincena;
    echo "Racun - suma = " . number_format($suma, 2, "," , ".") . "<br> <br>";

    $porez= 0.08;
    $porez = $suma * (1 + 0.08);

    echo "Racun sa porezom: " . number_format($porez , 2, "," , ".") . "<br> <br>";

    echo "Adresa za isporuku je: " . $adresa . "<br><br>"; 

    $izlaz = $date . ">>>>>\t" . $andol . " andola , \t" . $aspirin . " aspirina ,\t" 
    . $vitamin . " vitamina C, \t" . $suma . "\t" . $porez . "\t" . $adresa . "\n\n";


    $fp=fopen('narudzbina.txt', 'a' );

    flock($fp,LOCK_EX);

    if(!$fp)
    {
        echo "Nije moguce odraditi vasu narudzbinu";
        exit;
    }

    fwrite($fp,$izlaz);

    flock($fp,LOCK_UN);

    fclose($fp);

    echo "Podaci su upisani u fajl!!!";


    ?>
</body>
</html>