<?php
$login= false;
$showerr= false;

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "dbconnect.php";
    $user_email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * from users where user_email='$user_email'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num == 1){
    while($row=mysqli_fetch_assoc($result)){
      if(password_verify($password,$row['user_pass'])){
        $login = true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['email']=$user_email;
        header("location: /forum/index.php");
        exit();
      }
      else{
        $showerr ="Unable to login";
      }

      }
    }
   
 else{
    $showerr ="Unable to login";
  }



}

?>
<?php

if($login){
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you have successfully loggedIn.</p>

    </div>';
  }
if($showerr){
    echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">OOPs!</h4>' . $showerr .'
        

    </div>';
  }
  ?>