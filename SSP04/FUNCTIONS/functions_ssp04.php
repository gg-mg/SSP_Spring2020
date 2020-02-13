<?php

function frosty_guessing($secretWord, $secretWord_hint, $guess_secretWord, $guess_letter, $guess_tracked,
$guess_count,$guess_count_wrong, $game_started, $game_lastGuess, $secretWord_len, $secretWord_array,$guess_image ){

    $guess_found = "N";

    $game_lastGuess = date("F j, Y, g:i a");

    $guess_letter = $_POST["frosty_letter_guess"];

}


?>