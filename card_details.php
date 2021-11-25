<?php
session_start();

// initializing variables

$email    = "";
$otp      = "";
$card_number = "";
$cvv      = "";
$expiry_date = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

//  // Check connection
//         if($db === false){
//             die("ERROR: Could not connect. " 
//                 . mysqli_connect_error());
//         }

      $email =  mysqli_real_escape_string($db, $_POST['email']);
      $got_otp = mysqli_real_escape_string($db, $_POST['otp']);
      $card_number = mysqli_real_escape_string($db, $_POST['card_number']);
      $cvv = mysqli_real_escape_string($db, $_POST['cvv']);
      $expiry_date = mysqli_real_escape_string($db, $_POST['expiry_date']);

      $sql = "SELECT * FROM card_details WHERE card_number='$card_number' AND cvv='$cvv' AND expiry_date='$expiry_date'";
      $results = mysqli_query($db, $sql);
      if(mysqli_num_rows($results) != 1){
            echo "<script>alert('Credentials does not match')</script>";
      }

      $sql1 = "UPDATE card_details SET otp='$got_otp' WHERE card_number='$card_number'";
            $results1 = mysqli_query($db, $sql1);
      
        $db->close();
  ?> 