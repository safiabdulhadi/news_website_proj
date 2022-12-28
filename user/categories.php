<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">All Categories</h3>
                <a href="add-category.php" class="btn btn-primary float-end">Add Category</a>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // I include the $conn where i met on db-config.php
                            include "../db_config.php";
                            //   RETRIVE CATEGORIES
                            $cat_sql = "SELECT * FROM categories";
                            $cat_result = mysqli_query($conn, $cat_sql);

                            if(mysqli_num_rows($cat_result) > 0) {

                                while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $cat_row['id'];?></td>
                                        <td><?php echo $cat_row['name'];?></td>
                                        <td>
                                            <a href="delete-category.php?id = <?php echo $cat_row['id'];?>" class="btn btin-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            <a href="edit-category.php?id = <?php echo $cat_row['id'];?>" class="btn btin-sm btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>

                            <?php
                                }
                            } else {
                                echo 'Sorry no Record Found ! . Please try again';
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("common/footer.php") ?>