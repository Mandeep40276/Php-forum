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

    <!-- slider start here - -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://wallpaperboat.com/wp-content/uploads/2019/10/coding-19.jpg" class="d-block w-100"
                    alt="..." height="500px">
            </div>
            <div class="carousel-item">
                <img src="https://wallpaperboat.com/wp-content/uploads/2019/10/coding-04.jpg" class="d-block w-100"
                    alt="..." height="500px">
            </div>
            <div class="carousel-item">
                <img src="https://www.securitymagazine.com/ext/resources/images/coding-freepik1170x658.jpg?1653399178"
                    class="d-block w-100" alt="..." height="500px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- category container starts here -->

    <div class="container my-3">
        <h2 class="text-center">iDiscuss - Browse Categories</h2>
        <div class="row">
            <!-- fetch all the category -->
            <?php 
            $sql= "SELECT * FROM `categories` ";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                // echo $row['category id'];
                $id= $row['category id'];
                $catname= $row['category_name'];
                $catdis= $row['category_discription'];
               echo '
               <div class="col-md-4 my-2">
               <div class="card" style="width: 18rem;">
                <img src="img/card-'.$id. '.jpg" class="card-img-top " alt="card images" height="200px">
                <div class="card-body">
                    <h5 class="card-title"><a href="threads.php?catid='. $id .'">
                    ' . $catname .'</a></h5>
                    <p class="card-text">' . substr($catdis,0,70) .'...</p>
                    <a href="threads.php?catid='. $id .'" class="btn btn-success">View Threads</a>
                </div>
                </div>
            </div>';
            }
            ?>
            <!-- use a loop to iterate through category -->

        </div>

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