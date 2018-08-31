<?php
    require_once ("requiredpages.php");
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


    </head>
    <body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <form action="" method="post">
        <div class="container">
            <div class="form-group">
                <label for = "name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter your full name">
            </div>
            <div class="form-group">
                <label for = "blood_group">Blood Group</label>
                <input type="text" class="form-control" id="blood_gropup" name="blood_group" placeholder="enter your blood group">
            </div>
            <div class="form-group">
                <label for = "contact_number">Contact Number</label>
                <input type="number" class="form-control" id="contact_number" name="contact_number" placeholder="enter your contact number">
            </div>
            <div class="form-group">
                <label for = "address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="enter your address">
            </div>
            <button class="btn btn-outline-primary" type="update_donor" value = "update_donor" name="update_donor">submit</button>
        </div>
    </form>

    </body>
    </html>

<?php
if(isset($_POST['update_donor'])){
    $name = trim($_POST['name']);
    $blood_group = trim($_POST['blood_group']);
    $contact_number = trim($_POST['contact_number']);
    $address = trim($_POST['address']);
    $id = trim($_GET['id']);
    $donor = Donor::find_by_id($id);
    $donor->name = $name;
    $donor->blood_group = $blood_group;
    $donor->contact_number = $contact_number;
    $donor->address = $address;
    $donor->update_object();

}