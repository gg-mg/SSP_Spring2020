<?php
// Start the session
session_start();


// Set session variables

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
    $_SESSION["game_last_guess"] =new DateTime();
}
if (!isset($_SESSION["game_started"])) {
    $_SESSION["game_started"] = new DateTime();
}
    

//initialize variables

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
    $game_started = $_SESSION["game_started"] ;
  

  //Output to check the current status

  
print_r($secretWord_array);

$guess_letter = filter_input(INPUT_POST, 'guess_letter');

if (!empty($guess_letter)) {
    if (strpos($guess_tracked, $guess_letter) !== false) {
        $guess_count_wrong++;
        $guess_image ++;
    } elseif (strcasecmp($secretWord, $guess_secretWord)==0) {
        $game_status = "Congratulations !!!";
        $game_end = true;
        reset_SESSION();
    } elseif (!in_array($guess_letter, $secretWord_array)) {
        $guess_tracked .=$guess_letter;
        $guess_count_wrong++;
        $guess_image++;
    } else {
        for ($i = 0; $i < $secretWord_len ; $i++) {
            if ($guess_letter == $secretWord_array[$i]) {
                if ($i== 0) {
                    $guess_secretWord = $guess_letter . substr($guess_secretWord, 1);
                } else {
                    $guess_secretWord = substr($guess_secretWord, 0, $i) . $guess_letter . substr($guess_secretWord, $i+1);
                }
            }
        }
    }
}
$guess_count++;
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


<form  action= "index.php" method="post">
<input type = "hidden" name ="action" value ="action">

<label>Frosty letter guess:</label>
<input type="text" name="guess_letter" placeholder="Enter a letter">

<input type="submit" name="submit">    
</form>

<?php echo '<br>' ?>

<?php echo  $guess_secretWord; ?>
<?php echo '<br>' ?>
<p> Secret word hint:  <?php echo $secretWord_hint; ?></p>
<p> Secret word length:  <?php echo $secretWord_len; ?></p>
<p> Guess count:  <?php echo $guess_count ?></p>
<p> Guessed letters:  <?php echo $guess_tracked; ?></p>
<?php $temp = substr($guess_secretWord, 0); ?>
<?php $temp = str_replace("_","",$temp); ?>
<?php echo $temp ?>



</body>
</html>
 




