<?php
require_once(__DIR__ . "/../inc/contactform1.class.php");

if(isset($_POST['submitButton'])) {
	$contactForm = new ContactForm();
	
	$contactForm->SetPropertiesFromArray($_POST);
	
	$isValid = $contactForm->ValidateDataProperties();
	
	if ($isValid) {
		$contactForm->SendContactEmail();
	}
}

?>

<html>

    <head>


    </head>


    <body>

        <h1> Contact </h1>

        <form id="contactForm" name="contactForm" method="post" action="">
            
            
            <p><label for="firstName">First Name:</label><br>
                <input type="text" name="firstName" id="firstName" value='<?php echo $contactForm->firstName; ?>'><br>
                <span><?php echo $contactForm->firstNameError?></span></p>

            <p><label for="lastName">Last Name:</label><br>
                <input type="text" name="lastName" id="lastName" value='<?php echo $contactForm->lastName; ?>'><br>
                <span><?php echo $contactForm->lastNameError?></p>

            <p><label for="dateOfBirth">Date of Birth:</label><br>
                <input type="date" name="dateOfBirth" id="dateOfBirth" value='<?php echo $contactForm->dateOfBirth; ?>'><br>
                <span><?php echo $contactForm->dateOfBirthError?></p>

            <p><label for="email">Email:</label><br>
                <input type="email" name="email" id="email" value='<?php echo $contactForm->email; ?>'><br>
                <span><?php echo $contactForm->emailError?></p>

            <p><label for="message">Message:</label><br>
                <textarea name="message" id="message"><?php echo $contactForm->message?></textarea><br>
                <span><?php echo $contactForm->messageError?></p>

            <p><input type="submit" id="submitButton" name="submitButton"></p>


        </form>

        <p><?php echo $contactForm->mailMessage ?></p>

    </body>

</html>