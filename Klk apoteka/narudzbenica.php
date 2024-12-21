<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apoteka</title>
</head>
<body>
    <h1>Online apoteka</h1>
    <h2>Kupljeni proizvodi </h2>

    <?php

    $fp=fopen('narudzbina.txt', 'r');
    flock($fp,LOCK_SH);
    if(!$fp)
    {
        echo"Pokusajte ponovo";
        exit;
    }

    while(feof($fp))
    {
        $order=fgets($fp);
        echo $order . "<br>";
    }

    fclose($fp);



    ?>

</body>
</html>