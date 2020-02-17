<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


function frosty_guessing (
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
)
{
    echo "<br>";
    global $game_status;
    global $game_end;
    global $error_message;
    global $message;
    $guess_found = "N";
    $game_last_guess = new DateTime();

    if ((!empty($guess_letter)) && strpos($guess_tracked, $guess_letter) !== false) {
        $guess_count_wrong++;
        $guess_image ++;
    } elseif (strcasecmp($secretWord, $guess_secretWord)==0) {
        $game_status = "Congratulations !!!";
        $game_end = true;
        reset_SESSION();
    } elseif ((!empty($guess_letter)) && strpos($secretWord, $guess_letter) !== false) {
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
                                    

        if (strcasecmp($secretWord, $guess_secretWord)==0) {
            $game_status = "Congratulations !!!";
            $game_end = true;
            reset_SESSION();
        }
        if (!$game_end) {
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
            reset_SESSION;
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
}


function pre_r($array)
{
    echo'<pre>';
    print_r($array);
    echo'<pre>';
}
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
){ 
    global $message;
    global $frosty;
    global $game_status;
    $temp = substr($guess_secretWord, 0);
    $temp = str_replace("_","",$temp);
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
?>
       

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<form  action= "frosty_round" method="post">
<input type = "hidden" name ="action" value ="action">

<label>Frosty letter guess:</label>
<input type="text" name="guess_letter" placeholder="Enter a letter">

<input type="submit" name="submit">    
</form>






</body>
</html>


    
        
    