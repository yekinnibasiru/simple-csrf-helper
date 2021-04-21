<?php 
include 'Helper/Csrf.php';

if(!session_id())@session_start();
$csrf=new Csrf();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo for Yekinni Basiru minimal csrf helper class</title>
</head>
<body>
    <h2>This is a basic Demo,check below to make some tricky stuff</h2>
    <form action="process.php" method="POST">
        <?php $csrf->tokenField(); ?>
        <input type="text" name="fullname">
        <input type="submit" value="process">
    </form>
</body>
</html>