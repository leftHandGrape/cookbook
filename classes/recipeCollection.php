<?php

class RecipeCollection {

  private $title;
  private $recipes = array();
  
  //Magic method!
  public function __construct($title = null){
      $this->setTitle($title);
  }

  
  //Set the title!
  public function setTitle($title){
    if(empty($title)){
      $this->title = null;
    }
    else {
      $this->title = ucwords($title);
    }
  }
  
  //Get the title!
  public function getTitle(){
      return $this->title;
  }
  
  //Set the recipe
  public function addRecipe($recipe){
    $this->recipes[] = $recipe;
  }

  //Get the recipe!
  public function getRecipe(){
    return $this->recipes;
  }
  
  public function getRecipeTitles(){
    $titles = array();
    foreach($this->recipes as $recipe){
      $titles[] = $recipe->getTitle();
    }
    return $titles;
  }
  
  public function filterByTag($tag){
    $taggedRecipes = array();
    foreach($this->recipes as $recipe) {
      if(in_array(strtolower($tag), $recipe->getTags())){
        $taggedRecipes[] = $recipe;
      }
    }
    return $taggedRecipes;
  }
  
  
  
  
  
    
}
  
?>