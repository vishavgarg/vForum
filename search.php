<!-- alter TABLE `threads` add FULLTEXT(`thread_title`, `thread_desc`); -->
<!-- SELECT * FROM `threads` where match(thread_title,thread_desc) against('python'); -->
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

<div class="container searchResult">
        <h1>Search results for <i>"<?php echo $_GET['search']?>"</i></h1>


    <?php
    $searchItem=$_GET['search'];
    $sql = "SELECT * FROM `threads` where match(thread_title,thread_desc) against('$searchItem')";
    $res = mysqli_query($conn,$sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($res)){
        $noResult = false;
        $url="threads.php?threadid=".$row['thread_id'];
        echo '<div class="result">
        <h4><a href="'.$url.'" class="text-dark">'.$row['thread_title'].'</a></h4>
        <p>'.$row['thread_desc'].'</p>
    </div>';
    }

    if($noResult){
        echo '<div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h2 class="display-5">No result found</h2>
          <p class="col-md-8 fs-5"></p>
          <button class="btn btn-success btn-lg" type="button">Write here</button>
        </div>
      </div>';
    }
    ?>
</div>


    <?php include "partials/_footer.php";?>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>