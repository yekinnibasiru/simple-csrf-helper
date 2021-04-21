<?php 
include 'Helper/Csrf.php';

if(!session_id()) session_start();
$csrf=new Csrf();
$csrf->isValidRequest();

?>