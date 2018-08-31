<?php
require_once("init.php"); ?>
<?php
$donor = Donor::find_all();?>
<?php
    if (isset($_GET['search'])) {
        $by_address = $_GET['by_address'];
        $by_blood = $_GET['by_blood'];
        $arr = array();
        $donar = Donor::search_donor($by_blood,$by_address);
       while ($row = mysqli_fetch_array($donar)) {
           $arr[] =  $row;
       }
       foreach ($arr as $a) {
           echo $a['name'];
       }
    }
?>
<?php
    $location = Donor::get_location();
    $places = array();
    while ($rows = mysqli_fetch_array($location)) {
        $places[] = $rows;
    }
    $blood_group = Donor::get_blood_group();
    $blood = array();
    while ($data = mysqli_fetch_array($blood_group)) {
        $blood[] = $data;
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
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $don->blood_group; ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $don->address ?></h6>
                <a href="#" class="card-link"><?php echo $don->contact_number; ?></a>
            </div>
        </div>
    </div>
    <br />
    <br />
<?php endforeach; ?>

    <div class="col-md-4">
        <div class="container">
            <form action="" method="get">
                <div class="form-group">
                    <label for="blood-group"> Select Blood Group</label>
                    <select class="form-control" id="blood-group" name="by_blood">
                        <option>Select Blood Group</option>
                        <?php foreach ($blood as $group): ?>
                            <option value="<?php echo $group['blood_group'] ?>"><?php echo $group['blood_group']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="address"> Location </label>
                    <select class="form-control" id="address" name="by_address">
                        <option>Location</option>
                    <?php foreach ($places as $place): ?>
                        <option value="<?php echo $place['address'] ?>"><?php echo $place['address']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-outline-primary" type="search" value="search" name="search">Search</button>
                </div>
            </form>
        </div>
    </div>



</body>
</html>
