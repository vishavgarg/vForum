<?php

if(isset($_POST['sSubmit'])){
    include "_dbconnect.php";
    $name=$_POST['sName'];
    $email=$_POST['sEmail'];
    $password=$_POST['sPassword'];

    // Check whether this email exists
    $existSql= "SELECT * from  `users` where user_email='$email'";
    $result=mysqli_query($conn,$existSql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="this email already exists";
        header("Location: /vg/FORUM/index.php?signupsuccess=false&error=$showError");
    }

    else{
        $showAlert=false;
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `timestamp`) VALUES ('$name', '$email', '$hash', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res){
            $showAlert=true;
            header("Location: /vg/FORUM/index.php?signupsuccess=true");
    }
    }
}

?>