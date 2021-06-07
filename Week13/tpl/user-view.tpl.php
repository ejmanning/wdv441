<html>
    <body>
        username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        user level: <?php echo (isset($userDataArray['userlevel']) ? $userDataArray['userlevel'] : ''); ?><br>
        <a href="user-list.php">Back to List</a>        
    </body>
</html>