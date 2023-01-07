<?php

    $server="localhost";
    $db="food";
    $user="root";
    $password="Satyam@47";

    $con=new mysqli($server,$user,$password,$db,"8081") or die("Connection failed.");
    echo"Connection succesful.<br>";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    // Input of email and password from loginform.html
    // $email="demo5@gmail.com";
    // $pass="Satya123";
    $email=$_POST["email"];
    $pass=$_POST["password"];   
    
    
    
    
    $emailErr=""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
      }
      echo $emailErr;
    }
    
    $rs='';
    
    // SignIn
    if (isset($_POST['SignIn']) && $emailErr=="")
    {
        // insert data in table
        echo"SignIn<br>";
        $insert="INSERT INTO login VALUES ('$email','$pass')";
        
        try{
            $rs = mysqli_query($con, $insert);
        }
        catch(Exception $e)
        {
            echo"Email already existed.";
        }
        if($rs)
        {
            echo"Data inserted.";
        }
    } 
    else if(isset($_POST['LogIn']) && $emailErr==""){
        // login
        echo"LogIn<br>";
        $sel="SELECT * FROM login where email='$email' and password='$pass'";
        $rs=$con->query($sel);
        if($rs->num_rows>0)
        {
            echo "LogIn successful.";
        }
        else{
            echo "Invalid email or password.";
        }
    }
       
    $con->close();
?>