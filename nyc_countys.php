<?php
 $a = array('Brooklyn', 'Bronx', 'Staten_Island', 'Manhatton', 'Queens');
 $b = array('Kings_Co', 'Bronk_Co', 'Richmant_Co', 'New_York_Co', 'Queens_Co');
// This array will combine these 2 array first b and the 2 you could change it by switching the $a$b
 $c = array_combine($b,$a);


 print_r($c);
 
?>
