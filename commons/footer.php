<footer class="container-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h3>News Site</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora quo amet labore temporibus maxime animi.</p>
                    <div class="socail-links">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="" class="mx-3"><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h3>Categories</h3>
                    <hr>
                    <ul>
                        <?php
                        include("db_config.php");
                        $all_cat = "SELECT * FROM categories";
                        $all_cat_result = mysqli_query($conn, $all_cat);

                        if (mysqli_num_rows($all_cat_result) > 0) {
                            while ($all_cat_row = mysqli_fetch_assoc($all_cat_result)) {
                                echo  " <li><a href='news-by-category.php?cat_id={$all_cat_row['id']}'> {$all_cat_row['name']}</a></li>";
                            }
                        } else {
                            echo "No Category";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h3>Quick links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="All_news.php">News</a></li>
                        <li><a href="all-authors.php">All Authors</a></li>
                        <li><a href="about-us.php">About US</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container-fluid bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>@ 2022 , All Rights Reseverd with News site</p>
            </div>
            <div class="col-md-6">
                <p>Design & develop By Safi Abdulhadi</p>
            </div>
        </div>
    </div>
</div>


<!-- Customs js  -->
<script src="assets/js/app.js"></script>
<!-- Bootstraps js -->
<script src="assets/js/bootstrap.bundle.js"></script>

</body>

</html>