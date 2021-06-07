<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
       body {
          background-color: #b5f1ff;
          text-align: center;
       }

       h1 {
         color: white;
         font-size: 300%;
         -webkit-text-stroke: 1px black;
       }

       div {
         padding: 1%;
       }

       table {
           background-color: white;
       }

       table,
       th,
       td {
           border: 1px solid black;
       }

       th,
       td {
           padding: 15px;
       }

       th {
           text-align: left;
       }

       table {
           border-spacing: 5px;
           margin: auto;
       }

       header {
           text-align: center;
           font-size: 2em;
           color: white;
           text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;

       }

       td a {
           text-decoration:none;
           font-size: 20px;
       }

       .button {
           background-color: white;
           color: black;
           border: 2px solid black;
           width: 20%;
           margin: auto;
       }

       .button:hover {
           background-color: gray;
           color: white;
       }

       .search {
         text-align: center;
       }


   </style>
</head>
    <body>

      <h1>FAQ</h1>
    
        <?php if($_SESSION['loggedIn'] == 'yes') { ?>
      <h2>Welcome <?php echo $_SESSION['username'];?>!</h2>
    <?php } else {?>
      <h2>Welcome! Log in</h2>
    <?php } ?>

    <?php if($_SESSION['loggedIn'] == 'yes') { ?>
      <div class = "button">Admin - <a href="../public/logout.php">Logout</a></div>
    <?php } else {?>
        <div class = "button">Admin - <a href="../public/login.php">Login here</a></div>
    <?php } ?>
      </div>
      <div class = "button">FAQ - <a href="../public/faq-edit.php">Add New FAQ</a></div>
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search:
                <select name="filterColumn">
                    <option value="faqID">FAQ ID</option>
                    <option value="faqQuestion">Question</option>
                    <option value="faqAnswer">Answer</option>
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>

            <table border="1">
                <tr>
                    <th>FAQ ID&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqID&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqID&sortDirection=DESC">D</a></th>
                    <th>Question&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqQuestion&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqQuestion&sortDirection=DESC">D</a></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($faqList as $faqData)
                { ?>
                    <tr>
                        <td><?php echo $faqData['faqID']; ?></td>
                        <td><?php echo $faqData['faqQuestion']; ?></td>
                        <td><a href="../public/faq-edit.php?faqID=<?php echo $faqData['faqID']; ?>">Edit</a></td>
                        <td><a href="../public/faq-view.php?faqID=<?php echo $faqData['faqID']; ?>">View</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
