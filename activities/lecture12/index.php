<?php
// Create your variables for your form data
// In this case, we can leave them empty since
// the value they'll hold will be provided when
// the user submits the form
$valid = '';
$postMsg = '';
$name = '';
$lastname = '';

// Lets create a function that cleans the data provided by the user 
// through the input fields
function clean($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

// firstname
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$postMsg = 'There was a POST request';
	if(empty($_POST['name'])){
		$name = 'First name is required';
	} else {
		$name= clean($_POST['name']);
		$nameRegex = '/^[A-Za-z]+( [A-Za-z]+)?$/';
		if(!preg_match($nameRegex, $name)){
			$name = 'invalid name';
		} else {
			$name = 'valid name';
		}
	}
}

//lastname
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$postMsg = 'There was a POST request';
	if(empty($_POST['lastname'])){
		$lastname = 'Last name is required';
	} else {
		$lastname= clean($_POST['lastname']);
		$lastNameRegex = "/^[A-Za-z'-]+$/";
		if(!preg_match($lastNameRegex, $lastname)){
			$lastname = 'invalid last-name';
		} else {
			$lastname = 'valid last-name';
		}
	}
}

// Lets try to validate the email input using filters
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$postMsg = 'There was a POST request';
	if(empty($_POST['email'])) {
		$email = 'Email is required';
	} else {
		$email = clean($_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = 'invalid email';
		} else {
			$email = 'valid email';
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Gabriella Mosquera">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="container">
		<form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset>
				<legend>Registration</legend>
				<p>
					<label for="name">First Name: </label>
					<input name="name" id="name" type="text" size="40">
				</p>
				<p>
					<label for="lastname">Last Name: </label>
					<input name="lastname" id="lastname" type="text" size="40">
				</p>
				<input type="submit" name="submit" value="Register">
			</fieldset>
			<p> <span class="error">Valid or Not: </span><em><?= $valid; ?></em></p>
			<p> <span class="success">First Name: </span><em><?= $name; ?></em></p>
			<p> <span class="success">Last Name: </span><em><?= $lastname; ?></em></p>
			<p> <span class="success">Post Message: </span><em><?= $postMsg; ?></em></p>
		</form>
	</div>
</body>
</html>