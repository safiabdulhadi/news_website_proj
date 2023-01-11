<?php require_once("commons/header.php") ?>

<!-- Slider-->

<div class="container-fluid slider-section">
    <!-- container-fluid for the full screen also for the color take all screen -->
    <div class="container">
        <div class="row">
            <div class="col slider-body">
                <form action="search.php" class="row  justify-content-center ">
                    <div class="form-group col-md-8">
                        <input type="text" name="search_term" placeholder="Search...">
                        <button><i class="fa-solid fa-magnifying-glass"></i> </button>
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

            <?php
            // I include the $conn where i met on db-config.php
            include "db_config.php";

            $cat_sql = "SELECT * FROM categories";

            $result_cat = mysqli_query($conn, $cat_sql);

            ?>
            <ul>
                <?php
                if (mysqli_num_rows($result_cat) > 0) {
                    while ($cat_row = mysqli_fetch_assoc($result_cat)) {
                        echo  " <li><a href='news-by-category.php?cat_id={$cat_row['id']}'> {$cat_row['name']}</a></li>";
                    }
                } else {
                    echo  " <li><a href=''>No Categories</a></li>";
                }
                ?>
            </ul>

        </div>

        <!-------- main container All cards-------->
        <!-- CARDS -->


        <!-- This is php code for cards ----Retrive data or News ... ----->
        <?php

        if (isset($_GET["page"])) {
            $page = $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $limit = 8;
        $offset = ($page - 1) * $limit;
        // var_dump($offset);
        $news_querySql = "SELECT p.id AS pid, p.title, p.post, p.date , p.views, p.category_id , p.user_id, p.thumbnail, p.status, c.id AS cid , c.name, u.user_name, u.id AS uid FROM posts p JOIN categories c ON p.category_id = c.id JOIN users u ON p.user_id = u.id WHERE p.status = 1 ORDER BY p.id DESC LIMIT {$offset}, {$limit}";

        $result_ofThe_news = mysqli_query($conn, $news_querySql);
        // var_dump($result_ofThe_news);
        ?>

        <div class="col-md-10">
            <div class="row">
                <?php
                if (mysqli_num_rows($result_ofThe_news) > 0) {

                    while ($news_row = mysqli_fetch_assoc($result_ofThe_news)) {


                ?>
                        <!-- this cards -->
                        <div class="col-md-3">
                            <div class="card home-news">
                                <div class="news-thumb">
                                    <a href="news.php?post_id=<?php echo $news_row['pid'] ?>" class="px-0"><img src="assets/images/<?php echo $news_row["thumbnail"]; ?>" class="card-img-top" alt="it is a photo "></a>
                                    <a href="news-by-category.php?cat_id=<?php echo $news_row["cid"] ?>"><?php echo $news_row["name"] ?></a>
                                </div>
                                <div class="card-body">
                                    <a href="news.php?post_id=<?php echo $news_row['pid'] ?>">
                                        <h5 class="card-title"><?php echo $news_row["title"]; ?></h5>
                                    </a>
                                    <p class="card-text"><?php echo mb_substr($news_row["post"], 0, 100) . "..."; ?></p>
                                </div>
                                <div class="card-body">
                                    <a href="news-by-author.php?author_id=<?php echo $news_row['uid'] ?>" class="card-link author-post"><?php echo $news_row["user_name"]; ?></a>

                                    <a href="#" class="card-link"><?php echo date("F d-Y", strtotime($news_row["date"])); ?></a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                    <!-- this is Pagination-->
                    <div class="row my-4">
                        <div class="col">
                            <ul class="pagination justify-content-center">
                                <?php
                                $sql_paginate = "SELECT * FROM posts WHERE status = 1";
                                $paginate_result = mysqli_query($conn, $sql_paginate);
                                $total_records = mysqli_num_rows($paginate_result);

                                $total_pages = ceil($total_records / $limit);
                                if ($page > 1) {
                                    echo   "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page - 1) . "'>Prev</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo " <li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                                }
                                if ($total_pages > $page) {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page + 1) . "'>Next</a></li>";
                                }
                                ?>

                                <!-- <li class="page-item"><a class="page-link" href="#">Prev</a></li> -->
                                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- End of Pagination-->

                <?php
                } else {
                ?>
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="text-center ">
                                <img src="assets/images/blog.png" width="300px" alt="">
                                <h3>No Updates, Check Later</h3>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- End this cards -->
            </div>

        </div>
    </div>

    <!--end of the row of the news content-->
    <div class="sections mt-5">
        <h1>Authors</h1>
    </div>

    <?php
    $author_sql = "SELECT * FROM users ORDER BY id DESC LIMIT 4 ";
    $author_result = mysqli_query($conn, $author_sql);
    ?>
    <!--Autors Cards-->
    <div class="row mb-5 " style=" margin-top : 120px">
        <?php
        if (mysqli_num_rows($author_result) > 0) {
            while ($author_rows = mysqli_fetch_assoc($author_result)) {


        ?>
                <div class="col-md-3">
                    <div class="cus-card author-section">

                        <div class="author-thumb">
                            <img src="assets/images/<?php echo $author_rows["picture"] ?>" class="card-img-top" alt="it is a photo ">
                        </div>
                        <div class="card-body mt-5">
                            <a href="">
                                <h5 class="card-title"><?php echo $author_rows["user_name"] ?></h5>
                            </a>
                            <a href="mailto:ahamd@gmail.com">
                                <p class="card-text my-2"><?php echo $author_rows["email"] ?></p>
                            </a>
                            <div class="socail-links">
                                <a href="<?php echo $author_rows["fb"] ?>"><i class="fa-brands fa-facebook-f"></i></i></a>
                                <a href="<?php echo $author_rows["instagram"] ?>"><i class="fa-brands fa-instagram"></i></a>
                                <a href="<?php echo $author_rows["twitter"] ?>"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>


        <?php
        }
        ?>
    </div>


</div>



<!-- Footer -->
<?php require_once("commons/footer.php") ?>