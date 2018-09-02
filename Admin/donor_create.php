<?php
require_once ("requiredpages.php"); ?>
<?php echo file_get_contents("../Html_file/donor_create.html"); ?>

<?php
if (isset($_POST['create_donor'])) {
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