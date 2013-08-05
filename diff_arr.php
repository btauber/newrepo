<?php

  $arr = array ('madison', 'Clifton', 'Lexington', 'Monmouth', 'Ceaderbridge', 'New_hampshere', 'River', 'Ridge');
  $arr2 = array ('Park', 'Clifton', 'madison', 'Lexington', 'Forest', 'Monmouth', 'Ceaderbridge', 'River', 'Ridge');
  $result = array_diff($arr, $arr2);

  print_r($result);

?>

