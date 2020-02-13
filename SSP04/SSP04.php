<?php
// Start the session
session_start();

// Set session variables


if ( isset($_SESSION["secretWord"]) ) {
    $secretWord = $_SESSION["secretWord"];
  }
if ( isset($_SESSION["secretWord_hint"]) ) {
    $secretWord_hint = $_SESSION["secretWord_hint"];
  }
if ( isset($_SESSION["secretWord_array"]) ) {
    $secretWord_array =$_SESSION["secretWord_array"];  }
  
if ( isset($_SESSION["secretWord_len"]) ) {
    $secretWord_len = $_SESSION["secretWord_len"];
  }
  if ( isset($_SESSION["guess_secretWord"] ) ) {
    $guess_secretWord = $_SESSION["guess_secretWord"] ;
  }
if ( isset($_SESSION["guess_count"]) ) {
    $guess_count = $_SESSION["guess_count"];
  }
  if ( isset($_SESSION["guess_count_wrong"] )) {
    $guess_count_wrong = $_SESSION["guess_count_wrong"];
  }
if ( isset($_SESSION["guess_tracked"]) ) {
    $guess_tracked = $_SESSION["guess_tracked"];
  }
  if ( isset($_SESSION["guess_image"] ) ) {
    $guess_image = $_SESSION["guess_image"] ;
  }
if ( isset($_SESSION["guess_letter"]) ) {
    $guess_letter= $_SESSION["guess_letter"];
  }
  if ( isset($_SESSION["game_lastGuess"] )) {
    $game_lastGuess= $_SESSION["game_lastGuess"];
  }
if ( isset($_SESSION["game_started"] ) ) {
    $game_started = $_SESSION["game_started"] ;
  }

  //header("location:index.php"); // your current page


echo session_name();
  
print_r ($secretWord_array);

echo $game_lastGuess;

print_r ($_SESSION["secretWord_array"]);
echo str_repeat("_ &nbsp;", 7);
echo $secretWord_len ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


<form  action = "SSP04.php" method="post">
<input type="text" name="frosty_letter_guess" placeholder="Enter a letter">
<input type="submit" name="submit">    
</form>



</body>
</html>
<?php 

if (isset($_POST['submit'])) {
    $guess_letter = $_POST["frosty_letter_guess"];
}
//$a = 'How are you?';

//if (strpos($a, 'are') !== false) {
   // echo 'true';
//}

if( strpos($guess_tracked, '$guess_letter')){

  $guess_count_wrong += 1;
  $guess_image += 1;
}else if( $guess_letter == $secretWord_len-1){

 echo "congratulations";
}elseif ( !in_array($guess_tracked, $secretWord_array)){
  array_push($guess_tracked, $guess_letter);
  $guess_count_wrong += 1;
  $guess_image += 1;
}else{
  for ($i = 0; $i < $secretWord_len; $i++){
    if(in_array($guess_tracked, $secretWord_array)){
      $guess_found = "Y";
      array_push($guess_secretWord, $guess_tracked);
      $guess_secretWord = array_unique($guess_secretWord);
    }
  }
}
?>

<?php echo $guess_letter; ?>
<?php echo strlen($secretWord); ?>

<!-- array_unique -->
<!-- position the letters in the right index -->
<!-- sort the collected letters to look like orange -->

<!-- o must go to index 0 -->
<!-- r must go to index 1 -->
<!-- then implode to form word orange -->

<!-- how do i make each letter go to position and show? -->

<!-- must find all the seven letters first -->

<!-- if (char == o){ -->
  <!-- key == 0 -->
<!-- } -->

