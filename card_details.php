<?php
session_start();

// initializing variables

$email    = "";
$otp      = "";
$card_number = "";
$cvv      = "";
$expiry_date = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');


  ?> 