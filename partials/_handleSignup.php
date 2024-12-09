<?php
$showalert= false;
$showerr= "false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include "dbconnect.php";
    $user_email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $existSql="SELECT * FROM `users` WHERE user_email= '$user_email'";
    $result=mysqli_query($conn,$existSql);

    $numExistRows= mysqli_num_rows($result);
        if($numExistRows>0){
  // $exists=true;

     $showerr= "Email Already exists";
}
else{
    if(($password==$cpassword)){
      $hash=password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_email`, `user_pass`, `time`) VALUES ( '$user_email', '$hash', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showalert = true;
            header("location:/forum/index.php?signupsuccess=true");
            exit();
          }
  
        }
  else{
    $showerr ="Passwords do not match";
    
  }

}
header("location: /forum/index.php?signupsuccess=false&error=$showerr");
}

    



?>
<?php

if($showalert){
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you have successfully signedup. Now you can login!</p>

    </div>';
  }
if($showerr){
    echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">OOPs!</h4>' . $showerr .'
        

    </div>';
  }
  ?>