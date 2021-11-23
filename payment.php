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
		<button type='submit' class='btn btn-primary' name="otp" value="submit" onclick='result()'>Send OTP</button>
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


// function rel_prime(phi)
// {
//    var rel=5;
//    while (gcd(phi,rel)!=1)
//       rel++;
//    return rel;
// }



// function power(a, b)
// {
//    var temp=1, i;
//    for(i=1;i<=b;i++)
//       temp*=a;
//     return temp;
// }



// function encrypt(N, e, M)
// {
//    var r,i=0,prod=1,rem_mod=0;
//    while (e>0)
//    {
//       r=e % 2;
//       if (i++==0)
//          rem_mod=M % N;
//       else
//          rem_mod=power(rem_mod,2) % N;
//       if (r==1)
//       {
//          prod*=rem_mod;
//          prod=prod % N;
//       }
//       e=parseInt(e/2);
//    }
//    return prod;
// }



// function decrypt(c, d, N)
// {
//    var r,i=0,prod=1,rem_mod=0;
//    while (d>0)
//    {
//       r=d % 2;
//       if (i++==0)
//          rem_mod=c % N;
//       else
//          rem_mod=power(rem_mod,2) % N;
//       if (r==1)
//       {
//          prod*=rem_mod;
//          prod=prod % N;
//       }
//       d=parseInt(d/2);
//    }
//    return prod;
// }



// function openNew()
// {
//    var subWindow=window.open("Output.htm", "Obj","HEIGHT=400,WIDTH=600,SCROLLBARS=YES");
//    var p=parseInt(document.Input.p.value);
//    var q=parseInt(document.Input.q.value);
//    var M=parseInt(document.Input.M.value);
//    var N=p * q;
//    var phi=(p-1)*(q-1);
//    var e=rel_prime(phi);
//    var c=encrypt(N,e,M);
//    var d=calculate_d(phi,e);
//    subWindow.document.Output.N.value=N;
//    subWindow.document.Output.phi.value=phi;
//    subWindow.document.Output.e.value=e;
//    subWindow.document.Output.c.value=c;
//    subWindow.document.Output.d.value=d;
//    subWindow.document.Output.M.value=decrypt(c,d,N);
// }



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
    console.log(d)
}

  p=1;
  q=1;

  function result(){
    var res = generate_key_pair(p,q);
    return res;
  }
  </script>
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