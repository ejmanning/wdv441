<?php

require("../inc/form.class.php");



if(isset($_POST["submitForm"])) {
  $user1 = new Form();

  $user1->setFirstName($_POST['firstName']);
  $user1->setLastName($_POST['lastName']);
  $user1->setDateOfBirth($_POST['dateOfBirth']);
  $user1->setEmail($_POST['email']);
  $user1->setMessage($_POST['message']);

  validateFirstName();
  validateLastName();
  validateDateOfBirth();
  validateEmail();
  validateMessage();
  sendEmail();

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
