<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan 4</title>
    </head>
    <body>
        <!-- if, else if, dan else pada php -->
        <?php
            $a = 10;
            $b = 5;

            if ($a > $b) {
                echo 'a lebih besar dari b';
            } else if ($a == $b){
                echo 'a sama dengan b';
            } else {
                echo 'a lebih kecil dari b';
            }
            echo '<br />';
        ?>

        <!-- switch case pada php -->
        <?php
            $i = 0;
            
            if ($i == 0) {
                echo 'i sama dengan 0';
            } else if ($i == 1) {
                echo 'i sama dengan 1';
            } else if ($i == 2) {
                echo 'i sama dengan 2';
            }
            echo '<br />';

            switch ($i) {
                case 0:
                    echo 'i equals 0';
                    break;
                case 1:
                    echo 'i equals 1';
                    break;
                case 2:
                    echo 'i equals 2';
                    break;
            }
            echo '<br />';
        ?>
    </body>
</html>