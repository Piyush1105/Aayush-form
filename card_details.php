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

 // Check connection
        if($db === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        $email = mysqli_real_escape_string($db, $_POST['email']);
        // $otp = mysqli_real_escape_string($db, $_POST['otp']);
        $card_number = mysqli_real_escape_string($db, $_POST['card_number']);
        $cvv = mysqli_real_escape_string($db, $_POST['cvv']);
        $expiry_date = mysqli_real_escape_string($db, $_POST['expiry_date']);

        $sql = "INSERT INTO otp (email, card_number, cvv, expiry_date)  VALUES ('$email', '$card_number', '$cvv', '$expiry_date')";

        mysqli_query($db, $sql);
$db->close();
  ?> 