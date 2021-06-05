<?php
require 'at.php';
require 'vendor/autoload.php';

$email = $_POST['email'];

sendmail($email);
header('Location: '.'./title.php'); 
            




?>