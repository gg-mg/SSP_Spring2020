<?php
// Start the session
session_start();
$message ="";
$frosty = "";
$game_end = false;
$game_status ="";
$error_msg ="";
require_once('function_ssp04.php');


//initialize variables
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
    $guess_secretWord = $_SESSION["guess_secretWord"] ;
    $guess_count = $_SESSION["guess_count"];
    $guess_count_wrong = $_SESSION["guess_count_wrong"];
    $guess_tracked = $_SESSION["guess_tracked"];
    $guess_image = $_SESSION["guess_image"] ;
    $guess_letter= $_SESSION["guess_letter"];
    $game_last_guess= $_SESSION["game_last_guess"];
    $game_started = $_SESSION["game_started"] ;
  

   
  //Output to check the current status

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
 
  $guess_letter = filter_input(INPUT_POST, 'guess_letter');

    
     
    frosty_guessing(
        $secretWord,
        $secretWord_hint,
        $guess_secretWord,
        $guess_letter,
        $guess_tracked,
        $guess_count,       
        $guess_count_wrong,
        $game_started,
        $game_last_guess,
        $secretWord_len,
        $secretWord_array,
        $guess_image
    );
    echo $guess_letter;





?>

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
<input type="text" name="guess_letter" maxlength = "1" size = "1" value = "">

<input type="submit" name="Submit">    
</form>

<h2>Game status: <?php echo $error_msg?></h2>

<img src ="<?php echo $frosty ?>" alt ="frosty picture"  style="float:left; border: 2px solid #ddd;" 
width ="137" height ="135">

<p style = "padding-left :200px;"><?php echo nl2br(($message));?></p>

<p style = "padding-left :200px;"><?php echo nl2br(($game_status));?></p>





</body>
</html>

<?php
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