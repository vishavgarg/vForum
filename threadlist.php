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
    $id=$_GET['catid'];
    $sql = "SELECT * FROM `category` where category_id=$id";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)){
        echo '<div class="container my-4">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">'.$row["category_name"].'</h1>
                    <p class="col-md-8 fs-4">'.$row["category_description"].'</p>
                        <button class="btn btn-success btn-lg" type="button">Learn more</button>
                    </div>
                </div>';
    }
    
   ?>
    <!-- <div class="row align-items-md-stretch">
            <div class="col-md-4">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                    <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Add borders</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                    <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Add borders</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                    <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
        </div> -->
    <hr>
    <h1>Start a discussion</h1>
    <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    echo '<form action="" method="post">
        <div class="mb-3">
            <label for="threadTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="threadTitle" id="threadTitle" placeholder="Put a short & crisp title">
        </div>
        <div class="mb-3">
            <label for="threadDesc" class="form-label">Description</label>
            <textarea class="form-control" name="threadDesc" id="threadDesc" rows="3" placeholder="Ellaborate your concern"></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-3" name="newThread">Submit</button>
    </form>';
    }
    else{
        echo "<p class='fs-5'>To write you have to log in</p>";
    }
?>
    <?php
        $id=$_GET['catid'];
    if(isset($_POST['newThread'])){ 
        $thread_title=$_POST['threadTitle'];
        $thread_desc=$_POST['threadDesc'];
        $sno=$_SESSION['sno'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_title', '$thread_desc', '$id', '$sno', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>New thread has been added. Please wait until our community can put comments on this.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <hr>
    <h1 class="my-3">Browse Questions</h1>
    <div class="accordion" id="accordionExample">
        <?php
    $id=$_GET['catid'];
    $sql = "SELECT * FROM `threads` where thread_cat_id=$id";
    $res = mysqli_query($conn,$sql);
    $noResult = true;
    while($row1 = mysqli_fetch_assoc($res)){
        $noResult = false;
        $user_id=$row1['thread_user_id'];
        $sql2="SELECT user_name FROM `users` where sno='$user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        echo '<div class="accordion-item">
                <h2 class="accordion-header" id="heading'.$row1["thread_id"].'">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse'.$row1["thread_id"].'" aria-expanded="false" aria-controls="collapse'.$row1["thread_id"].'">
                        '.$row1["thread_title"].'  
                         --<b>'.$row2["user_name"].'</b>--'.$row1["timestamp"].'
                    </button>
                </h2>
                <div id="collapse'.$row1["thread_id"].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row1["thread_id"].'"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    '.$row1["thread_desc"].'<br>
                    <a href="threads.php?threadid='.$row1["thread_id"].'" class="btn btn-success" type="button">More Threads</a>
                    </div>
                </div>
            </div>';
    }
    if($noResult){
        echo '<div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h2 class="display-5">No threads found</h2>
          <p class="col-md-8 fs-5">Be the first one to ask a question</p>
          <button class="btn btn-success btn-lg" type="button">Write here</button>
        </div>
      </div>';
    }
        ?>
    </div>
    </div>



    <?php include "partials/_footer.php";?>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>