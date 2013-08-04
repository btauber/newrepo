<?php

   class person {
   protected $height;
   public $weight;
   protected $name;
   
   }
   
   class joe extends person {
   function __construct() {
   $this->name = 'joe';
   }
   }

   class steve extends person {
   function __construct() {
   $this->name = 'steve';
   }
   }

   $joe = new joe;
   $steve = new steve;
   $joe2 = new joe;
   $joe2->weight = 200;
   $joe->weight = 100;
   $steve->weight = 150;
   print_r($joe);
   print_r($steve);
   print_r($joe2);


?>
