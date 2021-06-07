<?php
class FAQ
{
    var $faqData = array();
    var $errors = array();

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

    function set($dataArray)
    {
        $this->faqData = $dataArray;
    }

    function sanitize($dataArray)
    {
        // sanitize data based on rules
        $dataArray['faqQuestion'] = filter_var($dataArray['faqQuestion'], FILTER_SANITIZE_STRING);
        $dataArray['faqAnswer'] = filter_var($dataArray['faqAnswer'], FILTER_SANITIZE_STRING);

        return $dataArray;
    }
    function load($faqID)
    {
        $isLoaded = false;

        // load from database
        $stmt = $this->db->prepare("SELECT * FROM faq WHERE faqID=?");
        $stmt->execute(array($faqID));

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
        if (empty($this->faqData['faqID']))
        {

            $stmt = $this->db->prepare(
                "INSERT INTO faq
                    (faqQuestion, faqAnswer)
                 VALUES (?, ?)");

            $isSaved = $stmt->execute(array(
                    $this->faqData['faqQuestion'],
                    $this->faqData['faqAnswer']

                )
            );

            if ($isSaved)
            {
                $this->faqData['faqID'] = $this->db->lastInsertId();
            }
        }
        else
        {
            $stmt = $this->db->prepare(
                "UPDATE faq SET
                    faqQuestion = ?,
                    faqAnswer = ?
                WHERE faqID = ?"
            );

            $isSaved = $stmt->execute(array(
                    $this->faqData['faqQuestion'],
                    $this->faqData['faqAnswer'],
                    $this->faqData['faqID']
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
        if (empty($this->faqData['faqQuestion']))
        {
            $this->errors['faqQuestion'] = "Please enter a question";
            $isValid = false;
        }

        if (empty($this->faqData['faqAnswer']))
        {
            $this->errors['faqAnswer'] = "Please enter an answer";
            $isValid = false;
        }

        return $isValid;
    }

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null, $page = null)
    {
        $faqList = array();

        $sql = "SELECT * FROM faq ";

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

        // setup paging if passed
    		if (!is_null($page)) {
          //var_dump($page);
    			$sql .= " LIMIT " . ((2 * $page) - 2) . ",2";
          //var_dump($sql);
          $total_pages_sql = "SELECT COUNT(*) FROM faq";
          $stmtPages = $this->db->prepare($total_pages_sql);
          $numberOfRows = $this->db->query($total_pages_sql)->fetchColumn();
          $numberOfRows = (int)$numberOfRows;
          $numberOfPages = $numberOfRows/2;
    		}

        $stmt = $this->db->prepare($sql);

        if ($stmt)
        {
            $stmt->execute(array('%' . $filterText . '%'));
            //var_dump($filterText);
            $faqList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //var_dump($stmt);


        return $faqList;
    }


function getPages($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null, $page = null)
{
    $faqList = array();

    $sql = "SELECT * FROM faq ";

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

    // setup paging if passed
		if (!is_null($page)) {
      //var_dump($page);
			//$sql .= " LIMIT " . ((2 * $page) - 2) . ",2";


		}

    $stmt = $this->db->prepare($sql);

    if ($stmt)
    {
        $stmt->execute(array('%' . $filterText . '%'));
        $numberOfRows = $stmt->rowCount();
        //var_dump($numberOfRows);
        $numberOfPages=$numberOfRows/2;
        //var_dump($numberOfPages);

        $faqList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    return $numberOfPages;
}


function authorizeFAQ($inQuestion, $inAnswer){
  $faqID=null;
  $checkFAQsql="SELECT faqID, faqQuestion, faqAnswer
                FROM faq
                WHERE faqQuestion = :faqQuestion
                AND faqAnswer = :faqAnswer";
                $query= $this->db->prepare($checkFAQsql);
                                    $query->bindParam('faqQuestion', $inQuestion, PDO::PARAM_STR);
                                    $query->bindValue('faqAnswer', $inAnswer, PDO::PARAM_STR);
                                    $query->execute();

                                    $count = $query->rowCount();
                                    $row   = $query->fetch(PDO::FETCH_ASSOC);

          if ($row!=false) {
            $faqID = $row["faqID"];
            $faqQuestion = $row['faqQuestion'];
            $faqAnswer = $row['faqAnswer'];

            $faq_info = array($faqID, $faqQuestion, $faqAnswer);

          }
            return $faq_info;
    }

function saveImage($fileArray)
    {
      move_uploaded_file
        (
            $fileArray['tmp_name'], dirname(__FILE__) . "/../public/images/" . $this->faqData['faqID'] . "_faq.jpg"
        );
    }
}
?>
