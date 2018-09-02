<?php require_once("requiredpages.php"); ?>
<?php
if ($session->is_admin_signed_in()) {
    redirect("admin.php");
}
if(isset($_POST['adminlogin'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $admin_user_found = adminuser::verify_admin_user($email,$password);
    if($admin_user_found){
        $session->login_the_admin($admin_user_found);
        redirect("admin.php");
    }else{
        $the_message = "your message or password is incorrect";
    }
}
else{
    $the_message = '';
    $email = '';
    $password = '';
}
?>
<?php echo file_get_contents("../Html_file/admin_login.html");
echo "<link rel='stylesheet' type='text/css' href='../Css%20File/form.css' />";
?>