<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Form Submission</title>
</head>
<body>
  <h1>REGISTRATION FORM</h1>

  <?php
  require 'DbInsert.php';

  $firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $praddressErr =$peaddressErr =  $phoneErr = $emailErr = $webErr = $usernameErr = $passwordErr =  "";

  if($_SERVER['REQUEST_METHOD'] ==="POST") {
    $firstname = $_POST['firstname']; 
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];
    $praddress = $_POST['praddress'];
    $peaddress = $_POST['peaddress']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $web = $_POST['web']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isValid = true;
    

    if(empty($firstname)) {
      $firstnameErr = "Empty!";
      $isValid = false;

  }
   if(empty($lastname)) {
    $lastnameErr = "Empty!";
    $isValid = false;
  }

  if(empty($gender)) {
    $genderErr = "Empty!";
    $isValid = false;
  }

   if(empty($dob)) {
    $dobErr = "Empty!";
    $isValid = false;
  }
   if(empty($religion)) {
      $religionErr = "Empty!";
    $isValid = false;

  }
   if(empty($praddress)) {
    $praddressErr = "Empty!";
   $isValid = false;
  }
   if(empty($peaddress)) {
      $peaddressErr = "Empty!";
    $isValid = false;

  }
   if(empty($phone)) {
    $phoneErr = "Empty!";
  $isValid = false;
  }
   if(empty($email)) {
      $emailErr = "Empty!";
   $isValid = false;

  }
   if(empty($web)) {
    $webErr = "Empty!";
  $isValid = false;
  }
 

  if(empty($username)) {
    $usernameErr = "Empty!";
   $isValid = false;
  }

if(empty($password)) {
    $passwordErr = "Empty!";
  $isValid = false;
  }

if($isValid){
    $firstname = test_input($firstname);
    $lastname = test_input($lastname);
    $gender = test_input($gender);
    $dob = test_input($dob);
    $religion = test_input($religion);
    $praddress = test_input($praddress);
    $peaddress = test_input($peaddress);
    $phone = test_input($phone);
    $email = test_input($email);
    $web = test_input($web);
    $username = test_input($username);
    $password = test_input($password);
    $response = register($firstname, $lastname, $gender, $dob, $religion,$praddress, $peaddress, $phone ,$email, $web,$username, $password); 

if($response){
   $successfulMessage = "Successfully saved!";
 }
 else{
  $errorMessage = "Error while saving!";
     }
    }
   }
  function test_input($data) {
         $data =trim($data);
         $data =stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       } 

?>


<fieldset>
   <legend>Basic Information:</legend>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name= "registrationForm" onsubmit= "return isvalid()">

 
   <br> <label for="firstname">FIRST NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="firstname" name="firstname"> <span style="color: red" id="firstnameErr" ><?php echo $firstnameErr; ?></span>
        <br><br>


        <label for="lastname">LAST NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="lastname" name="lastname"> <span style="color: red" id="lastnameErr"><?php echo $lastnameErr; ?></span>
        <br><br>


<label for="gender"> GENDER : <span style="color: red;">*</span>:</label>
<input type="radio" name="gender" value="gender"> Male
<span style="color: red" id="genderErr"><?php echo $genderErr; ?></span>
<input type="radio" name="gender" value="gender"> Female 
<span style="color: red" id="genderErr"><?php echo $genderErr; ?></span>

<br><br>

<label for="dob">BIRTHDAY<span style="color: red;">*</span>:</label>
    <input type="date" id="dob" name="dob"> <span style="color: red" id="dobErr"><?php echo $dobErr; ?></span> <br><br>


    
      <label for="religion">RELIGION <span style="color: red;">*</span>: </label>
      <select name="religion" id="religion">
      <option value=""></option>
      <option value="islam">Islam</option>
      <option value="hindu">Hindu </option>
      <option value="buddho">Buddho</option>
      <option value="christan">Christan</option>
      <span style="color:red" id="religionErr"><?php echo $religionErr; ?></span> </select> 

