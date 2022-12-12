<?php require_once("commons/header.php") ?>

<div class="container">

    <!--end of the row of the news content-->
    <div class="sections mt-5">
        <h1>Authors</h1>
    </div>
    <?php
     include("db_config.php");
     if(isset($_GET["page"])){
        $page = $page = $_GET["page"];
    } else{
        $page = 1;
    }
     $limit = 8;
     $offset = ($page - 1) * $limit;
    $author_sql = "SELECT * FROM users ORDER BY id DESC LIMIT {$offset}, {$limit} ";
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
       <!-- this is Pagination-->
       <div class="row my-4">
                        <div class="col">
                            <ul class="pagination justify-content-center">
                    <?php
                        $sql_paginate = "SELECT * FROM users";
                        $paginate_result = mysqli_query($conn, $sql_paginate);
                        $total_records = mysqli_num_rows($paginate_result);

                        $total_pages = ceil($total_records / $limit);
                        if($page > 1 ){
                        echo   "<li class='page-item'><a class='page-link' href='all-authors.php?page=". ($page - 1) ."'>Prev</a></li>";
                           }
                        for($i = 1; $i <= $total_pages ; $i++){
                         echo " <li class='page-item'><a class='page-link' href='all-authors.php?page={$i}'>{$i}</a></li>";

                        }
                 if($total_pages > $page){
                    echo "<li class='page-item'><a class='page-link' href='all-authors.php?page=". ($page + 1) ."'>Next</a></li>";
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



<!-- Footer -->
<?php require_once("commons/footer.php") ?>