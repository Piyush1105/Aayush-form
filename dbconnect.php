<?php  
    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database="register";
    
    
    $conn = mysqli_connect ($host , $username , $password, $database);  

    if(!$conn == false){  
        die("Could not connect to the database: <br />". mysqli_connect_error());
    }
       //$sql = mysqli_select_db ('register',$conn) or die("unable to connect to database"); 
?> 