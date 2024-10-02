<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/gg.css">
</head>
<body>
    <div class="wadah">
    <form action="" method="post">
        <h3>Ganjil</h3>
        <input type="number" name="ganjil" id="ganjil">
        <button type="submit" name="go">go</button>
    </form>
    <?php 
    if(isset($_POST['go'])){
        $angka = $_POST['ganjil'];
        for ($i=1; $i <= $angka; $i++) { 
            if ($i % 2 != 0) {
                echo "<p>$i</P>";
            }
        }
    }
    ?>
    </div>
</body>
</html>