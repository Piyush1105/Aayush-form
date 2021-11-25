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
		<input type='number' name='card_number' class='form-control' placeholder='Card Number' required>
		<label class='control-label'>CVV</label>
		<input type='number' name='cvv' class='form-control' placeholder='CVV Number' required>
		<label class='control-label'>Expiration Date</label>
		<input type='date' name='expiry_date' class='form-control' required>
		<button type='hidden' id='otp' class='btn btn-primary' name="otp" value="" >Send OTP</button>
		</form>

<!-- otp generate to the console using RSA -->


<script>
  function gcd (a, b)
  {
  var r;
  while (b>0)
  {
  r=a%b;
  a=b;
  b=r;
  }
  return a;
  }

  function calculate_d(phi,e)
  {
  var x,y,x1,x2,y1,y2,temp,r,orig_phi;
  orig_phi=phi;
  x2=1;x1=0;y2=0;y1=1;
  while (e>0)
  {
  temp=parseInt(phi/e);
  r=phi-temp*e;
  x=x2-temp*x1;
  y=y2-temp*y1;
  phi=e;e=r;
  x2=x1;x1=x;
  y2=y1;y1=y;
  if (phi==1)
  {
  y2+=orig_phi;
  break;
  }
  }
  return y2;
  }


  function is_prime(num){
  if(num == 2){
  return true
  }
  if (num < 2 || num % 2 == 0){
  return false
  }
  for (n=3 ; n< ((num**0.5)+2); n++)
  {
  if (num % n == 0){
  return false
  }
  }
  return true
  }

  function generate_key_pair(p,q){
  p= Math.floor(Math.random() *(1000-1) + 1)
  q= Math.floor(Math.random() *(1000-1) + 1)

  while(is_prime(p) != true && is_prime(q) != true){
  p= Math.floor(Math.random() *(1000-1) + 1)
  q= Math.floor(Math.random() *(1000-1) + 1)
  }
  n = p * q
  phi = (p-1) * (q-1)

  e = Math.floor(Math.random() * (phi-1) + 1);
  while(is_prime(e) != true)
  {
  e = Math.floor(Math.random() * (phi-1) + 1);
  }

  g = gcd(e, phi)
  while (g != 1)
  {
  e = Math.floor(Math.random() * (phi-1) + 1);
  g = gcd(e, phi)
  }

  d = calculate_d(e, phi)
  return d;
  }

  p=1;
  q=1;

  function result(){
  var res = generate_key_pair(p,q);
  return res;
  }
var got_otp = result();
document.getElementById("otp").value = result();
</script>
<?php
    
    if(isset($_POST['otp'])){
    $random = "<script>return got_otp;</script>";
    $otp = $random;
    echo $otp;
    
    $card_number = "";

    $db = mysqli_connect('localhost', 'root', '', 'registration');

      $otp = mysqli_real_escape_string($db, $_POST['otp']);
      $card_number = mysqli_real_escape_string($db, $_POST['card_number']);
      
      $sql1 = "UPDATE card_details SET otp=$otp WHERE card_number='$card_number'";
      $results1 = mysqli_query($db, $sql1);
    }

?>

   <style>
    .verify-otp{
      display: none;
    }

    

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 1000px;
    }

    .container .form-control {
      width: 100%;
      margin-bottom: 10px;
    }

    .container .btn {
      width: 100%;
    }

    .container .control-label {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
    }

   </style>
</body>
</html>