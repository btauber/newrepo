<?php  



$form = '
<FORM action="exercise1b.php" method="post">
    <fieldset>
    <LABEL for="amount">Amount: </LABEL>
              <INPUT type="text" name="amount" ><BR>
    <LABEL for="source">Source: </LABEL>
              <INPUT type="text" name="source" ><BR>
    <INPUT type="radio" name="trans_type" value="debit"> Debit<BR>
    <INPUT type="radio" name="trans_type" value="credit"> Credit<BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </fieldset>
 </FORM>';
       echo $form;
/*  if($_SERVER['REQUEST_METHOD'] == 'GET') {
     echo $form;
  } else {

     echo 'Thank you and this is what you sent: <br>';
     foreach($_POST as $key => $value) {
        echo $key . ': ' . $value . '<br>'  ;
  //      print_r($_POST);
     }   
  }*/
?>



