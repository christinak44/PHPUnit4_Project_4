<?php
//activate browser persistance (keep track of current game and it's elements)
session_start();
if ($_POST['start']) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
}
include 'inc/Phrase.php';
include 'inc/Game.php';

if (isset($_SESSION['selected']) && isset($_POST['key'])) {
    $_SESSION['selected'][] = $_POST['key'];
} else {
    $_SESSION['selected'] = [];
}

//starts game seesion and pulls phrase
$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
$_SESSION['phrase'] =  $phrase->currentPhrase/*"start small"*/;
$game = new Game($phrase);
$_SESSION['lives'] = $game->__get($lives);
 //session_destroy();
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<div class="main-container">
    <div id="banner" class="section">
        <h2 class="header">Phrase Hunter</h2>
    </div>
  <?php
  //$phrase = new Phrase();
  //$game = new Game($phrase);
  //var_dump($phrase);
  echo ini_get('display_errors');

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

//echo ini_get('display_errors');

  echo $phrase->addPhraseToDisplay();
  ?>
<!--JavaScript code for activating physical keyboard play-->
<script>
document.addEventListener('keydown', function(event) {
  var keys = document.getElementsByClassName('key');
  var key_press = event.key;
  for(let i= 0; i <= keys.length -1; i++) {
      let key = keys[i].value;
      if(key_press == key) {
        keys[i].click();
      }
  }
});
</script>
  <!--<form method= 'POST' action='play.php'>-->
  <?php
  //var_dump($_SESSION);

  echo $game->displayKeyboard();
  echo $game->displayScore();
  echo $game->gameOver();

  ?>
<!--</form>-->
</div>

</body>
</html>
