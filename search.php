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

         $search_term = $_GET['search_term'];
        $sql = "SELECT p.*, c.*, u.*, p.id AS pid, c.id AS cid, u.id AS uid FROM posts p JOIN categories c ON p.category_id = c.id JOIN users u ON p.user_id = u.id WHERE title LIKE '%{search_term}%'";
        $result = mysqli_query($conn, $sql);

         ?>
        <!-- All News -->
        <div class="col-md-9">
            <h1>Keyword: <strong><u><?php echo $search_term ?></u></strong></h1>
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
                        $sql_paginate = "SELECT * FROM posts WHERE tile LIKE '% {$_GET['search_term']}%'";
                        $paginate_result = mysqli_query($conn, $sql_paginate);
                        $total_records = mysqli_num_rows($paginate_result);

                        $total_pages = ceil($total_records / $limit);
                        if($page > 1 ){
                        echo   "<li class='page-item'><a class='page-link' href='search.php?search_term=$search_term&page=". ($page - 1) ."'>Prev</a></li>";
                           }
                        for($i = 1; $i <= $total_pages ; $i++){
                         echo " <li class='page-item'><a class='page-link' href='search_term=$search_term&page={$i}'>{$i}</a></li>";

                        }
                 if($total_pages > $page){
                    echo "<li class='page-item'><a class='page-link' href='search_term=$search_term&page=". ($page + 1) ."'>Next</a></li>";
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

    </div>
</div>
<?php require_once("commons/footer.php") ?>