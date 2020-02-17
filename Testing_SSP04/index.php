<?php
// Start the session
session_start();
$message ="";
$frosty = "";
$game_end = false;
$game_status ="";
$error_msg ="";
require_once('function_ssp04.php');

if (!isset($SESSION['secretWord'])) {
    reset_SESSION();
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

$action= filter_input(INPUT_POST, 'action');

switch ($action) 
{
 case 'action':{
     $guess_letter = filter_input(INPUT_POST, 'guess_letter');
     frosty_guessing(
           $game_started,
           $game_last_guess,
           $secretWord_len,
           $secretWord_hint,
           $guess_count,
           $guess_count_wrong,
           $guess_tracked,
           $guess_image,
           $guess_secretWord,
           $secretWord,
           $guess_letter,
           $secretWord_array
       );
 }    break;
    
}
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
<input type="text" name="guess_letter" placeholder="Enter a letter">

<input type="submit" name="submit">    
</form>

<h2>Game status: <?php echo $error_msg?></h2>

<img src ="<?php echo $frosty ?>" alt ="frosty picture"  style="float:left; border: 2px solid #ddd;" 
width ="137" height ="135">

<p style = "padding-left :200px;"><?php echo nl2br (($message));?></p>

<p style = "padding-left :200px;"><?php echo nl2br (($game_status));?></p>





</body>
</html>

