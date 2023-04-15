<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!-- loop while pada php -->
        <?php
            $i = 0;
            while ($i < 10) {
                echo $i;
                $i++;
            }
            echo '<br />';
        ?>

        <!-- loop do-while pada php -->
        <?php
            $i = 0;
            do {
                echo $i;
                $i++;
            } while ($i < 10);
            echo '<br />';
        ?>

        <!-- loop for pada php -->
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo $i;
            }
            echo '<br />';
        ?>

        <!-- loop foreach pada php -->
        <?php
            $arr = array(1, 2, 3, 4);
            foreach ($arr as $value) {
                echo $value;
            }
            echo '<br />';
        ?>
    </body>
</html>