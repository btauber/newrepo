<?php

  $record = array('first_name' => 'keith', 'last_name' => 'williams');

//  print_r($record);

   $records = array();

   $records[] = $record;
   $record['first_name'] = 'noam';
   $record['last_name'] = 'lustinger';
   $records[] = $record;
   $record['first_name'] = 'steve';
   $record['last_name'] = 'josephs';
   $records[] = $record;

   print_r($records);
 
?>
