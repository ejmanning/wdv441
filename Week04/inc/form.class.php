<?php
class Form {
  //properties
  var $firstName = "";
  var $lastName = "";
  var $dateOfBirth = "";
  var $email = "";
  var $message = "";
  var $firstNameErrMsg = "";
  var $lastNameErrMsg = "";
  var $dateOfBirthErrMsg = "";
  var $emailErrMsg = "";
  var $messageErrMsg = "";
  var $confirmationMsg = "";

  function setPropertiesFromArray($dataToSet) {
    $this->firstName = $dataToSet{'firstName'};
    $this->lastName = $dataToSet{'lastName'};
    $this->dateOfBirth = $dataToSet{'dateOfBirth'};
    $this->email = $dataToSet{'email'};
    $this->message = $dataToSet{'message'};

    $this->firstName = filter_var($this->firstName, FILTER_SANITIZE_STRING);
    $this->lastName = filter_var($this->lastName, FILTER_SANITIZE_STRING);
    $this->dateOfBirth = filter_var($this->dateOfBirth, FILTER_SANITIZE_NUMBER_INT);
    $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
    $this->message = filter_var($this->message, FILTER_SANITIZE_STRING);
  }

  function validateDataProperties() {
    $isValid = true;

    if($this->firstName == "") {
      $firstNameErrMsg = "Please enter first name";
      $isValid = false;
    }

    if($this->lastName == "") {
      $lastNameErrMsg = "Please enter last name";
      $isValid = false;
    }

    if($this->dateOfBirth == "") {
      $dateOfBirthErrMsg = "Please enter date of birth";
      $isValid = false;
    }

    if($this->email == "") {
      $emailErrMsg = "Please enter email";
      $isValid = false;
    }

    if($this->message == "") {
      $messageErrMsg = "Please enter message";
      $isValid = false;
    }

    return $isValid;
  }

  function sendContactEmail() {

    $isValid = $this->validateDataProperties();

    $toEmail = "ericajanemann@gmail.com";
    $subject = "Week 2 Assignment";
    $emailBody = "The week 2 assignment was completed and the form results are in! \n First Name: $this->firstName \n Last Name: $this->lastName \n Date of Birth: $this->dateOfBirth \n Email: $this->email \n Message: $this->message \n Hope you enjoy! \n Sincerely, \n Erica Manning";
    $emailMessage = wordwrap($emailBody, 70);
    $fromEmail = "contact@ericamanning.com";
    $headers = "From: " . $fromEmail;

    if($isValid) {
      if(mail($toEmail, $subject, $emailMessage, $headers)) {
        $this->confirmationMsg = "Form successfully submitted!";
      } else {
          $this->confirmationMsg = "There was an issue processing your form. Please try again.";
      }
    } else {
      $this->confirmationMsg = "";
    }
  }



} ?>
