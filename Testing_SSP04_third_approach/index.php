<?php
// Start the session
session_start();

require_once('functions.php');

echo 'Start!!!';
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
   /* $_SESSION["game_last_guess"] =new DateTime();
    $_SESSION["game_started"] = new DateTime();*/
    $_SESSION["initialize"] = 1;

    echo 'Midsection!!!';
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


$action= filter_input(INPUT_POST, 'action');{
    switch ($action) {

 case 'myaction':
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

    
    
    

     echo 'Inside the Function';
    
 
break;
  
    
}

}

echo 'Endddddd!!!';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form  action= "index.php" method="post">
<input type = "hidden" name ="action" value ="myaction">

<label>Frosty letter guess:</label>
<input type="text" name="guess_letter" value= "" placeholder="Enter a letter">

<input type="submit" name="Submit">    
</form>



<img src ="<?php echo $frosty ?>" alt ="frosty picture"  style="float:left; border: 2px solid #ddd;" 
width ="137" height ="135">
  
</body>
</html>
