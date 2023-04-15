<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan 2</title>
    </head>
    <body>
        <!-- deklarasi dan inisialisasi variabel menggunakan "$" -->
        <?php
            $bil = 3;
            echo $bil; // echo untuk mencetak output ke browser
            echo '<br />'; // echo untuk mencetak output ke browser
        ?>

        <?php
            $bil = 3;
            var_dump($bil); // var_dump untuk mencetak nilai variabel dengan menampilkan tipe data
            echo '<br />'; // echo untuk mencetak output ke browser
            print_r($bil); // print_r untuk mencetak nilai variabel tanpa menampilkan tipe data
            echo '<br />'; // echo untuk mencetak output ke browser
        ?>

        <?php
            $bil = 3; // 3 bertipe data integer
            var_dump($bil); // untuk mencetak nilai variabel $bil dengan menampilkan tipe data
            echo '<br />'; // untuk mencetak output ke browser
            $var = ""; // "" bertipe data String(0) ""
            var_dump($var); // untuk mencetak nilai variabel $var dengan menampilkan tipe data
            echo '<br />'; // untuk mencetak output ke browser
            $var = null; // null bertipe data NULL -->
            var_dump($var); // untuk mencetak nilai variabel $var dengan menampilkan tipe data
            echo '<br />'; // untuk mencetak output ke browser
        ?>
    </body>
</html>