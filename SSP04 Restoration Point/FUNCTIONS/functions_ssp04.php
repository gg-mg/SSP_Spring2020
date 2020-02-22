
<?php


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
echo '<br>' ;





$guess_letter = filter_input(INPUT_POST, 'guess_letter');


if (!empty($guess_letter && ctype_alpha($guess_letter))) {
    $guess_count++;
   
    if (strpos($guess_tracked, $guess_letter) !== false) {
        $guess_count_wrong++;
        $guess_image ++;
    } elseif ($secretWord === $guess_secretWord) {
        echo "Congratulations !!!";
        header("Refresh: 1");
        session_destroy();
    } elseif (!in_array($guess_letter, $secretWord_array)) {
        $guess_tracked .=$guess_letter;
        $guess_count_wrong++;
        $guess_image++;
    } else {
        for ($i = 0; $i < $secretWord_len ; $i++) {
            if ($guess_letter == $secretWord_array[$i]) {
                $guess_tracked .=$guess_letter;
                if ($i== 0) {
                    $guess_secretWord = $guess_letter . substr($guess_secretWord, 1);
                } else {
                    $guess_secretWord = substr($guess_secretWord, 0, $i) . $guess_letter . substr($guess_secretWord, $i+1);
                }
            }
        }
    }
}
 else {
        echo '<b>Please enter a letter a to z</b>';
}

?>
<p> Guess count:  <?php echo $guess_count; ?></p>

 <?php
$frosty = "./images/Frosty/SSP04_Frosty".($guess_image).".png";



if ($secretWord == $guess_secretWord) {
    echo '<p style="font-size: 3em;" > Congratulations!!!</p>';
    header("Refresh: 1");
    session_destroy();
}

if ($guess_image >= 6) {
    header("Refresh: 1");
    echo '<p style="font-size: 3em;" > Too many tries. The game will reset!!!</p>';
    session_destroy();
}

$_SESSION["secretWord"] = $secretWord ;
$_SESSION["secretWord_hint"] = $secretWord_hint ;
$_SESSION["secretWord_array"] = $secretWord_array;
$_SESSION["secretWord_len"] = $secretWord_len;
$_SESSION["guess_secretWord"] = $guess_secretWord;
$_SESSION["guess_count"] = $guess_count ;
$_SESSION["guess_count_wrong"] = $guess_count_wrong ;
$_SESSION["guess_tracked"] = $guess_tracked;
$_SESSION["guess_image"] = $guess_image ;
$_SESSION["guess_letter"] = $guess_letter;
$_SESSION["game_last_guess"] = $game_last_guess;
$_SESSION["game_started"] = $game_started ;   


?>
<!-- i would want to refresh the page on submit and get the value of guess_letter -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<div style ="float:right; margin-bottom: 100px">
<p> Game started:</p>
<?php
$game_started = new DateTime();
date_default_timezone_set('America/Chicago');
echo $game_started->format('Y-m-d H:i:s'); 
?>
<br>
</div>
<form  action= "SSP04.php" method="post">
<input type = "hidden" name ="action" value ="action">

<label class ="letterGuess">Frosty letter guess:</label>
<input class ="letterGuess" type="text" name="guess_letter" placeholder="Enter a letter">

<input type="submit" name="submit">    
</form>
<div id = "frostier">
<img id = "frosty" src= "<?php echo $frosty ?>"  alt="Mr Frosty" >
</div>
<?php echo '<br>' ?>

<?php echo  $guess_secretWord; ?>
<?php echo '<br>' ?>
<p> Secret word hint:  <?php echo $secretWord_hint; ?></p>
<p> Secret word length:  <?php echo $secretWord_len; ?></p>
<p> Guess wrong:  <?php echo $guess_count_wrong ?></p>
<p> Guessed letters:  <?php echo $guess_tracked; ?></p>


</body>
</html>
