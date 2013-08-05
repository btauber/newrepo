-<?php

  class person{
  
  var $name;

/*  public $height;
  protected $social_insurance;
  private $pinn_number;*/

  function __construct($persons_name) {
  $this->name = $persons_name;
  }
  protected function set_name ($new_name){
   if (name  != "jimmy two guns") {
  $this->name = strtoupper ($new_name);
  }
  }
  public function get_name() {
  return $this->name;
  }
/*  private function get_pinn_number () {
    return $this->$pinn_number;
  }*/
  }

  class employee extends person{

   protected function set_name ($new_name){
   if ($new_name == "stafan buck"){
         $this->name = $new_name;
   }
        else if ($new_name == "johny fingers"){
               parent::set_name ($new_name);
        }
   }
     function __construct ($employee_name) {
        $this->set_name ($employee_name);
}
}
  $beny = new person ("benjamin tauber");
//  $jimmy = new person ("Esty Tauber");
 // the following I took out since I have the construct function  
 // $beny->set_name ("Benjamin Tauber");
//  $jimmy->set_name ("Esty Tauber");

  echo "Benjamin's full name:" . $beny->get_name();
 // echo "Esty's full name:" . $jimmy->get_name();
//  echo "Tell me private stuff:" . $beny->$pinn_number;
  $james = new employee ("johny fingers");
  echo "--->" . $james->get_name();

?> 
