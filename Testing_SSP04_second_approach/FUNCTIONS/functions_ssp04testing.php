

   
<?php
    

function frosty_guessing($secretWord,$secretWord_hint,$secretWord_array,$secretWord_len,$guess_secretWord,$guess_count,
    $guess_count_wrong,$guess_tracked,$guess_image,$guess_letter,$game_last_guess, $game_started){
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
        }

        echo '<img src="./images/Frosty/SSP04_Frosty'.$guess_image.'.png"';
       

        if ($secretWord == $guess_secretWord) {
            echo '<p style="font-size: 3em;" > Congratulations!!!</p>';
            header("Refresh: 1");
            session_destroy();
        }

        if ($guess_image >= 6) {
            header("Refresh: 1");
            echo '<p style="font-size: 3em;" > Too many tries. The game will reset!!!'.$secretWord.'</p>';
            session_destroy();
        }
        
        frosty_round($game_started, $secretWord_hint, $secretWord_len, $guess_count_wrong, $guess_tracked, $guess_secretWord,
        $guess_image, $guess_letter,$guess_count);

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
$guess_image, $guess_letter,$guess_count) {
                     

 $game_started = new DateTime();
 echo 'Game started:'.$game_started->format('Y-m-d H:i:s').'<br>'; 
 echo 'Guess count: ' .$guess_count .'</p>';
 echo '<p> Secret word hint:'   . $secretWord_hint .'</p>' ; 
 echo '<p>Secret word length:'  .$secretWord_len .'</p>'; 
 echo '<p>Guess wrong:'   .$guess_count_wrong .'</p>' ;
 echo '<p>Guessed letters: '.$guess_tracked .'</p>'; 
 echo '<p>Your secret word guess:'. $guess_secretWord .'</p>';  

}
 
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

</body>
</html>
