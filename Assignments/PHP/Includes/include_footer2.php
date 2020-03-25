<footer> 
    <hr class = "lineUnder">
    Dislaimer: Oklahoma City Community College does not necessarily
    endorse the content or the respective links on this web page.<br> 
    <?php
    foreach(glob("*.php") as $filename) {
        echo filemtime($filename);
        echo "<br>";
        echo "Content last changed: ".date("F d Y H:i:s.", filemtime($filename));
    }
    ?>
</footer>
    
</body>
</html>