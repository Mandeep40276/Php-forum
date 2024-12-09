<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>iDiscuss-- Learn coding</title>
</head>

<body>
    <?php include "partials/header.php"; ?>
    <?php include "partials/dbconnect.php";?>
    <?php
    
    $id=$_GET['catid'];
    $sql= "SELECT * FROM `categories` WHERE `category id` =$id";
    $result= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        // echo $row['category id'];
        // $id= $row['category id'];
        $catname= $row['category_name'];
        $catdis= $row['category_discription'];
    }
    ?>
    <?php
    $showalert=false; 
    $method= $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // insert thread into db
        $th_title= $_POST['title'];
        $th_desc= $_POST['desc'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, 
        `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp());";
        $result= mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>Your thread has been added. Please wait for someone response..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }

    }
    
    ?>
<!-- category container starts here -->
    <div class="container my-3">
        <div class="alert alert-success" role="alert">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead"> <?php echo $catdis; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge to each other.</p>
            <a href="" class="btn btn-success btn-lg" role="button">Learn more</a>
        </div>
    </div>
    <div class="container">
        <h1 class="my-3">Start a Discussion</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Please keep your title as short and crisp as possible!</div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ellaborate Your problem concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="6"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <div class="container">
        <h1 class="my-3">Browse Questions</h1>
    <?php
    $id=$_GET['catid'];
    $sql= "SELECT * FROM `threads` WHERE thread_cat_id=$id;";
    $result= mysqli_query($conn,$sql);
    $noresult= true;
    while($row = mysqli_fetch_assoc($result)){
        $noresult=false;
        $id= $row['thread_id'];
        $title= $row['thread_title'];
        $desc= $row['thread_description'];
        $time= $row['timestamp'];
        echo'<div class="container">
        <div class="card mb-3">
        <div class="row g-0 my-2">
                <div class="col-md-2">
                    <img src="img/defaultuser.png" alt="..." width="130px">
                </div>
                <div class="col-md-8">
                <div>
                    <p class="my-0"><b> Anonymous User</b></p>
                        <h5 class="card-title"><a class="text-dark" href="/forum/thread.php?threadid=' . $id . ' ">'.$title.'</a></h5>
                        <p class="card-text">'.$desc.'</p>
                        <p class="card-text"><small class="text-muted">'.$time.'</small></p>
                    </div>
                </div>
            </div>
            </div>
            </div>';
    }
    if($noresult){
    echo '
        <div class="alert alert-success" role="alert">
        <p class="display-4">No Questions Found</p>
        <p class="lead">Be the First to ask Questions</p>
        </div>';
    }
?>
    </div>

    <?php include "partials/footer.php" ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>