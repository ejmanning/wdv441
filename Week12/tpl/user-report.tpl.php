<html>
  <head>
    <style>
    body {
      background-color: #b5f1ff;
      text-align: center;
    }

    .report {
      width: 50%;
      margin: auto;
      background-color: white;
      text-align: center;
      border: thick solid black;
      padding: 2%;
      font-size: 150%;
    }

    .button {
        background-color: white;
        border: 2px solid black;
        width: 10%;
        text-align: center;
        margin: 5px auto;
        font-size: 120%;
        padding: 15px;
    }

    .button:hover {
        background-color: gray;
        color: white;
    }

    </style>
  </head>
    <body>
      <div class = "report">
        <div>Users Report</div>
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Filter:
                <select name="filterColumn">
                    <option value="user_id">User ID</option>
                    <option value="username">Username</option>
                    <option value="password">Password</option>
                    <option value="user_level">User Level</option>
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="btnViewReport" value="View Report"/>
            </form>
        </div>
		<?php if (count($userList) > 0) { ?>
		<div>
			<a href="<?= $_SERVER['SCRIPT_NAME']; ?>?download=1&<?= $_SERVER["QUERY_STRING"]; ?>">Download Report</a><br><br>
            <table border="1">
                <tr>
                  <th>User ID&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=user_id&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=user_id&sortDirection=DESC">D</a></th>
                  <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=username&sortDirection=DESC">D</a></th>
                  <th>Password&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=password&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=password&sortDirection=DESC">D</a></th>
                  <th>User Level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=user_level&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?filterText=&btnViewReport=View+Report&sortColumn=user_level&sortDirection=DESC">D</a></th>
                </tr>
                <?php foreach ($userList as $userData) { ?>
                    <tr>
                        <td><?php echo $userData['user_id']; ?></td>
                        <td><?php echo $userData['username']; ?></td>
                        <td><?php echo $userData['password']; ?></td>
                        <td><?php echo $userData['user_level']; ?></td>
                    </tr>
                <?php } ?>
            </table>
          <?php
          $page = $_GET['page'] + 1;
           if($page > 1 && $page <= $numberOfPages || $page-0.5 == $numberOfPages) { ?>
			<a href="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $previousPageLink; ?>">Previous Page</a>
    <?php } if($numberOfPages > $page) { ?>
      <a href="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $nextPageLink; ?>">Next Page</a>
    <?php }?>
        </div>
		<?php } ?>
  </div>
  <div class="button">
    <a href="user-list.php">Back to User List</a>
  </div>
    </body>
</html>
