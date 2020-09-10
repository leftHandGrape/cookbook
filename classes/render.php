<?php 
class Render
{
  //Magic methods!
  public function __toString(){
    
    $output = "\n The following methods are available for " . __CLASS__ . " objects \n ";
    $output .= implode("\n", get_class_methods(__CLASS__));
    
    return $output;
  }
  
  public static function listRecipes($titles) {
    asort($titles);
    return implode("\n", $titles);
  }
  
  public static function listIngredients($ingredients){
    $output = "";
   
    foreach ($ingredients as $ing){
      $output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"]; 
      $output .= "\n";
    }
    return $output;  
  }
  
  public static function displayRecipe($recipe){
    $output = "";
    
    $output .= $recipe->getTitle() . " by " . $recipe->getSource();
    $output .= "\n";
    
    $output .= implode(", ", $recipe->getTags());
    $output .= "\n\n";
    
    $output .= self::listIngredients($recipe->getIngredients());
    $output .= "\n";
    
    $output .= implode("\n", $recipe->getInstructions());
    $output .= "\n";
    
    $output .= $recipe->getYield();
    
    return $output;
  }
  
}






?>