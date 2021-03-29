<?php

	class ContactForm2 {
		//self posting variables
		var $status = "";
		var $firstName = "";
		var $lastName = "";
		var $dateOfBirth = "";
		var $email = "";
		var $message = "";
		var $firstNameERR = "";
		var $lastNameERR = "";
		var $dateOfBirthERR = "";
		var $emailERR = "";
		var $messageERR = "";
		
		
		//functions
		function validateDate($date, $format = 'Y-m-d'){
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) === $date;
		}
		
		function SetFromPost($dataArray) {
			$this->firstName = $dataArray["firstName"];
			$this->lastName = $dataArray["lastName"];
			$this->dateOfBirth = $dataArray["dateOfBirth"];
			$this->email = $dataArray["email"];
			$this->message = $dataArray["message"];			
		}
		
		function SendContactForm() {
						
			$to = $this->email;
			$subject = "Week 2 E-mail";
			$message = "My name is ".$this->firstName." ".$this->lastName.". My Birthday is ".$this->dateOfBirth.". I would like you to know, ".$this->message;
			$headers = "From:" . "test@test.com";
			mail($to, $subject, $message, $headers);
		}

		function ValidateData() {
			$validPost = true;

			//firstname
			$this->firstName = filter_var($firstName);
			if (!is_numeric($this->firstName)){
				$this->firstNameERR = "";
			}
			else {
				//failure to validate
				$this->firstNameERR = "Please use non-numerics";
				$validPost = false;
			}
			//lastname
			$this->lastName = filter_var($this->lastName);
			if (!is_numeric($this->lastName)){
				$this->lastNameERR = "";

			}
			else{
				//failure to validate
				$this->lastNameERR = "Please use non-numerics";
				$validPost = false;
			}
			//date
			$this->dateOfBirth = filter_var($this->dateOfBirth);
			if ($this->validateDate($dateOfBirth)){
				$this->dateOfBirthERR = "";
			}
			else{
				//failure to validate
				$this->dateOfBirthERR = "Invalid Date";
				$validPost = false;
			}
			//email
			$this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) === false){
				$this->emailERR = "";
			}
			else {
				//failure to validate
				$this->emailERR = "Invalid E-mail Adress";
				$validPost = false;
			}
			//message
			$this->message = filter_var($this->message);
			if (filter_var($this->message)){
				$this->messageERR = "";
			}
			else{
				//failure to validate
				$this->messageERR = "Invalid characters in message";
				$validPost = false;
			}
			
			return $validPost;
		}
	}

//submition
if (isset($_POST["submit"])){
	$contactForm = new ContactForm2();
	
	$contactForm->SetFromPost($_POST);
	
	$validPost = $contactForm->ValidateData();
	
	//delivery
		if($validPost){
			$status = "success";
			$contactForm->SendContactForm();
		}
		else {
			$status = "failure";
		}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>E-mail Refresher</title>
	<style>
		#container {
			width: 400px;
			padding: 15px;
			margin-right: auto;
			margin-left: auto;
			background-color: lightgoldenrodyellow;
			text-align: left;
		}
		#emailForm {
			display: flex;
			flex-direction: column;
			margin-left: auto;
			margin-right: auto;

		}
		label {
			margin: 5px;
		}
		.center {
			text-align: center;
		}
		.buttons {
			margin: 15px;
		}
		.error {
			color: red;
			font-size: 75%;
		}
	</style>
</head>

<body>
	<div id = "container">
		<h1 class = "center">E-mail Form</h1>
		<form action = "index.php" method = "post" id = "emailForm">
			<label>First Name
				<input type = "text" name = "firstName" placeholder="John" id = "firstName" value="<?php echo $contactForm->firstName?>" required ><?php echo $firstNameERR?>
			</label>
			<label>Last Name
				<input type = "text" name = "lastName" placeholder="Doe" id = "lastName" value="<?php echo $contactForm->lastName?>" required><?php echo $lastNameERR?>
			</label>
			<label>Date of Birth
				<input type = "date" name = "dateOfBirth" id = "dateOfBirth" value="<?php echo $contactForm->dateOfBirth?>" required><?php echo $dateOfBirthERR?>
			</label>
			<label>E-mail Address
				<input type = "email" name = "email" placeholder = "johndoe1975@gmail.com" id = "email" value="<?php echo $email?>" required><?php echo $emailERR?>
			</label>
			<label for = "message">Message</label><?php echo $contactForm->messageERR?>
			<textarea name = "message" placeholder="your message here." id = "message" rows="10" cols="40" required><?php echo $message?></textarea>
			
			<div class = "center buttons">
				<input type = "reset" name = "reset" id = "reset">
				<input type = "submit" name = "submit" id = "submit">
			</div>
			<?php echo $status?>
		
		</form>
	</div>
</body>
</html>