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
  	if($_SERVER['REQUEST_METHOD'] == 'GET'){
  	$form2 = new form;
  	$form2->log_in_form();
  }else{
  	$obj = new verifyuser;
  	$obj->riteUser($_POST);
  }
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
          }
          elseif(file_exists("bank_file.csv") ) {
          	echo 'GOT IT';
          	$verify = new sign_up_verify; 
          	$verify->read_signUpForm($_POST);
          
          }  else {
          	$filecsv ='bank_file';
          	$username = ($_POST['user_name']);
          	print_r($username);
          	$obj = new sign_up_verify;
          	$obj->write_csv($_POST ,$filecsv);
          	$obj->write_csv($_POST,$username);
        
             }
             
  	
  } 
  function add_trans(){
  	if($_SERVER['REQUEST_METHOD'] == 'GET'){
  		$form3 = new form;
  		$form3->addTransForm();
  	}else{
  		echo 'I got the form';
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
	public function addTransForm(){
		$form3 = '<br>
              <FORM action="./bank.php?page=add_trans" method="post">
                  <LABEL for="amount">Amount: </LABEL>
                    <INPUT type="text" name="amount" id="lastname"><BR>
                  <LABEL for="source">Source: </LABEL>
                    <INPUT type="text" name="source" id="lastname"><BR>
                    <INPUT type="radio" name="type" value="debit"> Debit<BR>
                    <INPUT type="radio" name="type" value="credit"> Credit<BR>
                    <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                    <INPUT type="submit" value="Send"> <INPUT type="reset">
              </FORM>';
	
		echo $form3;
		session_start();
		print_r($_SESSION);
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
		
		public function read_signUpForm($_POST) {
			$row = 1;
			if (($handle = fopen("bank_file.csv", "r")) !== FALSE) {
				while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
					if($row == 1) {
						$keys = $record;
						$row++;
						//print_r($record);
					} else {
						$records[] = array_combine($keys, $record);
					}
				}
				$filecsv ='bank_file';
				$username = ($_POST['user_name']);
				$row = 0;
				foreach($records as $key => $val){
					$user = $val['user_name'];
					if ($user ==($username)){
						$row++ ;
					}
				}
				if($row  !==0){
					echo 'Soory no duplicate'; 
				}  else {
					$this->write_csv($_POST ,$filecsv);
					$this->write_csv($_POST,$username);
				}
				fclose($handle);
			}
		}
	public function write_csv($a,$b){
		
	$fp = fopen("$b.csv", 'a');
	
		fputcsv($fp, $a);
	fclose($fp);
	}

 public function write_csv_user($b,$a){
    $fp = fopen("$b.csv', 'w");
	fputcsv($fp, $a);
	fclose($fp);
}
}
class verifyuser {
	public function riteUser(){
		$filename = ($_POST['user_name']);
		if (file_exists("$filename.csv") ) {
			$this->riteID($filename);
		} else {
		echo "The file does not exist";
			}
	}
	public function riteID ($filename){
		$row = 1;
		if (($handle = fopen("$filename.csv", "r")) !== FALSE) {
			while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
				if($row == 1) {
					$keys = $record;
					$row++;
					
		$password = ($_POST['password']);
		$user_name = ($_POST['user_name']);
		$id =($keys[3]);
		$us =($keys[0]);
		$us = strtoupper($us);
		if($password == $id){
			session_start();
			$_SESSION['user_info'] = array();
			$_SESSION['user_info'][] = $user_name;
			print_r($_SESSION);
			echo "Welcome $us you are now in the bank<br>";
			echo '<a href="./bank.php?page=my_bal">Click to veiw balance</a><br>';
			echo '<a href="./bank.php?page=add_trans">Click to add transavtions</a><br>';
			echo '<a href="./bank.php">main menu</a><br>';
		}else{
			echo 'this is not entoiuicater';
		}
				} 
	}
}  
	}
}

class Prosses_trans{
	public function
	
}
?>