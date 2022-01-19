<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vDiscuss - Coding Forum</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php 
    include "partials/_header.php"; 
    include "partials/_dbconnect.php";
    ?>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="assets/img/c-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="4000">
                <img src="assets/img/c-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/c-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Categories container starts here  -->




    <h1 class="text-center my-4">vDiscuss - Categories</h1>
    <div class="container">
        <div class="row">
            <?php
  $sql = "SELECT * FROM `category`";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($res)){
    echo '<div class="col-md-4 my-2">
        <div class="card">
        <img src="assets/img/card-'.$row["category_id"].'.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><a href="threadlist.php?catid='.$row["category_id"].'">'.$row["category_name"].'</a></h5>
        <p class="card-text">'.substr($row["category_description"],0,120).'....</p>
        <a href="threadlist.php?catid='.$row["category_id"].'" class="btn btn-success">Read more</a>
        </div>
        </div>
        </div>';
      }
      ?>
            <!-- <img src="https://source.unsplash.com/1600x900/?'.$row["category_name"].',coding" class="card-img-top" alt="..."> -->


        </div>
    </div>

    <?php include "partials/_footer.php";?>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>