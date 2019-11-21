<?php
class Game {
private $phrase;
private $lives = 5;

//set phrase in play
public function __construct($phrase)
{

       $this->phrase = $phrase;
}
//create keyboard for game play
public function displayKeyboard()
{//update per step 10, now that key handling method created internal function used to display each keyboard letter
  $output = "";
        $output .= "<form method='post' action='play.php'>";
        $output .= "<div id='qwerty' class='section'>";
        $output .= "<div class='keyrow'>";
        $output .= $this->keyPress('q');
        $output .= $this->keyPress('w');
        $output .= $this->keyPress('e');
        $output .= $this->keyPress('r');
        $output .= $this->keyPress('t');
        $output .= $this->keyPress('y');
        $output .= $this->keyPress('u');
        $output .= $this->keyPress('i');
        $output .= $this->keyPress('o');
        $output .= $this->keyPress('p');
        $output .= "</div>";
        $output .= "<div class='keyrow'>";
        $output .= $this->keyPress('a');
        $output .= $this->keyPress('s');
        $output .= $this->keyPress('d');
        $output .= $this->keyPress('f');
        $output .= $this->keyPress('g');
        $output .= $this->keyPress('h');
        $output .= $this->keyPress('j');
        $output .= $this->keyPress('k');
        $output .= $this->keyPress('l');
        $output .= "</div>";
        $output .= "<div class='keyrow'>";
        $output .= $this->keyPress('z');
        $output .= $this->keyPress('x');
        $output .= $this->keyPress('c');
        $output .= $this->keyPress('v');
        $output .= $this->keyPress('b');
        $output .= $this->keyPress('n');
        $output .= $this->keyPress('m');
        $output .= "</div>";
        $output .= "</div>";
        $output .= "</form>";
        return $output;
//original code below used for testing
  /*$this->html = "<form method= 'POST' action='play.php'>";
    $this->html .= '<div id="qwerty" class="section">';
      $this->html .= '<div class="keyrow">';
      $this->html .= '<button name="key" value="q" class="key">q</button>';
      $this->html .= '<button name="key" value="w" class="key">w</button>';
      $this->html .= '<button name="key" value="e" class="key">e</button>';
      $this->html .= '<button name="key" value="r" class="key">r</button>';
      $this->html .= '<button name="key" value="t" class="key" style="background-color: red" disabled>t</button>';
      $this->html .= '<button name="key" value="y" class="key">y</button>';
      $this->html .= '<button name="key" value="u" class="key">u</button>';
      $this->html .= '<button name="key" value="i" class="key">i</button>';
      $this->html .= '<button name="key" value="o" class="key">o</button>';
      $this->html .= '<button name="key" value="p" class="key">p</button>';
      $this->html .= '</div>';

      $this->html .= '<div class="keyrow">';
      $this->html .= '<button name="key" value="a" class="key">a</button>';
      $this->html .= '<button name="key" value="s" class="key">s</button>';
      $this->html .= '<button name="key" value="d" class="key">d</button>';
      $this->html .= '<button name="key" value="f" class="key">f</button>';
      $this->html .= '<button name="key" value="g" class="key">g</button>';
      $this->html .= '<button name="key" value="h" class="key">h</button>';
      $this->html .= '<button name="key" value="j" class="key">j</button>';
      $this->html .= '<button name="key" value="k" class="key">k</button>';
      $this->html .= '<button name="key" value="l" class="key">l</button>';
      $this->html .= '</div>';

      $this->html .= '<div class="keyrow">';
      $this->html .= '<button name="key" value="z" class="key">z</button>';
      $this->html .= '<button name="key" value="x" class="key">x</button>';
      $this->html .= '<button name="key" value="c" class="key">c</button>';
      $this->html .= '<button name="key" value="v" class="key">v</button>';
      $this->html .= '<button name="key" value="b" class="key">b</button>';
      $this->html .= '<button name="key" value="n" class="key">n</button>';
      $this->html .= '<button name="key" value="m" class="key">m</button>';
      $this->html .= '</div>';
    $this->html .= '</div>';
   $this->html .= '</form>';
    return $this->html;*/
}
//creates visual of lives remaining
public function displayScore()
{
  $output = "";
        $output .= '<div id="scoreboard" class="section">';
        $output .= '<ol>';

          for ($i = 1; $i <= ($this->lives - $this->phrase->numberLost()); $i++) {
                $output .= '<li class="tries"><img src="images/liveHeart.png" height="35px" width="30px"></li>';

            }
               for ($i = 0; $i < $this->phrase->numberLost(); $i++){
                   $output .= "<li class='tries'><img src='images/lostHeart.png' height='35px' width='30px'></li>";

               }


        $output .= '</ol></div>';
		return $output;
}
public function keyPress($letterKey)
{
  if (!in_array($letterKey, $this->phrase->selected)){
      return "<input id='" . $letterKey . "' type='submit' button name='key' value='" . $letterKey ."' class='key'></button>";
  } else {
          if ($this->phrase->checkLetter($letterKey)) {
             return "<input id='" . $letterKey . "' type='submit' button name='key' value='" . $letterKey ."' class='key correct' disabled></button>";
           } else {  return "<input id='" . $letterKey . "' type='submit' button name='key' value='" . $letterKey ."' class='key incorrect' disabled></button>";
                     $this->lives--;


      }

    }
}
public function checkForLose()
{
  if ($this->lives == $this->phrase->numberLost()) {
      return true;
  } else {
          return false;
    }
}
public function checkForWin()
{
  if (count(array_intersect($this->phrase->selected, $this->phrase->getLetterArray())) == count($this->phrase->getLetterArray())) {
      return true;
  } else {
          return false;
    }
}
public function gameOver()
{
  if ($this->checkForLose() == true) {
    echo '<div id="overlay" class="lose a"><h1 id="game-over-message">The phrase was: "' . $this->phrase->currentPhrase . '"Better luck next time!</h1>';
    echo '<form method="post" action="play.php">
        <input id="btn__reset" type="submit" name="start" value="Play Again" />
    </form></div>';
  } else if ($this->checkForWin() == true){
    echo '<div id="overlay" class="win a"><h1 id="game-over-message">Congratulations on guessing: "' . $this->phrase->currentPhrase . '"</h1>';
    echo '<form method="post" action="play.php">
        <input id="btn__reset" type="submit" name="start" value="Play Again" />
    </form></div>';
  }
}
public function __get($lives)
{
  return $this->lives;
}
}
?>
