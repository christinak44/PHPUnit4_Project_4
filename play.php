<!DOCTYPE html>
<?php
session_start();
//add 'clicked' letters to array
if(isset($_POST['key'])){
   $_SESSION['selected'] = $_POST['key'];
}
include 'inc/Game.php';
include 'inc/Phrase.php';
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
  $phrase = new Phrase();
  $game = new Game($phrase);
  //var_dump($phrase);
  //var_dump($game);
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
