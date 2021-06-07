<?php
class Users
{
    var $userData = array();
    var $errors = array();

    var $db = null;

    function __construct()
    {
      // create a connection to our database
      //localhost
      /*$this->db = new PDO('mysql:host=localhost;dbname=wdv441_2021;charset=utf8',
          'wdv441_user', 'Frozen21!');*/

      //host
      $this->db = new PDO('mysql:host=localhost;dbname=emanning11_wdv441_2021;charset=utf8',
          'emanning11_wdv441_2021', 'Frozen21!');
    }

    function set($dataArray)
    {
        $this->userData = $dataArray;
    }

    function sanitize($dataArray)
    {
        // sanitize data based on rules

        return $dataArray;
    }
    function load($user_id)
    {
        $isLoaded = false;

        // load from database
        $stmt = $this->db->prepare("SELECT * FROM user_table WHERE user_id=?");
        $stmt->execute(array($user_id));

        if ($stmt->rowCount() == 1)
        {
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            $this->set($dataArray);

            $isLoaded = true;
        }

        //var_dump($stmt->rowCount());

        return $isLoaded;
    }

    function save()
    {
        $isSaved = false;

        // determine if insert or update based on articleID
        // save data from articleData property to database
        if (empty($this->userData['user_id']))
        {

            $stmt = $this->db->prepare(
                "INSERT INTO user_table
                    (username, password, user_level)
                 VALUES (?, ?, ?)");

            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['user_level']
                )
            );

            if ($isSaved)
            {
                $this->userData['user_id'] = $this->db->lastInsertId();
            }
        }
        else
        {
            $stmt = $this->db->prepare(
                "UPDATE user_table SET
                    username = ?,
                    password = ?,
                    user_level = ?
                WHERE user_id = ?"
            );

            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['user_level'],
                    $this->userData['user_id']
                )
            );
        }

        return $isSaved;
    }

    function validate()
    {
        $isValid = true;

        // if an error, store to errors using column name as key

        // validate the data elements in articleData property
        if (empty($this->userData['username']))
        {
            $this->errors['username'] = "Please enter a username";
            $isValid = false;
        }

        if (empty($this->userData['password']))
        {
            $this->errors['password'] = "Please enter a password";
            $isValid = false;
        }

        if (empty($this->userData['user_level']))
        {
            $this->errors['user_level'] = "Please enter a user level";
            $isValid = false;
        }

        return $isValid;
    }

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $userList = array();

        $sql = "SELECT * FROM user_table ";

        if (!is_null($filterColumn) && !is_null($filterText))
        {
            $sql .= " WHERE " . $filterColumn . " LIKE ?";
        }

        if (!is_null($sortColumn))
        {
            $sql .= " ORDER BY " . $sortColumn;

            if (!is_null($sortDirection))
            {
                $sql .= " " . $sortDirection;
            }
        }

        $stmt = $this->db->prepare($sql);

        if ($stmt)
        {
            $stmt->execute(array('%' . $filterText . '%'));

            $userList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $userList;
    }

function hashPassword($passwordToHash) {
  $passwordHash = password_hash($passwordToHash, PASSWORD_BYCRYPT);
}

function authorizeUser($inUsername, $inPassword){
  $user_id=null;
  $checkUsersql="SELECT user_id, username, password, user_level
                FROM user_table
                WHERE username = :username
                AND password = :password";
                $query= $this->db->prepare($checkUsersql);
                                    $query->bindParam('username', $inUsername, PDO::PARAM_STR);
                                    $query->bindValue('password', $inPassword, PDO::PARAM_STR);
                                    $query->execute();

                                    $count = $query->rowCount();
                                    $row   = $query->fetch(PDO::FETCH_ASSOC);

          if ($row!=false) {
            $user_id = $row["user_id"];
            $username = $row['username'];
            $password = $row['password'];
            $user_level = $row['user_level'];

            $user_info = array($user_id, $username, $password, $user_level);

          }
            return $user_info;
    }

function saveImage($fileArray)
    {
      move_uploaded_file
        (
            $fileArray['tmp_name'], dirname(__FILE__) . "/../public/images/" . $this->userData['user_id'] . "_user.jpg"
        );
    }

function getUserLevel($user_id) {
  $stmt = $this->db->prepare("SELECT user_level FROM user_table WHERE user_id=?");
    $stmt->execute(array($user_id));
  $user_level = $row['user_level'];
  return $stmt;
}
  }
?>
