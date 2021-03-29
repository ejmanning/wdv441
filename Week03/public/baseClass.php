<?php
class BaseDataClass {
  function loadData($tableName, $keyField, $keyValue) {

  }

  function validateData($dataArray) {

  }

  function saveData($dataArray) {

  }
}


class User extends BaseDataClass {
  function loadUser($userID) {
    $returnValue = $this->loadData('userTable', 'userID', $userID);

    //any specific application code for userID
    return $returnValue;
  }
}
?>
