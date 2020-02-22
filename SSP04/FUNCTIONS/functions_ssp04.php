
   
<?php


if (!isset($_SESSION["secretWord"])) {
    $_SESSION["secretWord"] = "mangoes";
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

 

$guess_letter = filter_input(INPUT_POST, 'guess_letter');
   

    function frosty_guessing($secretWord,$secretWord_hint,$secretWord_array,$secretWord_len,$guess_secretWord,$guess_count,
        $guess_count_wrong,$guess_tracked,$guess_image,$guess_letter,$game_last_guess, $game_started){
            $guess_found ="N";
            $game_last_guess =new DateTime();
           
            if (!empty($guess_letter && ctype_alpha($guess_letter))) {
                $guess_count++;
                if (strpos($guess_tracked, $guess_letter) !== false) {
                    $guess_count_wrong++;
                    $guess_image ++;
                } elseif ($secretWord === $guess_secretWord) {
                    echo '<p class = "popup" > Congratulations!!!</p>';
                    header("Refresh: 4");
                    session_destroy();
                } elseif (!in_array($guess_letter, $secretWord_array)) {
                    $guess_tracked .=$guess_letter;
                    $guess_count_wrong++;
                    $guess_image++;
                } else {
                    for ($i = 0; $i < $secretWord_len ; $i++) {                        
                        if ($guess_letter == $secretWord_array[$i]) {
                            $guess_found ="Y";
                            $guess_tracked .=$guess_letter;
                            if ($i== 0) {
                                $guess_secretWord = $guess_letter . substr($guess_secretWord, 1);
                            } else {
                                $guess_secretWord = substr($guess_secretWord, 0, $i) . $guess_letter . substr($guess_secretWord, $i+1);
                            }
                        }
                    }
                }
            } else {
            }         
           
    
            if ($secretWord === $guess_secretWord) {
                echo '<p class = "popup" > Congratulations!!!</p>';
                header("Refresh: 4");
                session_destroy();
            }
    
            if ($guess_image >= 6) {
                header("Refresh: 4");
                echo '<p class = "popup"> Too many tries. The game will reset!!!</p>';
                session_destroy();
            }
            
            frosty_round($game_started, $secretWord_hint, $secretWord_len, $guess_count_wrong, $guess_tracked, $guess_secretWord,
            $guess_image, $guess_letter,$guess_count,$game_last_guess);
    
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
    
       
    function frosty_round($game_started, $secretWord_hint, $secretWord_len, $guess_count_wrong, $guess_tracked, $guess_secretWord,
    $guess_image, $guess_letter,$guess_count,$game_last_guess) {
                         
     echo '<img id = "frosty" src="./images/Frosty/SSP04_Frosty'.$guess_image.'.png"';    
     echo '<p>Correct secret word guess: '. $guess_secretWord .'</p>';  
     echo '<p>Guess count: ' .$guess_count .'</p>';
     echo '<p> Secret word hint: '   . $secretWord_hint .'</p>' ; 
     echo '<p>Secret word length: '  .$secretWord_len .'</p>'; 
     echo '<p>Guess wrong: '   .$guess_count_wrong .'</p>' ;
     echo '<p>Guessed letters: '.$guess_tracked .'</p>'; 
     echo '<p>Game started: '.$game_started->format('Y-m-d H:i:s').'</p>'; 
     echo 'Game last guess: '.$game_last_guess->format('Y-m-d H:i:s').'<br>';
    }
     
    ?>
    