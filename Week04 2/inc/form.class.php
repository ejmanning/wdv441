<?php
class Form {
  //properties
  var $firstName;
  var $lastName;
  var $dateOfBirth;
  var $email;
  var $message;
  var $validForm = false;
  var $firstNameErrMsg = "";
  var $lastNameErrMsg = "";
  var $dateOfBirthErrMsg = "";
  var $emailErrMsg = "";
  var $messageErrMsg = "";

  function getFirstName() {
		return $this->firstName;
	}

  function setFirstName($newFirstName) {
    $this->firstName = $newFirstName;
  }

  function getLastName() {
		return $this->lastName;
	}

  function setLastName($newLastName) {
    $this->firstName = $newLastName;
  }

  function getDateOfBirth() {
		return $this->dateOfBirth;
	}

  function setDateOfBirth($newDateOfBirth) {
    $this->dateOfBirth = $newDateOfBirth;
  }

  function getEmail() {
		return $this->email;
	}

  function setEmail($newEmail) {
    $this->email = $newEmail;
  }

  function getMessage() {
		return $this->$message;
	}

  function setMessage($newMessage) {
    $this->message = $newMessage;
  }

  function getValidForm() {
		return $this->validForm;
	}

  function setValidForm($newValidForm) {
    $this->validForm = $newValidForm;
  }
//validation functions can be reused with some modification for many forms
    function validateFirstName() {
    	global $firstName, $validForm, $firstNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    	$firstNameErrMsg = "";								//Clear the error message.
      if($firstName == "") {
    		$validForm = false;					//Name is required so the form is invalid
    		$firstNameErrMsg = "First name is required";	//Error message for this validation
    	} else if(!filter_var($firstName, FILTER_SANITIZE_STRING)) {
        $validForm = false;
        $firstNameErrMsg = "The first name you entered is not valid. Try again.";
      }

    }

    function validateLastName() {
    	global $lastName, $validForm, $lastNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    	$lastNameErrMsg = "";								//Clear the error message.
      if($lastName == "") {
    		$validForm = false;					//Last name is required so the form is invalid
    		$lastNameErrMsg = "Last name is required";	//Error message for this validation
    	} else if(!filter_var($lastName, FILTER_SANITIZE_STRING)) {
        $validForm = false;
        $lastNameErrMsg = "The last name you entered is not valid. Try again.";
      }

    }

    function validateDateOfBirth() {
      global $dateOfBirth, $validForm, $dateOfBirthErrMsg;
      $dateOfBirthErrMsg = "";
      $dateRegex = '~^\d{2}/\d{2}/\d{4}$~';
      if($dateOfBirth == "") {
        $validForm = false;
        $dateOfBirthErrMsg = "Date of birth is required";
      } else if(!filter_var($dateOfBirth, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> $dateRegex)))) {
        $validForm = false;
        $dateOfBirthErrMsg = "The date of birth you entered is not valid. Try again.";
      }
    }

    function validateEmail() {
    	global $email, $validForm, $emailErrMsg;
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if($email == "") {
        $validForm = false;					//Email is required so the form is invalid
        $emailErrMsg = "Email is required";	//Error message for this validation
      } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			$validForm = false;
    			$emailErrMsg = "The email you entered is not valid. Try again.";
    	}
    }

    function validateMessage() {
      global $message, $validForm, $messageErrMsg;
      $messageErrMsg = "";
      if($message == "") {
        $validForm = false;
        $messageErrMsg = "Message is required";
      } else if(!filter_var($message, FILTER_SANITIZE_STRING)) {
        $validForm = false;
        $messageErrMsg = "The message you entered is not valid. Try again.";
      }
    }

    function sendEmail() {
      if($validForm) {
        $toEmail = "gbgrandberg@dmacc.edu";
        $subject = "Week 2 Assignment";
        $emailBody = "The week 2 assignment was completed and the form results are in! \n First Name: $firstName \n Last Name: $lastName \n Date of Birth: $dateOfBirth \n Email: $email \n Message: $message \n Hope you enjoy! \n Sincerely, \n Erica Manning";
        $emailMessage = wordwrap($emailBody, 70);
        $fromEmail = "contact@ericamanning.com";
        $headers = "From: " . $fromEmail;
      }
      //if(mail($toEmail, $subject, $emailMessage, $headers) {
      //  $confirmationMsg = "Form successfully submitted!";
      //} else {
      //  $confirmationMsg = "There was an issue processing your form. Please try again.";
      //}
    }



} ?>
