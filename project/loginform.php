<!DOCTYPE html>
<html lang="en">
<head>
    <title>LogIn and SignIn</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .con{
            height: 710px;
            background-color: #2c2c2c;
        }
    </style>
</head>
<body>

<?php

    $email;
    $pass;
    $emailErr=""; 
    $passErr=""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            
          }
        else 
        {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
          echo $emailErr;

          if (empty($_POST["password"])) {
            $passErr = "Password is required";
          } else {
            $pass = test_input($_POST["password"]);
            // check if URL address syntax is valid
            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$pass)) {
              $passErr = "Invalid Password!";
            }    
          }

        }

    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    $server="localhost";
    $db="food";
    $user="root";
    $password="";

    $con=new mysqli($server,$user,$password,$db,"3306") or die("Connection failed.");
    // echo"Connection succesful.<br>";
    
    
    $rs='';
    
    // SignIn
    if (isset($_POST['SignIn']) && $emailErr=="")
    {
        $email=$_POST["email"];
        $pass=$_POST["password"];
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
            header( "location:lastA.php");//It helps to redirect to another page.
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
            header( "location:lastA.php");//It helps to redirect to another page.
            // echo "LogIn successful.";
        }
        else{
            echo "Invalid email or password.";
        }
    }
    
    $con->close();
?>
<div class="con">
<div class="formbox">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="login" method="post">
        <b>Email<b> <input type="text" name="email"  placeholder="Enter Email" required>  
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        <b>Password<b> <input type="password" name="password"  placeholder="Enter Password"><br><br>
        <button type="submit" name="LogIn">LogIn</button>
        <button type="submit" name="SignIn">SignIn</button>
    </form>
</div>
</div>
</body>
</html>
