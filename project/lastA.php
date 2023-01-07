<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

h2{
    text-align: center;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>


 <!-- code to recieve data from another html form  -->
 <?php
$hotel = $_POST['hotel'];
$cost = $_POST['cost'];
// echo $hotel;
// echo $cost;
?>



<h2>PAYMENT</h2>
<!-- <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Enter Name" required>
            <label for="pn"><i class="fa fa-envelope"></i> Phone No.</label>
            <input type="text" id="pn" name="pn" placeholder="Enter Phone Number" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Enter Address" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Enter City Name" required>
            <label for="pname"><i class="fas fa-hamburger"></i> Product Name</label>
            <!-- Hotel name from last page i.e hotel list page of particular food item -->
            <input type="text" id="pname" name="pname" required value=<?php echo $hotel; ?>>

            <!-- <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Enter State Name">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Enter Zip Code">
              </div>
            </div> -->
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="f1name">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Enter Name" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Enter Card Number" required>
            <!-- <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="Enter Expiry Year"> -->
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="Enter Expiry Year" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CW" required>
              </div>
            </div>
            <label for="cp">Cost of product (in Rs.)</label>
            <!-- Cost of product from prvious page i.e food item page -->
            <input type="text" id="cp" name="cp" placeholder="" required value=<?php print $cost; ?>>
          </div>
          
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Delivery address same as billing
        </label>
        <input type="submit" name="submit" value="Continue to checkout" class="btn">
        
      </form>
    </div>
  </div>
  <!-- <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div> -->
</div>



<?php
    
    $server="localhost";
    $db="food";
    $user="root";
    $password="";
    $con=new mysqli($server,$user,$password,$db,"3306") or die("Connection failed.");
    // echo"Connection succesful.<br>";
    if(isset($_POST["submit"])){
    $firstname=$_POST["firstname"];
    $pn=$_POST["pn"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $pname=$_POST["pname"];
    $cardname=$_POST["cardname"];
    $cardnumber=$_POST["cardnumber"];
    $expyear=$_POST["expyear"];
    $cvv=$_POST["cvv"];
    $cp=$_POST["cp"];
    $sql="INSERT INTO bill VALUES ('$firstname','$pn','$address','$city','$pname','$cardname','$cardnumber','$expyear','$cvv','$cp')";
    $rs='';
    try{
      $rs = mysqli_query($con, $sql);
      
      // header( "location:main.html");//It helps to redirect to another page.
    }
    catch(Exception $e){
      // echo "<h4>Order Placed!</h4>";
  }
    

  if($rs)
  {
    echo "<h4>Order Placed!</h4>";
      // echo "<h4>SIGN IN SUCCESSFULL!</h4>";
  //  header( "location:loginform.php");//It helps to redirect to another page.  
  }else
  {
      echo "<br><h4>ECCEPTION</h4>";
  }
    $con->close();
}
?> 
</body>
</html>

