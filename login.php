<?php
    require_once ("init.php"); ?>
<!DOCTYPE html>
<?php echo file_get_contents("./Html_file/login.html"); ?>




<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $blood_group = trim($_POST['blood_group']);
    $contact_number = trim($_POST['contact_number']);
    $address = trim($_POST['address']);

    $user = new Donor();
    $user->name = $name;
    $user->blood_group = $blood_group;
    $user->contact_number = $contact_number;
    $user->address = $address;
    $user->save_object();
}
?>