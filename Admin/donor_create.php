<?php
require_once ("requiredpages.php"); ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>form</title>
    </head>
    <body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <div>
        <div class="col-md-8 col-xs-4">
            <form action="" method="post" >
                <div class="container">
                    <div class="form-group">
                        <label for = "name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="enter your full name">
                    </div>
                    <div class="form-group">
                        <label for = "blood_group">Blood Group</label>
                        <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="enter your blood group">
                    </div>
                    <div class="form-group">
                        <label for = "contact_number">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number">
                    </div>
                    <div class="form-group">
                        <label for = "address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="enter your address">
                    </div>
                    <div class="form-group" align="center">
                        <button type="create_donor" class="btn btn-primary" value="create_donor" name="create_donor">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    </body>
    </html>

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