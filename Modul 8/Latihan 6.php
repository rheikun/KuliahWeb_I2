<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan 6</title>
    </head>
    <body>
        <!-- fungsi pada php -->
        <?php
            function do_print() {
                echo time();
            }
            do_print();
            echo '<br />';

            function do_sum($a, $b) {
                return ($a + $b);
            }
            echo do_sum(2, 3);
            echo '<br />';
        ?>

        <!-- fungsi dengan menanyakan kondisi -->
        <?php
            function print_text($text, $bold = true) {
                echo $bold ? "<b>" .$text. "</b>" : $text;
            }
            print_text("Ohayou!");
            echo '<br />';
            print_text("Ohayou!", false);
        ?>
    </body>
</html>