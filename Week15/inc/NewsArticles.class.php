<?php

// class to handle interaction with the newsArticles table
class NewsArticles
{
    // property to hold our data from our article
    var $articleData = array();
    // property to hold errors
    var $errors = array();
    // property for holding a reference to a database connection so we can reuse it
    var $db = null;

    function __construct()
    {
      // create a connection to our database
      //localhost
      $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2021;charset=utf8',
          'wdv441_user', 'Frozen21!');

      //host
      /*$this->db = new PDO('mysql:host=localhost;dbname=emanning11_wdv441_2021;charset=utf8',
          'emanning11_wdv441_2021', 'Frozen21!');*/
    }

    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray)
    {
        $this->articleData = $dataArray;

        //var_dump($this->articleData, "test");
    }

    // santize the data in the passed array, return the array
    function sanitize($dataArray)
    {
        // sanitize data based on rules
        $dataArray['articleTitle'] = filter_var($dataArray['articleTitle'], FILTER_SANITIZE_STRING);
        $dataArray['articleContent'] = filter_var($dataArray['articleContent'], FILTER_SANITIZE_STRING);
        $dataArray['articleAuthor'] = filter_var($dataArray['articleAuthor'], FILTER_SANITIZE_STRING);
        $dataArray['articleDate'] = filter_var($dataArray['articleDate'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }

    // load a news article based on an id
    function load($articleID)
    {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM newsArticles WHERE articleID = ?");

        // execute the prepared statement passing in the id of the article we
        // want to load
        $stmt->execute(array($articleID));

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
        // save data from articleData property to database
        if (empty($this->articleData['articleID']))
        {
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO newsArticles
                    (articleTitle, articleContent, articleAuthor, articleDate)
                 VALUES (?, ?, ?, ?)");

            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate']
                )
            );

            // if the execute returned true, then store the new id back into our
            // data property
            if ($isSaved)
            {
                $this->articleData['articleID'] = $this->db->lastInsertId();
            }
        }
        else
        { // if this is an update of an existing record, create a prepared update
          //statement
            $stmt = $this->db->prepare(
                "UPDATE newsArticles SET
                    articleTitle = ?,
                    articleContent = ?,
                    articleAuthor = ?,
                    articleDate = ?
                WHERE articleID = ?"
            );

            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate'],
                    $this->articleData['articleID']
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

        // validate the data elements in articleData property
        if (empty($this->articleData['articleTitle']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['articleTitle'] = "Please enter a title";
            $isValid = false;
        }

        if (empty($this->articleData['articleContent']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['articleContent'] = "Please enter content";
            $isValid = false;
        }

        if (empty($this->articleData['articleAuthor']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['articleAuthor'] = "Please enter an author";
            $isValid = false;
        }

        if (empty($this->articleData['articleDate']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['articleDate'] = "Please enter a date";
            $isValid = false;
        }

        // return valid t/f
        return $isValid;
    }

    // get a list of news articles as an array
/*
    function getList() {
        $articleList = array();

        // TODO: get the news articles and store into $articleList
        $sql = "SELECT * FROM newsArticles ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // return the list of articles
        return $articleList;
    }
*/

    function getList(
		$sortColumn = null,
		$sortDirection = null,
		$filterColumn = null,
		$filterText = null,
		$page = null
	) {

        $articleList = array();

        $sql = "SELECT * FROM newsArticles ";

        if (!is_null($filterColumn) && !is_null($filterText)) {
            $sql .= " WHERE " . $filterColumn . " LIKE ?";
        }

        if (!is_null($sortColumn)) {
            $sql .= " ORDER BY " . $sortColumn;

            if (!is_null($sortDirection)) {
                $sql .= " " . $sortDirection;
            }
        }

		// setup paging if passed
		if (!is_null($page)) {
			$sql .= " LIMIT " . ((2 * $page) - 1) . ",2";
		}
//var_dump($sql);die;
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));

            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $articleList;
    }

    function exportNewsArticles($filename) {
        $articleData = $this->getList();

        $outputFileHandle = fopen(dirname(__FILE__) . "/../" . $filename, "x");

        if ($outputFileHandle) {

            if (is_array($articleData)) {
                foreach ($articleData as $rowData) {
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

                while (feof($importFileHandle) === false) {
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
                "/../public/images/" . $this->articleData['articleID'] . "_article.jpg");
    }


}
?>
