<?php
require_once("init.php"); ?>
<?php
//$donor = Donor::find_all();?>
<?php
    if (isset($_GET['search'])) {
        $by_address = $_GET['by_address'];
        $by_blood = $_GET['by_blood'];
        $arr = array();
        $donar = Donor::search_donor($by_blood,$by_address);
       while ($row = mysqli_fetch_array($donar)) {
           $arr[] =  $row;
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
<?php
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $items_per_page = 6;
    $items_total_count = Donor::count_all();
    $paginate = new Paginate($page, $items_per_page, $items_total_count);
    $sql = "SELECT * FROM donor ";
    $sql .= "LIMIT {$items_per_page} ";
    $sql .= "OFFSET {$paginate->offset()}";
    $donor = Donor::find_by_query($sql);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="Css%20File/form.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-margin">
        <div id="nav-left-space"></div>
        <a class="navbar-brand " href="#">Blood Help</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active hover-effect">
                    <a class="nav-link" href="./Admin/admin_login.php">Admin Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active hover-effect">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item active hover-effect">
                    <a class="nav-link" href="#">Campaigns</a>
                </li>
            </ul>
        </div>

                <a href="login.php" class="btn btn-success hover-effect button-color"   role="button"  style="float: right;" >Register To Donate Blood</a>
        <div id="nav-space"></div>
    </nav>
    <br />
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner parallax">
            <div class="carousel-item active">
                <img class="d-block w-100 style-image" src="blood-donation-6.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 id="carousel-text-hero">Humanity Protector</h5>
                    <p id="carousel-text">Donate Blood And Be A Real Life Super Hero</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 style-image" src="blood-donation-6.jpg" alt="Second slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 style-image" src="blood-donation-6.jpg" alt="Third slide">
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br />
    <div class="container " id="index" align="center">
        <div class="container parallax" id="search" >
            <div class="col-md-4">
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
                        <button class="btn btn-primary button-color" type="search" value="search" name="search" style="float: left;">Search</button>
                        <a href="reset.php" class="btn btn-primary button-color" role="button" style="float: right;">Reset</a>
                    </div>
                </form>
            </div>
        </div>
        <br />
        <br />
        <br />
    <?php if (isset($_GET['search'])) : ?>
        <div class="row parallax">
            <? foreach ($arr as $a): ?>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><?php echo $a['name']; ?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $a['blood_group']; ?></h5>
                            <p class="card-text"><?php echo $a['address']; ?></p>
                        </div>
                    </div>
                </div>
                <br />
                <br />
            <br />
            <br />
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div  class="row">
            <? foreach ($donor as $don): ?>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header"><?php echo $don->name; ?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $don->blood_group; ?></h5>
                            <p class="card-text"><?php echo $don->address; ?></p>
                        </div>
                </div>
                </div>
                <br />
                <br />
            <?php endforeach; ?>
            <div align="center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if ($paginate->count_total_pages()>1) {
                        if ($paginate->has_previous()) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                        }

                        for ($i = 1; $i<=$paginate->count_total_pages(); $i++) {
                            if ($i == $paginate->current_page) {
                                echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                            }
                            else {
                                echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                        if ($paginate->has_next()) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?page={$paginate->next()}'>Next</a></li>";
                        }

                    }

                    ?>
                </ul>
            </nav>
            </div>

        </div>
    <?php endif; ?>


    </div>




</body>
</html>
