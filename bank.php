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
	
	//print_r($_POST);
        $row = 0;
        foreach($_POST as $key => $val){
           if (empty($val)){
           $row++ ;
            }
         }
          if($row  !==0){
          echo 'Please, fill out this form completly,Thank';
          }  else {
        $verify = new sign_up_verify; echo 'GOT IT';
        $verify->write_csv($_POST);
        $verify->read_signUpForm();
             }
  	
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
	  		</FORM'; echo '<a href="./bank.php?page=sign_in">Click if you are a member, to sign in</a>';
	  echo "$form1";
	}
	public function log_in_form(){
	  $form2 = '<br>
	  		<FORM action="./bank.php?page=sign_in" method="post">
	  		<LABEL for="user_name">User name: </LABEL>
	  		<INPUT type="text" name="user_name"><BR>
	  		<LABEL for="password">Password: </LABEL>
	  		<INPUT type="text" name="password"><BR>
	  		<INPUT type="submit" value="Send"> <INPUT type="reset">
	  		</FORM'; echo '<a href="./bank.php?page=sign_up">Click to sign up</a>';
	  echo "$form2";
		
	}
		
}
class sign_up_verify{

	public function full_form($fname ,$lname ){
		
		if (strlen($fname) >0 && ($lname >0))   { 
		  
		      	echo 'GOT IT'; 
		      
		      } else {  
		   	echo 'Sorry, Please enter all the info';
			     }
		    
		}
		public function read_signUpForm() {
			$row = 1;
			if (($handle = fopen("bank_file.csv", "r")) !== FALSE) {
				while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
					if($row == 1) {
						$keys = $record;
						$row++;
						print_r($record);
					} else {
						$records[] = array_combine($keys, $record);
					}
					 
				}
				fclose($handle);
				print_r($records);
			}
		
		}
	public function write_csv($a){
		
	$fp = fopen('bank_file.csv', 'a');
	
		fputcsv($fp, $a);
	fclose($fp);
	}
}

/*	public function read_csv(){
				
	}*/

?>