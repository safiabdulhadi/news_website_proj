<?php require_once("commons/header.php") ?>
<div class="container my-5">
    <div class="row">


        <?php
        include("db_config.php");
        if(isset($_GET["page"])){
            $page = $page = $_GET["page"];
        } else{
            $page = 1;
        }
         $limit = 5;
         $offset = ($page - 1) * $limit;
        $author_id = $_GET['author_id'];
        $sql = "SELECT p.id AS pid, p.title, p.post, p.views, p.category_id, p.thumbnail, p.date, p.status, u.id AS uid,c.name, u.user_name FROM posts p JOIN categories c ON p.category_id = c.id JOIN users u ON p.user_id = u.id  WHERE u.id = {$author_id} LIMIT {$offset}, {$limit}";
        $result = mysqli_query($conn, $sql);
        $author_name = mysqli_query($conn, $sql);

        $author_name_row = mysqli_fetch_assoc( $author_name);
        ?>

        <!-- All News -->
        <div class="col-md-9">
            <h1>Author: <strong><u><?php echo  $author_name_row['user_name']; ?></u></strong></h1>
            <hr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="card mb-3 ">

                        <div class="row g-0">

                            <div class="col-md-4">
                                <div class="all-news-thumb">
                                    <a href="news.php?post_id=<?php echo $row['pid']; ?>"><img src="assets/images/<?php echo $row['thumbnail']; ?> " class="img-fluid rounded-start" alt="photo"></a>
                                </div>
                            </div>
                            <div class="col-md-8 position-relative">
                                <div class="card-body">
                                    <a href="news.php?post_id=<?php echo $row['pid']; ?>" class="news-title">
                                        <h3 class="card-title"><?php echo $row['title'] ?> </h3>
                                    </a>
                                    <p class="card-text"><?php echo mb_substr($row['post'], 0, 200) . " ... " ?> </p>
                                    <div class="all-news-footer">
                                        <a href=""><i class="fa-solid fa-user-pen me-2"></i><?php echo $row['user_name'] ?></a>
                                        <a href=""><i class="fa-regular fa-calendar-days me-2"></i><?php echo date("F, d, Y", strtotime($row['date'])) ?></a>
                                        <span> <i class="fa-solid fa-eye me-2"></i><?php echo $row['views'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No record Found";
            }
            ?>


       <!-- this is Pagination-->
       <div class="row my-4">
                        <div class="col">
                            <ul class="pagination justify-content-center">
                    <?php
                        $sql_paginate = "SELECT * FROM posts WHERE user_id = {$author_id} ";
                        $paginate_result = mysqli_query($conn, $sql_paginate);
                        $total_records = mysqli_num_rows($paginate_result);

                        $total_pages = ceil($total_records / $limit);
                        if($page > 1 ){
                        echo   "<li class='page-item'><a class='page-link' href='news-by-author.php?author_id=$author_id&page=". ($page - 1) ."'>Prev</a></li>";
                           }
                        for($i = 1; $i <= $total_pages ; $i++){
                         echo " <li class='page-item'><a class='page-link' href='news-by-author.php?author_id=$author_id&page={$i}'>{$i}</a></li>";

                        }
                 if($total_pages > $page){
                    echo "<li class='page-item'><a class='page-link' href='news-by-author.php?author_id=$author_id&page=". ($page + 1) ."'>Next</a></li>";
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

        </div>

        <!-- SideBar -->
        <div class="col-md-3">
            <h4>Latest News</h4>
            <hr>

            <?php

            $latest_posts = "SELECT * FROM posts ORDER BY id DESC LIMIT 12";
            $latest_posts_result = mysqli_query($conn, $latest_posts);

            if (mysqli_num_rows($latest_posts_result) > 0) {
                while ($latest_row = mysqli_fetch_assoc($latest_posts_result)) {

            ?>
                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="sidebar-img">
                                    <a href="news.php?post_id = <?php echo $latest_row['id']; ?> "><img src="assets/images/<?php echo $latest_row['thumbnail']; ?>" class="img-fluid rounded-start" alt="photo"></a>
                                </div>
                            </div>
                            <div class="col-md-8 position-relative">
                                <div class="card-body">
                                    <a href="news.php?post_id = <?php echo $latest_row['title']; ?>" class="news-title"> <?php echo $latest_row['title'] ?></a>
                                    <div class="sidBar-time mt-2">
                                        <span> <i class="fa-solid fa-clock me-2"></i><?php echo date('F d, Y', strtotime($latest_row['date'])) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No post sorry";
            }
            ?>




            <!--  sidebar-cantegory    -->
            <div class="row sidebar-cantegory my-4">
                <div class="col">
                    <h3>Categories</h3>
                    <hr>
                    <ul>


                        <?php

                        $all_cat = "SELECT * FROM categories";
                        $all_cat_result = mysqli_query($conn, $all_cat);

                        if (mysqli_num_rows($all_cat_result) > 0) {
                            while ($all_cat_row = mysqli_fetch_assoc($all_cat_result)) {
                                echo  "<li><a href=''>< {$all_cat_row['name']}></a></li>";
                            }
                        } else {
                            echo "No Category";
                        }
                        ?>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require_once("commons/footer.php") ?>