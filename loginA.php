<!DOCTYPE HTML>  
<html>
<head>
<!-- <link rel="stylesheet" href="style.css"> -->
<style>
.error {color: #FF0000;}

.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  justify-content:space-around;
  
}

.fa:hover {
    opacity: 1;
    /* box-shadow: rgba(4, 246, 145, 0.12) 0px -12px 30px, rgba(4, 246, 145, 0.12) 0px -12px 30px, rgba(4, 246, 145, 0.12) 0px -12px 30px, rgba(4, 246, 145, 0.12) 0px -12px 30px; */
    box-shadow: rgba(240, 46, 170, 0.4) 5px 5px, rgba(240, 46, 170, 0.3) 10px 10px, rgba(240, 46, 170, 0.2) 15px 15px, rgba(240, 46, 170, 0.1) 20px 20px, rgba(240, 46, 170, 0.05) 25px 25px;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-pinterest {
  background: #cb2027;
  color: white;
}


.fa-yahoo {
  background: #430297;
  color: white;
}


.d4{
    align-items:baseline;
    align-content: center;
    width: 70%;
    margin: auto;/*To make div at center*/
    display: flex;
    /* border: black 2px solid; */
    justify-content:space-around;
    margin-top: 12%;
    
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleLoginA.css">
</head>
<body>  

<?php
$passErr = $emailErr= "";
$email = $password = "";

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
  
  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid
    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)) {
      $passErr = "Invalid Password!";
    }    
  }

//   if (empty($_POST["comment"])) {
//     $comment = "";
//   } else {
//     $comment = test_input($_POST["comment"]);
//   }

//   if (empty($_POST["gender"])) {
//     $genderErr = "Gender is required";
//   } else {
//     $gender = test_input($_POST["gender"]);
//   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!-- style="text-align: center;" -->
<!-- <fieldset class="field"> -->
<div class="d1">
<h2>LOGIN AND SIGN IN</h2>
<!-- <p><span class="error">* required field</span></p> -->
<form class="f1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label for="email"><b>E-mail</b></label>
  <span class="error">* <?php echo $emailErr;?></span>
 <input type="text" name="email" placeholder="Enter EMAIL" required>

  <br><br>
  <label for="password"><b>Password</b></label>
  <span class="error">* <?php echo $passErr;?></span>
  <input type="password" name="password" placeholder="Enter Password" required>

  <br><br>
  <div class="button">
  <span class="a">
  <input class="b1" type="submit" name="SI" value="SIGN IN">
  </span>
  <span class="a">  
  <input class="b1" type="submit" name="LOGIN" value="LOGIN">  
  </span>
</div>
</form>
</div>
<!-- </fieldset> -->



<!-- <?php
// echo "<h2>Your Input:</h2>";
// echo "<h4>".$email."</h4>";
// // echo "<br>";
// echo "<h4>".$password."</h4>";
// echo "<br>";
?> -->


<?php
if($emailErr == "" and $passErr == ""){
  
if(isset($_POST['SI']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];     
    $server="localhost";
    $db="food";
    $user="root";
    $password="Satyam@47";

    $con=new mysqli($server,$user,$password,$db,"8081") or die("Connection failed.");

    $sql = "INSERT INTO logint VALUES ('$email', '$password')";
    $rs='';
    try{
        $rs = mysqli_query($con, $sql);
    }
    catch(Exception $e){
        echo "<h4>Email Already Exist!</h4>";
    }

    if($rs)
    {
        echo "<h4>SIGN IN SUCCESSFULL!</h4>";
        // echo "<a href="main.html">Link</a>";
        // echo "<a href='$main.html'>Link</a>";
        header( "location:main.html");//It helps to redirect to another page.
        
    }else{
        echo "<br><h4>ECCEPTION</h4>";
    }
// $con->close();
}
//else 
else if(isset($_POST['LOGIN']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];     
    $con = mysqli_connect('localhost', 'root', 'asp123','login','8881');
    $sql = "select * from logint where email = '$email' and password = '$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
  // while($row = $result->fetch_assoc()) {
  //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  // }
        echo "<h4>LOGIN SUCCESFULL!</h4>";
        header( 'location:main.html');
    }else{
        echo "<h4>INVALID LOGIN! PLEASE SIGN IN!</h4>";
    }
  
}
else{
  
}


}
// if ($con->query($rs) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $rs . "<br>" . $con->error;
//   }
//   $con->close();
?>

<div class="d4">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-pinterest"></a>
<a href="#" class="fa fa-yahoo"></a>
</div>




</body>
</html>