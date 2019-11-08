<?php
class Phrase {

private $currentPhrase;
private $selected = array();

//phrase creation
public function __construct($currentPhrase = null, $selected = null)
{


   if (!empty($currentPhrase) && !empty($selected)) {
       $this->currentPhrase = $phrase;
       $this->selected[] = $selected;
   }
   if (!isset($phrase)) {
       $this->currentPhrase = "dream big";
   }


}
//ready phrase for game play
public function addPhraseToDisplay()
{
   $characters = str_split(strtolower($this->currentPhrase));
   $output = "<div id='phrase' class='section'>";
   $output .= "<ul>";
   foreach ($characters as $character) {
   if (in_array($character, $this->selected)) {
       $output .= "<li class='hide letter'>" . $character . "</li>";
   } else if ($character == " ") {
       $output .= "<li class='space'>" . $character . "</li>";
   } else {
     $output .= "<li class='hide letter'>" . $character . "</li>";
     }

   }
   $output .= "</ul>";
   $output .= "</div>";
   return $output;
}


}
 ?>
