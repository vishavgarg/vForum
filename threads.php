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
    $id=$_GET['threadid'];
    $sql = "SELECT * FROM `threads` where thread_id=$id";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)){
        $user_id=$row['thread_user_id'];
        $sql2="SELECT user_name FROM `users` where sno='$user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        echo '<div class="container my-4">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">'.$row["thread_title"].'</h1>
                    <p class="col-md-8 fs-4">'.$row["thread_desc"].'</p>
                    <p>Posted by: '.$row2['user_name'].'</p>
                    </div>
                </div>';
    }
    
   ?>

<h1>Start a discussion</h1>
<?php
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    echo '<form action="" method="post">
        <div class="mb-3">
            <label for="commentDesc" class="form-label">Description</label>
            <textarea class="form-control" name="commentDesc" id="commentDesc" rows="3"
                placeholder="Ellaborate your concern"></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-3" name="newComment">Submit</button>
    </form>';
}
else{
    echo "<p class='fs-5'>To comment you have to login</p>";
}
    ?>

    <?php
        $id=$_GET['threadid'];
    if(isset($_POST['newComment'])){ 
        $sno=$_SESSION['sno'];
        $comment_content=$_POST['commentDesc'];
        $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_content', '$id', '$sno', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your comment added.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <h1 class="my-3">Comments</h1>
        <?php
    $id=$_GET['threadid'];
    $sql = "SELECT * FROM `comments` where thread_id=$id";
    $noResult=true;
    $res = mysqli_query($conn,$sql); 
    while($row = mysqli_fetch_assoc($res)){
        $noResult=false;
        $user_id=$row['comment_by'];
        $sql2="SELECT user_name FROM `users` where sno='$user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        echo '<div class="d-flex align-items-center">
        <div class="flex-shrink-0">
          <img src="assets/img/user.png" width="25px" alt="user-image">
        </div>
        <div class="flex-grow-1 ms-3">
        <p class="font-weight-bold my-0"><b>'.$row2["user_name"].'</b> ('.$row["comment_time"].')</p>
          '.$row["comment_content"].'
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