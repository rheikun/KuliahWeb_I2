<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Radio Button</title>
    </head>
    <body>
        <!-- Form Radio Button HTML -->
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        Jenis Kelamin
        <input type="radio" name="sex" value="Pria" />Pria
        <input type="radio" name="sex" value="Wanita" />Wanita <br />
        <input type="submit" value="ok" />
    </form>

    <!-- Code PHP -->
    <?php
        if (isset($_POST['sex'])) {
        echo $_POST['sex'];
        }
    ?>
    </body>
</html>