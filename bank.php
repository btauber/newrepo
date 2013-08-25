<?php
$program = new MyBank; 
class MyBank{

	public function __construct() {
		if(isset($_REQUEST['page'])) {
			$meth = $_REQUEST['page'];
			$this->$meth();
		} else {
			$this->main_page();
		}
	}
  function main_page(){
  	echo 'hello welcome to my program <br>';
  	echo '<a href="./bank.php?page=sign_up">Click to sign up</a>';
  	echo '<a href="./bank.php?page=sign_in">Click if you are a member, to sign in</a>';
  }
  function sign_up(){
	$form1 = new form;
	  $form1->sign_up_form();
  }
  function sign_in() {
  	$form2 = new form;
  	$form2->log_in_form();
  }
  function sign_up_verify() {
  	$verify = new sign_up_verify;
  	$verify->write_csv();
 } 
  	
  
}


class form{
	
	public function sign_up_form(){
	  $form1 = '<br>
	  		<FORM action="./bank.php?page=sign_up_verify" method="post">
	  		<LABEL for="first_name">First name: </LABEL>
	  		<INPUT type="text" name="first_name"><BR>
	  		<LABEL for="last_name">Last name: </LABEL>
	  		<INPUT type="text" name="last_name"><BR>
	  		<LABEL for="user_name">Please Create a User name:</LABEL>
	  		<INPUT type="text" name="user_name"><BR>
	  		<LABEL for="password">Please Create a Password:</LABEL>
	  		<INPUT type="text" name="password"><BR>
	  		<INPUT type="submit" value="Send"> <INPUT type="reset">
	  		</FORM';
	  echo "$form1";
	// print_r($form1);
	}
	public function log_in_form(){
	  $form2 = 'LogInForm';
	  echo "$form2";
		
	}
	
}

class sign_up_verify{
	public function __construct(){
		session_start();
		print_r($_POST);
		
	}
	public function write_csv(){
		$list = array(
		$_POST['first_name'],
		$_POST['last_name'],
		$_POST['user_name'],
		$_POST['password']
		);
	$fp = fopen('bank_file.csv', 'a');
	
	foreach ($list as $fields) {
		$transact = (array) $fields;
		fputcsv($fp, $transact);
	}
	print_r($list);
	fclose($fp);
	}
}
?>
