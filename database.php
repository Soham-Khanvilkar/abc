<?php
   $db = new mysqli("localhost","root","","project_db");
   if($db->connect_error){
       die("Database Not found");
   }
?>