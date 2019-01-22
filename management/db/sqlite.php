<?php
include("../sqlite_config.php");
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open();
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
?>