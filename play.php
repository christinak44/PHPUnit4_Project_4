<!DOCTYPE html>
<?php
session_start();

include 'inc/Phrase.php';
include 'inc/Game.php';

if (isset($_SESSION['selected']) && isset($_POST['key'])) {
    $_SESSION['selected'][] = $_POST['key'];
} else {
    $_SESSION['selected'] = [];
}

$_SESSION['phrase'] =  "start small";
$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
$game = new Game($phrase);
// session_destroy();
 ?>
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
  var_dump($phrase);
  var_dump($game);
  echo $phrase->addPhraseToDisplay();
  ?>

  <!--<form method= 'POST' action='play.php'>-->
  <?php
  var_dump($_SESSION);
  echo $game->displayKeyboard();
  echo $game->displayScore();
  //var_dump($_POST);
  ?>
<!--</form>-->
</div>

</body>
</html>
