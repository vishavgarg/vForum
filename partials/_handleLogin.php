<?php

if(isset($_POST['lLogin'])){
    include "_dbconnect.php";
    $email=$_POST['lEmail'];
    $password=$_POST['lPassword'];
    

    $loginError=0;
    $sql="SELECT * FROM `users` where user_email='$email'";
    $res=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($res);
    if($numRows>0){
        $row=mysqli_fetch_assoc($res);
        if(password_verify($password,$row['user_pass'])){
            // echo "Login Successful";
            $loginError=0;
            $msg="Login successful";
            session_start();
            $_SESSION['loggedIn']=true;
            $_SESSION['sno']=$row['sno'];
            $_SESSION['userName']=$row['user_name'];
        }
        else{
            $error="you entered a wrong Password";
            $loginError=1;
        }
    }
    else{
        $error="this user doesn't exist";
        $loginError=1;
    }
    header("Location: /vg/FORUM/index.php?error=$loginError&msg=$error");
}

?>