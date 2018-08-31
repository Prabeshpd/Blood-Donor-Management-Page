<?php require_once ("requiredpages.php"); ?>
<?php

$donor = Donor::find_by_id($_GET['id']);
if($donor){
    $donor->delete_object();
}

?>
