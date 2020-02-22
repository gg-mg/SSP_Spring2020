<?php
session_start();

include_once ('FUNCTIONS/functions_ssp04testing.php');


if (!isset($_SESSION["secretWord"])) {
    $_SESSION["secretWord"] = "oranges";
}
if (!isset($_SESSION["secretWord_hint"])) {
    $_SESSION["secretWord_hint"] = "fruit(s)";
}
if (!isset($_SESSION["secretWord_array"])) {
    $_SESSION["secretWord_array"] = str_split($_SESSION["secretWord"]);
}
if (!isset($_SESSION["secretWord_len"])) {
    $_SESSION["secretWord_len"] = strlen($_SESSION["secretWord"]);
}
if (!isset($_SESSION["guess_secretWord"])) {
    $_SESSION["guess_secretWord"] =str_repeat("_", 7);
}
if (!isset($_SESSION["guess_count"])) {
    $_SESSION["guess_count"] = 0;
}
if (!isset($_SESSION["guess_count_wrong"])) {
    $_SESSION["guess_count_wrong"] = 0;
}
if (!isset($_SESSION["guess_tracked"])) {
    $_SESSION["guess_tracked"] = "";
}
if (!isset($_SESSION["guess_image"])) {
    $_SESSION["guess_image"] = 0;
}
if (!isset($_SESSION["guess_letter"])) {
    $_SESSION["guess_letter"] = "";
}
if (!isset($_SESSION["game_last_guess"])) {
    $_SESSION["game_last_guess"] = new DateTime();
}
if (!isset($_SESSION["game_started"])) {
    $_SESSION["game_started"] = new DateTime();
}

$secretWord = $_SESSION["secretWord"];
$secretWord_hint = $_SESSION["secretWord_hint"];
$secretWord_array =$_SESSION["secretWord_array"];
$secretWord_len = $_SESSION["secretWord_len"];
$guess_secretWord = $_SESSION["guess_secretWord"] ;
$guess_count = $_SESSION["guess_count"];
$guess_count_wrong = $_SESSION["guess_count_wrong"];
$guess_tracked = $_SESSION["guess_tracked"];
$guess_image = $_SESSION["guess_image"] ;
$guess_letter= $_SESSION["guess_letter"];
$game_last_guess= $_SESSION["game_last_guess"];
$game_started =  $_SESSION["game_started"] ;



    
     

    $guess_letter = filter_input(INPUT_POST, 'guess_letter');
  
    frosty_guessing($secretWord,$secretWord_hint,$secretWord_array,$secretWord_len,$guess_secretWord,$guess_count,
    $guess_count_wrong,$guess_tracked,$guess_image,$guess_letter,$game_last_guess, $game_started);
    
?>




