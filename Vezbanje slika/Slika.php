<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Upload slike</legend>

        <form enctype="multipart/form-data" method="post">
            <input type="hidden" name="max_file_size" value="6100">
                <input type="file" name="fupload">
                <p>
                    <input type="submit" value="Postavi sliku!">
</form>
</fieldset>

<?php

    if(isset($_FILES['fupload']))
    { 
        echo "Naziv postavljene slike je: " . $_FILES['fupload']['name'] . "<br>";
        print "Velicina postavljene slike je: " . $_FILES['fupload'] ['size'] . "<br>";
        print "Tip postavljene slike je: " . $_FILES['fupload']['type'] . "<br>";

        if($_FILES['fupload']['type'] == "image/png")
        {
            $source = $_FILES ['fupload']['tmp_name'];
            $target = 'pics/' . $_FILES ['fupload'] ['name'];
            move_uploaded_file($source , $target);

            $slika = "Postavljena slika je:" . "<img src=\"$target\">" . "<p>";

            print $slika;
        }
        else
        {
            echo"Imate neku gresku";
        }

    }
?>
</body>
</html>