<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($userErrorsArray['username']))                 
            { ?>
                <div><?php echo $userErrorsArray['username']; ?>
            <?php } ?>
            username: <input type="text" name="username" value="<?php echo (isset($dataArray['username']) ? $dataArray['username'] : ''); ?>"/><br>
            password: <input type="password" name="password" value=""/><br>
            user level: <select name="userlevel">
                <option value="1">Guest</option>
                <option value="2">User</option>
                <option value="3">Admin</option>
                </select>
            <input type="hidden" name="userID" value="<?php echo (isset($dataArray['userID']) ? $dataArray['userID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>