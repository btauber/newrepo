<?php

$form = '<FORM action="login.php" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="text" name ="password" id="password"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
 </FORM>
';
echo $form;
$joe = new userb;
$steve = new userb;
print_r($joe);
$joe->fname = 'joe';
$joe->lname = 'stevens';
$joe->account_num = '1234';
$joe->password = '123456';
print_r($joe);
$steve->fname = 'steve';
$steve->lname = 'stevens';
$steve->account_num = '1234';
$steve->password = '123456';

class userb {
	public $fname;

	public $lname;
	public $account_num;
	public $password;	
}

/*$joe = new user;
$steve = new user;
print_r($joe);
$joe->fname = 'joe';
$joe->lname = 'stevens';
$joe->account_num = '1234';
$joe->password = '123456';

$steve->fname = 'steve';
$steve->lname = 'stevens';
$steve->account_num = '1234';
$steve->password = '123456';*/

$users = array();

$users['joe123'] = $joe;
$users['steve123'] = $steve;
print_r($users);
print_r($joe);
$user = $_POST['username'];
Print_r($_POST);
if(array_key_exists($user, $users)) {
	
	session_start();
	$_SESSION = $users[$user];
//	print_r($_SESSION);
	session_destroy();
} else {
	
	echo 'you are not authenticated';
	
}

?>
