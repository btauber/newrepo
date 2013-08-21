<?php
$program = new sign_up; 
class sign_up{

  public function __construct(){
        if($_REQUEST == NULL){
        	$this->main_page();
        }
        if($_REQUEST['page'] == 'sign_up'){
        	$this->sign_up_form();
        }
        if($_REQUEST['page'] == 'sign_in'){
        	$this->log_in_form();

        }
  }     
  function main_page(){
  	echo 'hello welcome to my program <br>';
  	echo '<a href="./bank.php?page=sign_up">Click to sign up</a>';
  	echo '<a href="./bank.php?page=sign_in">Click if you are a member, to sign in</a>';
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
