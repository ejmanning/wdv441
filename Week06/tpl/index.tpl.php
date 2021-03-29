<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
       body {
          background-color: #b5f1ff;
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
    <header>
        <h2>News Articles</h2>
    </header>

<table>
<tr >
    <td class="button"><a href="article-edit.php"?>Add new article</a></td>
</tr>

</table><br>
  <div class = "search">
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
      Search:
      <select name="filterColumn">
          <option value="articleTitle">Article Title</option>
          <option value="articleAuthor">Article Author</option>
          <option value="articleDate">Article Date</option>
          <option value="articleContent">Article Content</option>
      </select>
      &nbsp;<input type="text" name="filterText"/>
      &nbsp;<input type="submit" name="filter" value="Search"/>
  </form>
  </div>

  <table border="1">
    <tr>
      <th>Article Title&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC">D</a></th>
      <th>Article Author&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th>
      <th>Article Content&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleContent&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleContent&sortDirection=DESC">D</a></th>
      <th>Article Date&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=DESC">D</a></th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
  </tr>

        <?php foreach ($articleList as $articleInfo) { ?>
        <tr>
            <td>
                <?php echo $articleInfo['articleTitle'];?>
            </td>

            <td>
                <?php echo $articleInfo['articleAuthor'];?>
            </td>

            <td>
                <?php echo $articleInfo['articleContent'];?>
            </td>

            <td>
                <?php echo $articleInfo['articleDate'];?>
            </td>

            <td class="button">
                <a href="article-edit.php?articleID=<?php echo $articleInfo['articleID'];?>">Edit</a>
            </td>
            <td class="button">
                <a href="article-view.php?articleID=<?php echo $articleInfo['articleID'];?>">View</a>
            </td>
        </tr>

        <?php } ?>
    </table>

</body>
</html>
