<?php
require_once("init.php"); ?>
<?php
$donor = Donor::find_all();?>
<?php
    $loc = Donor::location_finder();
    foreach ($loc as $location => $value){
        echo "Key=" . ", Value =" .$value;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <title>Blood donor Page</title>

</head>
<body>
    <? foreach ($donor as $don): ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $don->name; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
    <br />
    <br />
<?php endforeach; ?>

    <div class="col-md-4">
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="blood-group"> Select Blood Group</label>
                    <select class="form-control" id="blood-group">
                        <option>A-Positive-</option>
                        <option>A-Negative</option>
                        <option>B-Positive</option>
                        <option>B-Negative</option>
                        <option>AB-Positive</option>
                        <option>AB-Negative</option>
                        <option>O-Positive</option>
                        <option>O-Negative</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="address"> Location </label>
                <select class="form-control" id="address">
                <?php foreach ($loc as $location): ?>
                    <option><?php echo $location; ?></option>
                   <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
    </div>
</body>
</html>