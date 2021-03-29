<?php
$firstName = "";
$lastName = "";
$dateOfBirth = "";
$email = "";
$message = "";

$validForm = false;

$firstNameErrMsg = "";
$lastNameErrMsg = "";
$dateOfBirthErrMsg = "";
$emailErrMsg = "";
$messageErrMsg = "";

if(isset($_POST["submitForm"])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $dateOfBirth = $_POST['dateOfBirth'];
  $email = $_POST['email'];
  $message = $_POST['message'];

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

  $validForm = true;

  validateFirstName();
  validateLastName();
  validateDateOfBirth();
  validateEmail();
  validateMessage();

  if($validForm) {
    $toEmail = "gbgrandberg@dmacc.edu";
    $subject = "Week 2 Assignment";
    $emailBody = "The week 2 assignment was completed and the form results are in! \n First Name: $firstName \n Last Name: $lastName \n Date of Birth: $dateOfBirth \n Email: $email \n Message: $message \n Hope you enjoy! \n Sincerely, \n Erica Manning";
    $emailMessage = wordwrap($emailBody, 70);
    $fromEmail = "contact@ericamanning.com";
    $headers = "From: " . $fromEmail;

    if(mail($toEmail, $subject, $emailMessage, $headers)) {
      $confirmationMsg = "Form successfully submitted!";
    }
    else {
      $confirmationMsg = "There was an issue processing your form. Please try again.";
    }

  }
  else {
    $confirmationMsg = "Please fill out the entire form.";
  }

}

else {
  $confirmationMsg = "";
}



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Advanced PHP: Week 2 - Form</title>
    <style>
      * {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1><?php echo $confirmationMsg ?></h1>
    <div id = "container">
      <form method = "post" action="" name="contactForm" id="contactForm">
        <h1>Contact Us!</h1>
        <br><br>
        <label for="firstName">*First Name:</label><br>
        <td class="error"><?php echo "$firstNameErrMsg"; ?></td><br>
        <input type="text" id="firstname" name="firstName"><br><br>

        <label for="lastName">*Last Name:</label><br>
        <td class="error"><?php echo "$lastNameErrMsg"; ?></td><br>
        <input type="text" id="lastName" name="lastName"><br><br>

        <label for="dateOfBirth">*Date of Birth:</label><br>
        <td class="error"><?php echo "$dateOfBirthErrMsg"; ?></td><br>
        <input type="date" id="dateOfBirth" name="dateOfBirth"><br><br>

        <label for="email">*Email:</label><br>
        <td class="error"><?php echo "$emailErrMsg"; ?></td><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="message">*Message:</label><br>
        <td class="error"><?php echo "$messageErrMsg"; ?></td><br>
        <textarea id ="message" name="message" cols="30" rows="10"></textarea><br><br>

        <input type="reset" id="reset" name="reset" value="Reset">
        <input type="submit" id="submitForm" name="submitForm" value="Submit">
      </form>
    </div>
  </body>
</html>
