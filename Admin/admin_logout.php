<?php
require_once("requiredpages.php"); ?>
<?php
$session->logout_the_admin();
redirect("admin_login.php");
?>