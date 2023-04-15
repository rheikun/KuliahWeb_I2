<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan 3</title>
    </head>
    <body>
        <!-- menguji tipe data variabel -->
        <?php
            $bil = 3;
            var_dump(is_int($bil)); // untuk mencetak nilai variabel $bil dengan menampilkan tipe datanya apakah integer atau bukan
            echo '<br />';
            $var = "";
            var_dump(is_string($var)); // untuk mencetak nilai variabel $var dengan menampilkan tipe datanya apakah string atau bukan
            echo '<br />';
        ?>

        <!-- casting tipe -->
        <?php
            $str = '123abc';
            $bil = (int) $str;
            echo gettype($str);
            echo '<br />';
            echo gettype($bil);
            echo '<br />';
        ?>

    </body>
</html>