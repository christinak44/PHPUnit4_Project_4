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
{
  $this->html = "<form method= 'POST' action='play.php'>";
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
    return $this->html;
}
//creates visual of lives remaining
public function displayScore()
{
  $output = "";
        $output .= '<div id="scoreboard" class="section">';
        $output .= '<ol>';

          for ($i == 1; $i < $this->lives; $i++) {
                $output .= '<li class="tries"><img src="images/liveHeart.png" height="35px" width="30px"></li>';
          }
        $output .= '</ol></div>';
		return $output;
}







}
 ?>
