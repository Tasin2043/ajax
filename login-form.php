<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>

<?php 
	require 'DbRead.php';
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
$isValid = true;
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username)) {
			$usernameErr = "Empty!";
			$isValid= false;
		}
		if(empty($password)) {
			$passwordErr = "Empty!";
			$isValid= false;
		}
		if($isValid) {
			if(strlen($username) > 10) {
				$usernameErr = "Username max size 10!";
				$isValid = false;
				}
			if(strlen($password) > 10) {
				$passwordErr = "Password max size 10!";
				$isValid= false;
				}

			if($isValid) {
				$useranme = test_input($username);
				$password = test_input($password);
				$response = login($username, $password);
				if($response) {
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					header("Location: welcome-page.php");
				}
				else {
					$errorMessage = "Login Failed !!";
				}
			 }
		  }
	  }
	

	function read() {
		$resource = fopen(filepath, "r");
		$fz = filesize(filepath);
		$fr = "";
		if($fz > 0) {
			$fr = fread($resource, $fz);
		}
		fclose($resource);
		return $fr;
	} 
?>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Login Form:</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="<?php echo $uid; ?>">
			<span style="color:red"><?php echo $usernameErr; ?></span><br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span><br><br>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme">Remember Me:</label>

			<br><br>

			<input type="submit" name="submit" value="Login">
		</fieldset>

		
<p>New user? <a href="registration-form.php">Click here</a> for registration.</p>

	
</form>
</body>
</html>