<?php
define("PASSWORD_SALT", "Th!s!SmYS@lTf0rMYP@Ss");

var_dump(hash("sha256", "myPass01" . PASSWORD_SALT));
?>