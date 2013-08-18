<?php

$file = fopen('file.csv' , 'r');
  while (($line = fgetcsv($file)) !== FALSE){
  list($type[], $amount[], $source[]) = $line;
  print_r($line);
  }

?>
