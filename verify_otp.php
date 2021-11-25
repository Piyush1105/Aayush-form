<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
    <h2>VERIFY OTP</h2>
    <form action="verify_otp.php" method="post">
        <label for="card_number">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="otp">Enter OTP</label>
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit" name="verify_otp" class="btn btn-primary">Verify</button>
    </form>
    </div>

    <?php
        session_start();

        $db = mysqli_connect('localhost', 'root', '', 'registration');

        $email = mysqli_real_escape_string($db, $_POST['email']);
        $otp = mysqli_real_escape_string($db, $_POST['otp']);

        $querry = "SELECT email, otp FROM card_details WHERE email = '$email' AND otp = '$otp'";
        $verify = mysqli_query($db, $querry);

        if(mysqli_num_rows($verify) == 1) {
            $_SESSION['email'] = $email;
            header('location: success.php');
        } else {
            echo "Invalid OTP";
        }
    ?>
    <style>
        body{
            background: #ad5389;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #3c1053, #ad5389);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #3c1053, #ad5389); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
        h2{
    color: white;
}
        #container {
            margin-top: 100px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }
        form{
            border-radius: 7px;
        }
        input {
            height: 30px;
        }

        label {
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        .btn{
            margin-top: 20px;
        }

    </style>
</body>
</html>