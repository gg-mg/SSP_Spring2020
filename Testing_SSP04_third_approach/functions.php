<?php
 
 function frosty_guessing(
     $secretWord,
     $secretWord_hint,
     $secretWord_array,
     $secretWord_len,
     $guess_secretWord,
     $guess_count,
     $guess_count_wrong,
     $guess_tracked,
     $guess_image,
     $guess_letter,
     $game_last_guess,
     $game_started
 ) {
     $guess_letter = filter_input(INPUT_POST, 'guess_letter');
     
     $guess_count++;

     if (!empty($guess_letter && ctype_alpha($guess_letter))) {
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
                     if ($i== 0) {
                         $guess_secretWord = $guess_letter . substr($guess_secretWord, 1);
                     } else {
                         $guess_secretWord = substr($guess_secretWord, 0, $i) . $guess_letter . substr($guess_secretWord, $i+1);
                     }
                 }
             }
         }
     } else {
         echo '<b>Please enter a letter a to z</b>';
     } 


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
 ;
 function frosty_round(
     $game_started,
     $game_last_guess,
     $secretWord_len,
     $secretWord_hint,
     $guess_count,
     $guess_count_wrong,
     $guess_tracked,
     $guess_image,
     $guess_secretWord
 ) {
     global $message;
     global $frosty;
     global $game_status;
     $temp = substr($guess_secretWord, 0);
     $temp = str_replace("_", "", $temp);
     $count_right =strlen($temp);
     $message =
    "Secret word hint: <b> ".$secretWord_hint. "</b> \n" .
    "Secret word length: " .$secretWord_len ."\n" .
    "Guess tracked:" .$guess_tracked. "\n".
    "Guess count : " .$guess_count . "\n" .
    "Guess count wrong: " .$guess_count_wrong ."\n" .
    "Guess letter: " .$guess_secretWord ."\n\n" .
    "Game starts on:" . $game_started ->format('Y-m-d H.i.s') ."\n".
    "Last time game play is at:" . $game_last_guess->format('Y-m-d H.i.s') ."\n";

     $frosty = "images/Frosty/SSP04_Frosty1.png";
 }
 ;
