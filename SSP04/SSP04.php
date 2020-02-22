<?php
session_start();
//header
include "PHP/include_header.php";
//nav
include "PHP/include_leftNav.php";
include "PHP/include_topNav.php";
//main
?>
<main>
<body>
    
    <div id = 'frostier'>
    <form  action= "SSP04.php" method="post">
    <input type = "hidden" name ="action" maxlength ="1" size ="1" value ="action">
    
    <label>Frosty letter guess:</label>
    <input id = "guess_letter" type="text" name="guess_letter" placeholder="Enter a letter">
    
    <input type="submit" name="submit">    
    </form>
    </div>

<?php

include_once ('FUNCTIONS/functions_ssp04.php');  
frosty_guessing($secretWord,$secretWord_hint,$secretWord_array,$secretWord_len,$guess_secretWord,$guess_count,
    $guess_count_wrong,$guess_tracked,$guess_image,$guess_letter,$game_last_guess, $game_started);
?>
    
    


</main>

<?php include "PHP/include_footer.php";?>