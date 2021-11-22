<?php include('card_details.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='./style.css'>
    <title>Document</title>
</head>
<body>
    	<!-- Card details to verify -->
	<div class='container'>
		  <form method='post' action='payment.php'>
			  
			  
		<label class='control-label'>Email</label>
		<input type='email' name='email' id='email' class='form-control' placeholder='Email' required>
		<label class='control-label'>Card Number</label>
		<input type='number' name='card_number' class='form-control' required>
		<label class='control-label'>CVV</label>
		<input type='number' name='cvv' class='form-control' required>
		<label class='control-label'>Expiration Date</label>
		<input type='date' placeholder='mm-yyyy' name='expiry_date' class='form-control' required>
		<button type='submit' class='btn btn-primary' name="otp" value="submit">Send OTP</button>
		  </form>

		  <!-- <div class='verify-otp'>
              <label class='' >Enter OTP: </label>
			  <input type='number' name='otp' class='get-otp' placeholder='Enter OTP' required>
		    <button type='verify' onclick='submit_otp()'>Verify OTP</button>
      </div>
  </div> -->
<!--   
 <script>
   function send_otp(){
     var email = jQuery('#email').val();
     jQuery.ajax({
       url: 'card_details.php',
       type: 'POST',
       data: 'email='+email,
       success: function(result){
         if(result == 'success'){
           jQuery('.verify-otp').show();
           jQuery('.container').hide();
         }
       }
     });
   }
   function submit_otp(){
     var otp = jQuery('#email').val();
     jQuery.ajax({
       url: 'check_otp.php',
       type: 'POST',
       data: 'email='+email,
       success: function(result){
         if(result == 'success'){
           jQuery('.verify-otp').show();
           jQuery('.container').hide();
         }
       }
     });
   }
   </script> -->

   <style>
    .verify-otp{
      display: none;
    }
   </style>
</body>
</html>