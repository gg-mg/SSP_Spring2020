<?php
start_session();

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

echo "found";

?>

<?php echo '<br>' ?>

<?php echo  $guess_secretWord; ?>
<?php echo '<br>' ?>
<p> Secret word hint:  <?php echo $secretWord_hint; ?></p>
<p> Secret word length:  <?php echo $secretWord_len; ?></p>
<p> Guess count:  <?php echo $guess_count ?></p>
<p> Guessed letters:  <?php echo $guess_tracked; ?></p>
?>