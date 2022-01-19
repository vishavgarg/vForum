<?php

session_start();


echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">vDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                include "partials/_dbconnect.php";
                $sql = "SELECT * FROM `category`";
                $res = mysqli_query($conn,$sql);
                while($roww = mysqli_fetch_assoc($res)){
                   echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$roww["category_id"].'">'.$roww["category_name"].'</a></li>';
                }
               echo '</ul>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
            </li>
        </ul>
        <form class="d-flex" method="get" action="search.php">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>';

        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
            $hours=date("H");
            if($hours>=0){
                $greet="Good morning:)";
            }
            else if($hours>11){
                $greet="Good afternoon:)";
            }
            else if($hours>15){
                $greet="Good evening:)";
            }
            else{
                $greet="Good night:)";
            }
            
            echo '<div class="mx-2">'.
            $greet.' <b>'.$_SESSION["userName"].'</b>
            <a href="partials/_logout.php" class="btn btn-success">Logout</a>
            </div>';
        }

        else{
            echo '<div class="mx-2">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        </div>';
        }

        echo '</div>
        </div>
        </nav>';
        
        


include "partials/_loginmodal.php";
include "partials/_signupmodal.php";

// signup message 
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true'){
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You are registered to vFORUM and can login now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='false'){
   echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Failed!</strong> Can\'t register due to '.$_GET['error'].'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


// login message 
if(isset($_GET['msg']) && $_GET['error']==1){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Failed!</strong> Can\'t login because '.$_GET['msg'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>