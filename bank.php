<?php 
class sign_up{

  public function __construct(){
        if($_REQUEST == NULL){
        	$this->sign_up_form();
        }
        elseif($_REQUEST['page'] == 'log_in'){
        	$this->log_in_form();
        }
  }
  function sign_up_form(){
	$form1 = new form;
	  $form1->sign_up_form();
  }
  function log_in_form() {
  	$form2 = new form;
  	$form2->log_in_form();
  }
}
?>
