<?php require_once("commonsF/header.php") ?>
<div class="container my-5">
    <div class="row">
<?php
include("db_config.php");
$post_id = $_GET['post_id'];
$sql = "SELECT * FROM posts  p JOIN users u ON p.user_id = u.id  WHERE p.id = {$post_id}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$update_views = "UPDATE posts SET views = views + 1 WHERE id = {$post_id}";
mysqli_query($conn,$update_views);
?>
     <!--News -->
         <div class="col-md-9">
                <div class="card mb-3 ">
                        <div class="row g-0 news-page">
                                <div class="col-md-12">
                                        <div class="sidebar-img">
                                        <a href=""><img src="assets/images/<?php echo $row['thumbnail']?>" class="img-fluid rounded-start" alt="photo"></a>
                                        </div>
                                </div>
                        </div>
                </div>


                <div class="card p-5 mb-3">
                            <div class="row g-0 news-page">
                                    <div class="col-md-12">
                                            <div class="">
                                                <h1><?php echo $row['title'] ?></h1>
                                                <div class="header-details">
                                                    <small><i class="fa-solid fa-user-pen me-2"></i><?php echo $row['user_name']?></small>
                                                    <small class="mx-5"><i class="fa-regular fa-calendar-days me-2"></i><?php echo date("F d ,Y", strtotime($row['date']))?></small>
                                                    <small><i class="fa-solid fa-eye me-2"></i><?php echo $row['views']?></small>
                                                </div>
                                            </div>
                                    </div>
                             </div>
                     </div>




                     <div class="card p-5 mb-3">
                            <div class="row g-0 news-page">
                                    <div class="col-md-12">
                                            <div class="">
                                              <p><?php echo $row['post']?></p>
                                            </div>
                                    </div>
                             </div>
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
                                            <span>  <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
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
                                            <span>  <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
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