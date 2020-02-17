<?php
// Start the session
session_start();


// Set session variables

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
    $_SESSION["guess_secretWord"] =str_repeat("_ ", 7);
    }
    
if (!isset($_SESSION["guess_count"]) ) {
    $_SESSION["guess_count"] = 0;
    }
if (!isset($_SESSION["guess_count_wrong"]) ) {
    $_SESSION["guess_count_wrong"] = 0;
    }
if ( !isset($_SESSION["guess_tracked"]) ) {
     $_SESSION["guess_tracked"] = 0;
    }

if (!isset($_SESSION["guess_image"]) ) {
    $_SESSION["guess_image"] = 0;
    }
     
if (!isset($_SESSION["guess_letter"]) ) {
    $_SESSION["guess_letter"] = " ";
    }
if (!isset($_SESSION["game_lastGuess"]) ) {
    $_SESSION["game_lastGuess"] =date("F j, Y, g:i a");
    }
         
if (!isset($_SESSION["game_started"]) ) {
    $_SESSION["game_started"] = date("F j, Y, g:i a");
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

    $game_lastGuess= $_SESSION["game_lastGuess"];
  

    $game_started = $_SESSION["game_started"] ;
  

  //Output to check the current status

echo (strpos($secretWord, 'r'));

echo '<br>';

echo session_name();
  
print_r ($secretWord_array);

echo $game_lastGuess;

print_r ($_SESSION["secretWord_array"]);
echo $guess_secretWord;
echo $secretWord_len ;
?>

<!-- i would want to refresh the page on submit and get the value of guess_letter -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<form  action= "SSP04.php" method="post">
<input type = "hidden" name ="action" value ="action">

<label>Frosty letter guess:</label>
<input type="text" name="guess_letter" placeholder="Enter a letter">

<input type="submit" name="submit">    
</form>



</body>
</html>
<?php 



$guess_letter = filter_input(INPUT_POST, 'guess_letter');
    
    
for ($i = 0; $i < $secretWord_len ; $i++) {
    if ($guess_letter === $secretWord_array[$i]) {
        if ($i=== 0) {
            $guess_secretWord = $guess_letter . substr($guess_secretWord, $i);
        } else {
            $guess_secretWord = substr($guess_secretWord, 0, $i) . $guess_letter . substr($guess_secretWord, $i);
        }
    }
 }
      
    


?>

<!-- print the output -->

<?php echo '<br>' ?>

<?php echo  $guess_secretWord; ?>
<?php echo '<br>' ?>
<p> Secret word hint:  <?php echo $secretWord_hint; ?></p>
<p> Secret word length:  <?php echo $secretWord_len; ?></p>
<p> Guess count:  <?php echo $guess_count ?></p>
<p> Guessed letters:  <?php echo $guess_tracked; ?></p>
