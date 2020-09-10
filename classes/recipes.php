<?php 

class Recipe
{
  private $title;
  private $ingredients = array();
  private $instructions = array();
  private $yield;
  private $tag = array();
  private $source = "Jordan Howlett";
  
  private $measurements = array(
      "tsp",
      "tbsp",
      "cup",
      "oz",
      "lb",
      "fl oz",
      "pint",
      "quart",
      "gallon",
  );
  
  //Magic method!
  public function __construct($title = null){
      $this->setTitle($title);
  }
  
  //Returns helpful information about classes and methods.
  //(Filename, Filepath, Directory, Line number of the File)
  
  public function __toString(){
    $output = "You are calling a " . __CLASS__ . " object with the title: ";
    $output .= $this->getTitle() . ".";
    $output .= "\n It is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";
    $output .= "\n This display is from line " . __LINE__ . " in method " . __METHOD__;
    $output .= "\n The following methods are available for objects of this class: \n ";
    $output .= implode("\n", get_class_methods(__CLASS__));
    
    return $output;
  }
  
  //Setting the unfilled $title variable to null, or default Uppercase :)
  
  public function setTitle($title){
    if(empty($title)){
      $this->title = null;
    }
    else {
      $this->title = ucwords($title);
    }
  }
  
  //ADD A METHOD TO GET THE TITLE
  
  public function getTitle(){
      return $this->title;
  }
  
  //ADD INGREDIENTS TO THE ARRAY
  
  public function addIngredient($item, $amount = null, $measure = null){
    
    if  ($amount != null && !is_float($amount) && !is_int($amount)){
        exit("The amount must be a float: " . gettype($amount) . " $amount given");
    }
    
    if  ($measure != null && !in_array(strtolower($measure), $this->measurements)){
        exit("Please enter a valid measurement: " . implode(", ", $this->measurements));
    }
    
    $this->ingredients[] = array(
        "item" => ucwords($item),
        "amount" => $amount,
        "measure" => strtolower($measure),
    );  
  }
  
  //PULL THE INGREDIENTS FROM THE ARRAY
  
  public function getIngredients(){
      return $this->ingredients;
  }
  
  public function addInstruction($string) {
    $this->instructions[] = $string;
  }
  
  public function getInstructions(){
    return $this->instructions;
  }
  
  public function addTag($tag){
    $this->tags[] = strtolower($tag);
  }
  
  public function getTags(){
    return $this->tags;
  }
  
  
  public function setYield($yield){
    $this->yield = $yield;
  }
  
  public function getYield(){
    return $this->yield;
  }
  
  public function setSource($source){
    $this->source = ucwords($source);
  }
  
  public function getSource(){
    return $this->source;
  }
  
  //DISPLAY THE RECIPE
  
  public function displayRecipe(){
    return $this->title . " by " . $this->source . "\n";
  }
}

?>