<?php
    require_once ("requiredpages.php");
?>
<?php echo file_get_contents("../Html_file/donor_update.html"); ?>

<?php
if(isset($_POST['update_donor'])){
    $name = trim($_POST['name']);
    $blood_group = trim($_POST['blood_group']);
    $contact_number = trim($_POST['contact_number']);
    $address = trim($_POST['address']);
    $id = $_GET['id'];
    $resultt = Donor::update_user($id, $name, $blood_group, $contact_number, $address);
    if($resultt){
         redirect("admin.php");
    }
    else{
        echo "failed";
    }

}