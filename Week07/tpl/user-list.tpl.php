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
      <h1>Users</h1>
      <div class = "button">Admin - <a href="/wdv441/Week07/public/login.php">Login here</a></div>

        <div class = "button">Users - <a href="/wdv441/Week07/public/user-edit.php">Add New User</a></div>
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search:
                <select name="filterColumn">
                    <option value="userID">User ID</option>
                    <option value="username">Username</option>
                    <option value="password">Password</option>
                    <option value="userLevel">User Level</option>
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>

            <table border="1">
                <tr>
                    <th>User ID&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userID&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userID&sortDirection=DESC">D</a></th>
                    <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=DESC">D</a></th>
                    <th>User Level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=DESC">D</a></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($userList as $userData)
                { ?>
                    <tr>
                        <td><?php echo $userData['user_id']; ?></td>
                        <td><?php echo $userData['username']; ?></td>
                          <td><?php echo $userData['user_level']; ?></td>
                        <td><a href="/wdv441/Week07/public/user-edit.php?userID=<?php echo $userData['user_id']; ?>">Edit</a></td>
                        <td><a href="/wdv441/Week07/public/user-view.php?userID=<?php echo $userData['user_id']; ?>">View</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
