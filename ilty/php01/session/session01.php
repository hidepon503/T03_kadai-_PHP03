<?php
session_start();
$_SESSION['name'] = 'ひで';
$_SESSION['age'] = 20;
echo $_SESSION['name'];
echo $_SESSION['age'];

?>