<?php require_once("commonsF/header.php") ?>

<!-- Slider-->

<div class="container-fluid slider-section">
    <!-- container-fluid for the full screen also for the color take all screen -->
    <div class="container">
        <div class="row">
            <div class="col slider-body">
                <form class="row  justify-content-center ">
                    <div class="form-group col-md-8">
                        <input type="text" placeholder="Search...">
                        <span><i class="fa-solid fa-magnifying-glass"></i> </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- -------------------News And Category --------------->
<div class="container">
    <div class="sections">
        <h1>Updates</h1>
    </div>
    <!-- all is in one row and it has two child inside -->
    <div class="row">

        <!-- ------ this for the slider on left--- -->
        <div class="col-md-2 home-category">
            <div class="cat-header">
                <h3>Categories</h3>
                <span id="toggle"><i class="fa-solid fa-bars"></i></span>
            </div>
            <ul>
                <li><a href="">General</a></li>
                <li><a href="">Political</a></li>
                <li><a href="">Sports</a></li>
                <li><a href="">Economies</a></li>
                <li><a href="">Technology</a></li>
                <li><a href="">Entertinment</a></li>
            </ul>

        </div>

        <!-------- main container All cards-------->
        <!-- CARDS -->
             <!-- This is php code for cards ----Retrive data or News ... ----->
             <?php
            // I include the $conn where i met on db-config.php
                include "db_config.php";

                $news_querySql = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC";

                $result_ofThe_news = mysqli_query($conn, $news_querySql);

            ?>

        <div class="col-md-10">
            <div class="row">
                <?php
                    if(mysqli_num_rows($result_ofThe_news) >0) {

                        while($news_row = mysqli_fetch_assoc($result_ofThe_news)){


                ?>
                <!-- this cards -->
                <div class="col-md-3">
                    <div class="card home-news">
                        <div class="new-thumb">
                            <img src="assets/images/<?php echo $news_row["thumbnail"];?>" class="card-img-top" alt="it is a photo ">
                            <a href="#"><?php echo $news_row["user_name"] ?></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $news_row["title"]; ?></h5>
                            <p class="card-text"><?php echo mb_substr($news_row["post"],0, 110) . "..."; ?></p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link"><?php echo $news_row["user_name"]; ?></a>

                            <a href="#" class="card-link"><?php echo date("F d-Y", strtotime($news_row["date"])); ?></a>
                        </div>
                    </div>
                </div>

                <?php
                }
                  }else{

                  }
                ?>



                <!-- End this cards -->
            </div>
            <!-- this is Pagination-->
            <div class="row my-3">
                <div class="col">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <!-- End of Pagination-->

        </div>
    </div>

    <!--end of the row of the news content-->
    <div class="sections mt-5">
        <h1>Authors</h1>
    </div>
    <!--Autors Cards-->
    <div class="row mb-5 " style=" margin-top : 120px">

        <div class="col-md-3">
            <div class="cus-card author-section">

                <div class="author-thumb">
                    <img src="assets/images/pexels-mali-maeder-902194.jpg" class="card-img-top" alt="it is a photo ">
                </div>
                <div class="card-body mt-5">
                    <a href="">
                        <h5 class="card-title">Ahmad</h5>
                    </a>
                    <a href="mailto:ahamd@gmail.com">
                        <p class="card-text my-2">ahmad@gmail.com</p>
                    </a>
                    <div class="socail-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-md-3">
            <div class="cus-card author-section">

                <div class="author-thumb">
                    <img src="assets/images/pexels-mali-maeder-902194.jpg" class="card-img-top" alt="it is a photo ">
                </div>
                <div class="card-body mt-5">
                    <a href="">
                        <h5 class="card-title">Ahmad</h5>
                    </a>
                    <a href="mailto:ahamd@gmail.com">
                        <p class="card-text my-2">ahmad@gmail.com</p>
                    </a>
                    <div class="socail-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-md-3">
            <div class="cus-card author-section">

                <div class="author-thumb">
                    <img src="assets/images/pexels-mali-maeder-902194.jpg" class="card-img-top" alt="it is a photo ">
                </div>
                <div class="card-body mt-5">
                    <a href="">
                        <h5 class="card-title">Ahmad</h5>
                    </a>
                    <a href="mailto:ahamd@gmail.com">
                        <p class="card-text my-2">ahmad@gmail.com</p>
                    </a>
                    <div class="socail-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-md-3">
            <div class="cus-card author-section">

                <div class="author-thumb">
                    <img src="assets/images/pexels-mali-maeder-902194.jpg" class="card-img-top" alt="it is a photo ">
                </div>
                <div class="card-body mt-5">
                    <a href="">
                        <h5 class="card-title">Ahmad</h5>
                    </a>
                    <a href="mailto:ahamd@gmail.com">
                        <p class="card-text my-2">ahmad@gmail.com</p>
                    </a>
                    <div class="socail-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>


<!-- Footer -->
<?php require_once("commonsF/footer.php") ?>