</fieldset>
  <fieldset>

    <legend>Contact Information:</legend>

  <br><label for="praddress">PRESENT ADDRESS:</label>
        <input type="textarea" id="praddress" name="praddress"> <span style="color: red" id="praddressErr"><?php echo $praddressErr; ?></span>

        <br><br>

   <label for="peaddress">PERMANENT ADDRESS:</label>
        <input type="textarea" id="peaddress" name="peaddress"> <span style="color: red" id="peaddressErr"><?php echo $peaddressErr; ?></span><br><br>


    <label for="phone">PHONE:</label>
    <input type="tel" id="phone" name="phone"> <span style="color: red" id="phoneErr"><?php echo $phoneErr; ?></span><br><br>

     <label for="email">EMAIL:<span style="color: red;">*</span>:</label>
    <input type="email" id="email" name="email"> <span style="color: red" id="emailErr"><?php echo $emailErr; ?></span><br><br>

     <label for="web">PERSONAL WEBSITE LINK:</label>
    <input type="url" id="web" name="web"> <span style="color: red" id="webErr"><?php echo $webErr; ?></span><br><br>

 </fieldset>
 <fieldset>

    <legend>Account Information:</legend>

    <br><label for="username">USER NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="username" name="username"><span style="color: red" id="usernameErr"><?php echo $usernameErr; ?></span>

        <br><br>

   <label for="password">PASSWORD<span style="color: red;">*</span>:</label>
        <input type="password" id="password" name="password"><span style="color: red" id="passwordErr"><?php echo $passwordErr; ?></span>

        <br><br>


 </fieldset>
 <br><br>

 <input type="submit" name="submit" value="Register">

</form>
<br>
<br>

<p style ="color:green"><?php echo $successfulMessage; ?></p>
<p style ="color:red" ><?php echo $errorMessage; ?></p>

<p>Back to<a href="login-form.php">LOGIN</a></p>

<script>
    function isvalid() {
        var flag = true;
        var firstnameErr = document.getElementById("firstnameErr");
        var lastnameErr = document.getElementById("lastnameErr");
        var genderErr = document.getElementById("genderErr");
        var dobErr = document.getElementById("dobErr");
        var religionErr = document.getElementById("religionErr");
        var praddressErr = document.getElementById("praddressErr");
        var peaddressErr = document.getElementById("peaddressErr");
        var phoneErr = document.getElementById("phoneErr");
        var emailErr = document.getElementById("emailErr");
        var webErr = document.getElementById("webErr");
        var usernameErr = document.getElementById("usernameErr");
        var passwordErr = document.getElementById("passwordErr");
        var firstname = document.forms["registrationForm"]["firstname"].value;
        var lastname = document.forms["registrationForm"]["lastname"].value;
         var gender = document.forms["registrationForm"]["gender"].value;
          var dob = document.forms["registrationForm"]["dob"].value;
           var religion = document.forms["registrationForm"]["religion"].value;
            var praddress = document.forms["registrationForm"]["praddress"].value;
             var peaddress = document.forms["registrationForm"]["peaddress"].value;
              var phone = document.forms["registrationForm"]["phone"].value;
               var email = document.forms["registrationForm"]["email"].value;
                var web = document.forms["registrationForm"]["web"].value;
                 var username = document.forms["registrationForm"]["username"].value;
                  var password = document.forms["registrationForm"]["password"].value;
         firstnameErr.innerHTML= "";
         lastnameErr.innerHTML = "";
         genderErr.innerHTML = "";
         dobErr.innerHTML = "";
         religionErr.innerHTML = "";
         praddressErr.innerHTML = "";
         peaddressErr.innerHTML = "";
         phoneErr.innerHTML= "";
         emailErr.innerHTML= "";
         webErr.innerHTML = "";
         usernameErr.innerHTML = "";
         passwordErr.innerHTML = "";

        if (firstname === "") {
            flag = false;
            firstnameErr.innerHTML =" Empty";
        }

        if (lastname === "") {
            flag = false;
            lastnameErr.innerHTML ="Empty";
        }

         if (gender === "") {
            flag = false;
            genderErr.innerHTML ="Empty";
        }

         if (dob === "") {
            flag = false;
            dobErr.innerHTML ="Empty";
        }

         if (religion === "") {
            flag = false;
            religionErr.innerHTML ="Empty";
        }

         if (praddress === "") {
            flag = false;
            praddressErr.innerHTML ="Empty";
        }

         if (peaddress === "") {
            flag = false;
            peaddressErr.innerHTML ="Empty";
        }

         if (phone === "") {
            flag = false;
            phoneErr.innerHTML ="Empty";
        }

         if (email === "") {
            flag = false;
            emailErr.innerHTML ="Empty";
        }

         if (web === "") {
            flag = false;
            webErr.innerHTML ="Empty";
        }

         if (username === "") {
            flag = false;
            usernameErr.innerHTML ="Empty";
        }

         if (password === "") {
            flag = false;
            passwordErr.innerHTML ="Empty";
        }

    return flag;
}
</script>>    
</body>
</html>