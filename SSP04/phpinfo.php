<?php 

session_start();


if (!isset($_SESSION["secretWord"]) ) {
   $_SESSION["secretWord"] = "oranges";
  }

if (!isset($_SESSION["secretWord_hint"]) ) {
    $_SESSION["secretWord_hint"] = "fruit(s)";
   }

if (!isset($_SESSION["secretWord_array"]) ) {
     $_SESSION["secretWord_array"] = str_split($_SESSION["secretWord"]);
    }
 
if (!isset($_SESSION["secretWord_len"]) ) {
     $_SESSION["secretWord_len"] = strlen($_SESSION["secretWord"]);
    }
if (!isset($_SESSION["guess_secretWord"]) ) {
    $_SESSION["guess_secretWord"] =str_repeat("_", 7);
    }
    
if (!isset($_SESSION["guess_count"]) ) {
    $_SESSION["guess_count"] = 0;
    }
if (!isset($_SESSION["guess_count_wrong"]) ) {
    $_SESSION["guess_count_wrong"] = 0;
    }
if (!isset($_SESSION["guess_image"]) ) {
    $_SESSION["guess_image"] =0;
    }
     
if (!isset($_SESSION["guess_letter"]) ) {
    $_SESSION["guess_letter"] = "";
    }
if (!isset($_SESSION["game_lastGuess"]) ) {
    $_SESSION["game_lastGuess"] =date("F j, Y, g:i a");
    }
         
if (!isset($_SESSION["game_started"]) ) {
    $_SESSION["game_started"] = date("F j, Y, g:i a");
 }
    


print_r ($_SESSION["secretWord"]);
echo "<br>";
echo $_SESSION["game_lastGuess"];
echo "<br>";
echo $_SESSION["game_started"];
echo "<br>";

echo session_name();


?>