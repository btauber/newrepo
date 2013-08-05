<?php

  class person{
  
  var $name;

  public $height;
  protected $social_insurance;
  private $pinn_number;

  function __construct($persons_name) {
  $this->name = $persons_name;
  }
  function set_name ($new_name){
  $this->name = $new_name;
  }
  function get_name() {
  return $this->name;
  }
  }

  $beny = new person ("Benjamin Tauber");
  $jimmy = new person ("Esty Tauber");
   
 // $beny->set_name ("Benjamin Tauber");
//  $jimmy->set_name ("Esty Tauber");

  echo "Benjamin's full name:" . $beny->get_name();
  echo "Esty's full name:" . $jimmy->get_name();
  echo "Tell me private stuff:" . $beny->$pinn_number;
?> 
