<html>
    <body>
        <div>Users - 
            <a href="user-edit.php">Add New User</a>
        </div>        
        <div>
            <!-- header info -->
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Username</div>
                <div style="float:left; border:1px solid black;">User Level</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($userList as $userData) { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $userData['username']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $userData['userlevel']; ?></div>
                    <div style="float:left; border:1px solid black;"><a href="user-edit.php?userId=<?php echo $userData['userId']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="user-view.php?userId=<?php echo $userData['userId']; ?>">View</a></div>
                </div>
            <?php } ?>                
        </div>
    </body>
</html>