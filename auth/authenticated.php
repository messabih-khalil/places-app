<!-- 
This file used by login and resgister page to check if the user is logged in 
should be not open the login and register page 
 -->

<?php
 session_start();
 if(isset($_SESSION["user_id"])){
   header('Location:/places_app/app/home.php');
   die();
 }
 ?>