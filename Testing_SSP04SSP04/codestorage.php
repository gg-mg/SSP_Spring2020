
<?php

function reset_SESSION(){
    $_SESSION["secretWord"] = "session";
    $_SESSION["secretWord_hint"] = "php tool to pass information between pages";
    $_SESSION["secretWord_array"] = str_split($_SESSION["secretWord"]);
    $_SESSION["secretWord_len"] = strlen($_SESSION["secretWord"]);
    $_SESSION["guess_secretWord"] =str_repeat("_", 7);
    $_SESSION["guess_count"] = 0;
    $_SESSION["guess_count_wrong"] = 0;
    $_SESSION["guess_tracked"] = '';
    $_SESSION["guess_image"] = 0;
    $_SESSION["guess_letter"] = "";
    $_SESSION["game_last_guess"] =new DateTime();
    $_SESSION["game_started"] = new DateTime();
    $_SESSION["initialize"] = 1;


    $secretWord = $_SESSION["secretWord"];
    $secretWord_hint = $_SESSION["secretWord_hint"];
    $secretWord_array =$_SESSION["secretWord_array"];
    $secretWord_len = $_SESSION["secretWord_len"];
    $guess_secretWord = $_SESSION["guess_secretWord"];
    $guess_count = $_SESSION["guess_count"];
    $guess_count_wrong = $_SESSION["guess_count_wrong"];
    $guess_tracked = $_SESSION["guess_tracked"];
    $guess_image = $_SESSION["guess_image"] ;
    $guess_letter= $_SESSION["guess_letter"];
    $game_last_guess= $_SESSION["game_last_guess"];
    $game_started = $_SESSION["game_started"] ;
}  

function pre_r($array)
{
    echo'<pre>';
    print_r($array);
    echo'<pre>';
}
if (!isset($SESSION['secretWord'])) {
    reset_SESSION();
}
if (!$game_end) {
    $guess_count++;
}

frosty_round(
    $game_started,
    $game_last_guess,
    $secretWord_len,
    $secretWord_hint,
    $guess_count,
    $guess_count_wrong,
    $guess_tracked,
    $guess_image,                                   
    $guess_secretWord
);

if ($guess_count_wrong > 6) {
$error_msg = "too many fail guesses. Game reset.";

frosty_round(
        $game_started,
        $game_last_guess,
        $secretWord_len,
        $secretWord_hint,
        $guess_count,
        $guess_count_wrong,
        $guess_tracked,
        $guess_image,                                      
        $guess_secretWord
    );
}
}
?>