<?php require_once("commonsF/header.php") ?>
<div class="container my-5">
    <div class="row">


        <?php
        include("db_config.php");
        $cat_id = $_GET['cat-id'];
        $sql = "SELECT p.id AS pid, p.title, p.post, p.views, p.thumbnail, p.date, p.status, u.id, u.user_name FROM posts  p JOIN users u ON p.user_id = u.id  WHERE p.category_id = {$cat_id}";
        $result = mysqli_query($conn, $sql);
        ?>

        <!-- All News -->
        <div class="col-md-9">
            <h1>Category Name: </h1>
            <hr>
                    <?php
                    if(mysqli_num_rows($result)> 0) {
                        while($row = mysqli_fetch_assoc($result)){
                ?>
            <div class="card mb-3 ">

                <div class="row g-0">

                    <div class="col-md-4">
                        <div class="all-news-thumb">
                            <a href="news.php?post_id=<?php echo $row['pid'];?>"><img src="assets/images/<?php echo $row['thumbnail'];?> " class="img-fluid rounded-start" alt="photo"></a>
                        </div>
                    </div>
                    <div class="col-md-8 position-relative">
                        <div class="card-body">
                            <a href="news.php?post_id=<?php echo $row['pid'];?>" class="news-title">
                                <h3 class="card-title"><?php echo $row['title']?> </h3>
                            </a>
                            <p class="card-text"><?php echo mb_substr($row['post'], 0 ,200 )." ... "?> </p>
                            <div class="all-news-footer">
                                <a href=""><i class="fa-solid fa-user-pen me-2"></i><?php echo $row['user_name']?></a>
                                <a href=""><i class="fa-regular fa-calendar-days me-2"></i><?php echo date("F, d, Y",strtotime($row['date']))?></a>
                                <span> <i class="fa-solid fa-eye me-2"></i><?php echo $row['views']?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
             }
            }else {
                echo "No record Found";
            }
            ?>


            <!-- this is Pagination-->
            <div class="div row">
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

        <!-- SideBar -->
        <div class="col-md-3">
            <h4>Latest News</h4>
            <hr>
            <div class="card mb-3 ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="sidebar-img">
                            <a href=""><img src="assets/images/1.jpg" class="img-fluid rounded-start" alt="photo"></a>
                        </div>
                    </div>
                    <div class="col-md-8 position-relative">
                        <div class="card-body">
                            <a href="" class="news-title">news all about ne situation in Afghanistan...</a>
                            <div class="sidBar-time mt-2">
                                <span> <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="sidebar-img">
                            <a href=""><img src="assets/images/1.jpg" class="img-fluid rounded-start" alt="photo"></a>
                        </div>
                    </div>
                    <div class="col-md-8 position-relative">
                        <div class="card-body">
                            <a href="" class="news-title">news all about ne situation in Afghanistan...</a>
                            <div class="sidBar-time mt-2">
                                <span> <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  sidebar-cantegory    -->
            <div class="row sidebar-cantegory my-4">
                <div class="col">
                    <h3>Categories</h3>
                    <hr>
                    <ul>
                        <li><a href="">General</a></li>
                        <li><a href="">Political</a></li>
                        <li><a href="">Sports</a></li>
                        <li><a href="">Economies</a></li>
                        <li><a href="">Technology</a></li>
                        <li><a href="">Entertinment</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require_once("commonsF/footer.php") ?>