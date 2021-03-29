<?php
	class ContactForm {
		//Initialize variables
		var $firstName = "";
		var $lastName = "";
		var $dateOfBirth = "";
		var $email = "";
		var $message = "";
		var $firstNameError = "";
		var $lastNameError = "";
		var $dateOfBirthError = "";
		var $emailError = "";
		var $messageError = "";
		
		function SetPropertiesFromArray($dataToSet) {
			
			//Get form data
			$this->firstName = $dataToSet['firstName'];
			$this->lastName = $dataToSet['lastName'];
			$this->dateOfBirth = $dataToSet['dateOfBirth'];
			$this->email = $dataToSet['email'];
			$this->message = $dataToSet['message'];

			//Santize form data

			$this->firstName = filter_var($this->firstName, FILTER_SANITIZE_STRING);
			$this->lastName = filter_var($this->lastName, FILTER_SANITIZE_STRING);
			$this->dateOfBirth = filter_var($this->dateOfBirth, FILTER_SANITIZE_NUMBER_INT);
			$this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
			$this->message = filter_var($this->message, FILTER_SANITIZE_STRING);
		}

		function ValidateDataProperties() {
			//Validate form data

			$isValid = true;

			if($this->firstName == "") {
				$this->firstNameError = "Please enter a valid First Name";
				$isValid = false;
			}

			if($this->lastName == "") {
				$this->lastNameError = "Please enter a valid Last Name";
				$isValid = false;
			}

			if($this->dateOfBirth == "") {
				$this->dateOfBirthError = "Please enter a valid Date of Birth";
				$isValid = false;
			}

			if($this->email == "" || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$this->emailError = "Please enter a valid Email";
				$isValid = false;
			}

			if($this->message == "") {
				$this->messageError = "Please enter a valid Message";
				$isValid = false;
			}
			
			return $isValid;
		}

		function SendContactEmail() {

			$isValid = $this->ValidateDataProperties();

			//Mailer function
			$subject = "WDV 441 Contact Form";
			$headers = "From: test@test.com";
			$emailMessage = "Name: $this->firstName $this->lastName\nEmail: $this->email\nDate of birth: $this->dateOfBirth\n$this->message";
			$emailMessage = wordwrap($emailMessage,70);

			if($isValid) {
				if(!mail($email, $subject, $emailMessage, $headers)) {
					$mailMessage = "There was an issue. Please try again.";
				} else {
					$mailMessage = "Message sent successfully!";
				}
			}
			
			return $mailMessage;
		}
		
	}
?>