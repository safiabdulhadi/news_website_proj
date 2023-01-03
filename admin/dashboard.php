<?php include_once("common/header.php"); ?>

<?php
    $sql_total_news = "SELECT * FROM posts";
    $news_result = mysqli_query($conn, $sql_total_news);
    $total_news = mysqli_num_rows($news_result);
    ?>


<div class="row mt-2">
    <div class="col-md-3 bt">
        <div class="card p-3">
            <p>My News</p>
            <h3><?php echo $total_news?>+</h3>
        </div>
    </div>

<?php
    $my_total_news = "SELECT * FROM posts";
    $my_result = mysqli_query($conn, $my_total_news);
    $total_my_news = mysqli_num_rows($my_result);
    ?>
    <div class="col-md-3">
    <div class="card p-3 bt">
            <p>Total News</p>
            <h3><?php echo $total_my_news ?>+</h3>
        </div>
    </div>
    <?php
    $total_cat = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $total_cat);
    $total_categories = mysqli_num_rows($cat_result);
    ?>
    <div class="col-md-3">
    <div class="card p-3 bt">
            <p>Total Categories</p>
            <h3><?php echo $total_categories ?>+</h3>
        </div>
    </div>
    <?php
    $total_views = "SELECT SUM(views) AS total_views FROM posts";
    $views_result = mysqli_query($conn, $total_views);
    $row = mysqli_fetch_assoc($views_result);
    ?>
    <div class="col-md-3">
    <div class="card p-3 bt">
            <p>Total Views</p>
            <h3><?php echo $row['total_views'] ?>+</h3>
        </div>
    </div>
</div>




<?php include_once("common/footer.php") ?>