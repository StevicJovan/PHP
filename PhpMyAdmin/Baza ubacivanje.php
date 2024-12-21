<?php

$mysqli= new mysqli("localhost", "root", "", "its");
    if($mysqli-> error)
        {
            echo "Ne mozete otvoriti bazu" . $mysqli -> error;
            die();
        }

        $indeks="";
        $ime="";
        $prezime="";
        $predmet="";
        $ocena="";


        if(isset($_POST['pretraga']))
        {
            $var = $_POST['nadji'];
            $upit="SELECT * from student WHERE $var LIKE '" . $_POST['nadji_p'] . "'";
            $qry = $mysqli -> query($upit);

            if(!$qry)
            {
                echo "Nije moguce izvrsiti upit!";
                die($mysqli -> error);
            }

            if((!($qrd = $qry -> fetch_assoc())))
            {
                echo "Imate gresku";
            }

            else
            {
                $indeks=$qrd['indeks'];
                $ime=$qrd['ime'];
                $prezime=$qrd['prezime'];
                $predmet=$qrd['predmet'];
                $ocena=$qrd['ocena'];
            }
        }



        if(isset($_POST['dodaj']))
        {
            $indeks=$_POST['indeks'];
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $predmet=$_POST['predmet'];
            $ocena=$_POST['ocena'];

            $upit = "INSERT INTO student (indeks, ime, prezime, predmet, ocena) VALUES('$indeks','$ime','$prezime','$predmet','$ocena')";
            $qry = $mysqli -> query($upit);

            if(!$qry)
            {
                echo "Nije moguce izvrsiti upit";
                die($mysqli -> error);
            }
        }


        

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sutra.php" method="post">
    <table bgcolor="#ccc">
        <tr>
            <td>Broj indeksa</td>
            <td><input type="text" name="indeks" value="<?php echo $indeks ?>"></td>
        </tr>

        <tr>
            <td>Ime</td>
            <td><input type="text" name="ime" value="<?php echo $ime ?>"></td>
        </tr>

        <tr>
            <td>Prezime</td>
            <td><input type="text" name="prezime" value="<?php echo $prezime ?>"></td>
        </tr>

        <tr>
            <td>Predmet </td>
            <td><input type="text" name="predmet" value="<?php echo $predmet ?>"></td>
        </tr>


        <tr>
            <td>Ocena</td>
            <td>
                <?php
                if($ocena == 9)
                {
                    
                    ?>
                    <label> 9
                        <input type="radio" name="ocena" value="9" checked="checked">
                        10
                        <input type="radio" name="ocena" value="10">
                    

                        <?php
                }

                else
                {
                    ?>
                    <label>9
                    <input type="radio" name="ocena" value="9">
                    10
                    <input type="radio" name="ocena" value="10" checked="checked">


                    <?php
                }


                ?>


                <tr>
                    <td>

                
                <select name="nadji" >
                <option value="indeks">Broj Indeksa</option>
                <option value="ime">Ime</option>
                <option value="prezime">Prezime</option>
                <option value="predmet">Predmet</option>
                <td><input type="text" name="nadji_p"></td>
                <td><input type="submit" name="pretraga" value="Pretrazi"></td>
                <td><input type="submit" name="dodaj" value="Dodaj"></td>
                </td>
                </tr>
                

                </select>
            </td>
        </tr>


  

        </table>
    </form>
</body>
</html>