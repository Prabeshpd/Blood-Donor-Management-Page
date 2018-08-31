<?php
require_once("requiredpages.php"); ?>
<?php
if(!$session->is_admin_signed_in()){
    redirect("admin_login.php");
}
?>


<?php
$donor = Donor::find_all();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <title>admin</title>



</head>
<body>
<h3>ADMIN PAGE</h3>


<div class="container">
    <div class="col-md-12" >
        <table class="table table-hover" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blood_group</th>
                <th>Contact_number</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($donor as $us) : ?>
                <tr>
                    <td><?php echo $us->id ?></td>
                    <td><?php echo $us->name ?>
                        <div>
                            <a href="donor_delete.php/?id=<?php echo $us->id; ?>">Delete</a>
                            <a href="donor_update.php/?id=<?php echo $us->id; ?>">Edit</a>
                            <a href="donor_create.php">Create</a>
                        </div>
                    </td>
                    <td><?php echo $us->blood_group ?></td>
                    <td><?php echo $us->contact_number ?></td>
                    <td><?php echo $us->address ?></td>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<form method="post" action="">
    <div align="center">
        <a class="btn btn-primary btn-lg" href="admin_logout.php" role="button">logout</a>
    </div>
</form>




</body>
</html>