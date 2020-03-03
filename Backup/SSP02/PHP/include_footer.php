

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<footer> 
    <hr>
    Dislaimer: Oklahoma City Community College does not necessarily
    endorse the content or the respective links on this web page.<br> 
    <?php
    echo filemtime("SSP02.php");
    echo "<br>";
    echo "Content last changed: ".date("F d Y H:i:s.", filemtime("SSP02.php"));
    ?>
</footer>
    
</body>
</html>
