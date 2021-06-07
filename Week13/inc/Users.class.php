<?php
/*
// class to handle interaction with the newsarticles table
class Users
{
    // property to hold our data from our article
    var $userData = array();
    // property to hold errors
    var $errors = array();
    // property for holding a reference to a database connection so we can reuse it
    var $db = null;

    function __construct() 
    {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2021;charset=utf8', 
            'wdv441_user', 'wdv441_2021');           
    }
    
    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray)
    {
        $this->userData = $dataArray;
        
        //var_dump($this->userData, "test");
    }

    // santize the data in the passed array, return the array
    function sanitize($dataArray)
    {
        // sanitize data based on rules
        
        return $dataArray;
    }
    
    // load a user based on an id
    function load($userID)
    {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userID = ?");
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($userID));

        // check to see if we loaded the article
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
    }
    
    // save a news article (inserts and updates)
    function save() 
    {
        // create a flag to track if the save was successful
        $isSaved = false;
        
        // determine if insert or update based on articleID
        // save data from userData property to database
        if (empty($this->userData['userID']))
        {
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO users 
                    (username, password, userlevel) 
                 VALUES (?, ?, ?)");

            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['userlevel']
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) 
            {
                $this->userData['userId'] = $this->db->lastInsertId();
            }
        } 
        else 
        { // if this is an update of an existing record, create a prepared update 
          //statement
            $stmt = $this->db->prepare(
                "UPDATE users SET 
                    username = ?,
					password = ?,
                    userlevel = ?
                WHERE userID = ?"
            );
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['userlevel'],
                    $this->userData['userID']
                )
            );            
        }
                        
        // return the success flage
        return $isSaved;
    }
    
    // validate the data we have stored in the data property
    function validate()
    {
        // flag as true initially
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in userData property
        if (empty($this->userData['username']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['username'] = "Please enter a username";
            $isValid = false;
        }        
                 
		// check the database for existing username
				 
        // return valid t/f
        return $isValid;
    }
    
    // get a list of news articles as an array
    
    function getList() {
        $articleList = array();

        // TODO: get the news articles and store into $articleList
        $sql = "SELECT * FROM articles ";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
               
        // return the list of articles
        return $articleList;        
    }
    

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null) {
        $usersList = array();
        
        $sql = "SELECT * FROM users ";

        if (!is_null($filterColumn) && !is_null($filterText)) {
            $sql .= " WHERE " . $filterColumn . " LIKE ?";
        }
        
        if (!is_null($sortColumn)) {
            $sql .= " ORDER BY " . $sortColumn;
            
            if (!is_null($sortDirection)) {
                $sql .= " " . $sortDirection;
            }
        }
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));
            
            $usersList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        return $usersList;        
    }        
    
    function exportNewsArticles($filename) {
        $userData = $this->getList();
        
        $outputFileHandle = fopen(dirname(__FILE__) . "/../" . $filename, "x");

        if ($outputFileHandle) {
        
            if (is_array($userData)) {
                foreach ($userData as $rowData) {
                    fputcsv($outputFileHandle, $rowData);
                }
            }
            
            fclose($outputFileHandle);            
        }
    }
    
    function importNewsArticles($filename) {
        
        var_dump($filename);
        
        if (is_file($filename)) {
            
            $importFileHandle = fopen($filename, "r");
            
            if ($importFileHandle) {
            
                while (!feof($importFileHandle)) {
                    $rowData = fgetcsv($importFileHandle);
                    
                    if (is_array($rowData)) {
                        $rowData = array_combine(
                            array("articleID", 'articleTitle', 'articleContent', 'articleAuthor', 'articleDate'),
                            $rowData
                        );

                        if (isset($rowData['articleID']) && $rowData['articleID'] > 0) {
                            $this->load($rowData['articleID']);
                        }

                        $this->set($rowData);

                        if ($this->validate()) {
                            $this->save();
                        }                    
                    }
                    
                    //var_dump($rowData);
                }
                
                fclose($importFileHandle);
            }            
        }
    }    
    
    function saveImage($fileArray) {
        move_uploaded_file($fileArray['tmp_name'], dirname(__FILE__) . 
                "/../public/images/" . $this->userData['articleID'] . "_article.jpg");
    }

    // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }

    function userLogin($username, $password) {
        $userID = null;
        
        $password = $this->hashPassword($password);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT userId FROM " . $this->tableName . 
            " WHERE username = ? AND password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $userID = $dataArray['userId'];
        }
        
        return $userID;
    }
        
}
*/

require_once("Base.class.php");

class Users extends Base {
    // table name this class works with
    var $tableName = "users";
    // keyfield of the table
    var $keyField = "userId";
    // column names minus the keyword in the table
    var $columnNames = array(
        "username",
        "password",
        "userlevel"
    );
    
    function validate() {
        
        $isValid = parent::validate();
        
        if ($isValid) {
            // validate the data elements in userData property
            if (empty($this->data['username']))
            {
                // if not valid, set an error and flag as not valid
                $this->errors['username'] = "Please enter a username";
                $isValid = false;
            }                                    
            
            // if new record, make sure we have a password            
            if (!isset($this->data[$this->keyField]) || $this->data[$this->keyField] == 0) {
                if (empty($this->data['password'])) {
                    $this->errors['password'] = "Please enter a password";
                    $isValid = false;
                }
            }
        }
                
        return $isValid;
    }    
    
    function set($dataArray) {
        
        //var_dump($dataArray);
        
        if (isset($dataArray['password']) && !empty($dataArray['password']) && strlen($dataArray['password']) < 64) {
            $dataArray['password'] = $this->hashPassword($dataArray['password']);
        } 
        
        parent::set($dataArray);
        
        var_dump($this->data);
        //die;        
    }   
    
    // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }
    
    function userLogin($username, $password) {
        $userID = null;
        
        $password = $this->hashPassword($password);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT userID FROM " . $this->tableName . 
            " WHERE username = ? AND password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $userID = $dataArray['userID'];
        }
        
        return $userID;
    }
}
?>