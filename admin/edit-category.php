<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Update Category</h3>
            </div>

            <?php
            if (isset($_POST['update-btn'])) {
                $catid = $_POST['cat_id'];
                $cat_name = $_POST['category_name'];
                $sql = "UPDATE categories SET name = '{$cat_name}' WHERE id = {$catid}";

                if (mysqli_query($conn, $sql)) {
                    header("Location:{$URL}/user/categories.php");
                }
            }

            if (isset($_GET['id'])) {

                $cat_id = $_GET['id'];

                $sql = "SELECT * FROM categories WHERE id = {$cat_id}";

                $result =  mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
            }

            ?>
            <!-- CARD BODY -->
            <div class="card-body">

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="row align-items-end">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="cat_id" value="<?php echo $row['id'] ?>">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" id="title" class="form-control" value="<?php echo $row['name'];?>">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-success" name="update-btn">Update Category</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php include_once("common/footer.php") ?>