<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">All Posts</h3>
                <a href="add-post.php" class="btn btn-primary float-end">Add Post</a>
            </div>

            <?php
            // I include the $conn where i met on db-config.php
            include "../db_config.php";
            //   RETRIVE NEWS
            $post_sql = "SELECT * , posts.id AS postid, c.id AS cid FROM posts JOIN categories c ON posts.category_id = c.id";

            $result_sql = mysqli_query($conn, $post_sql);

            ?>

            <!-- CARD BODY -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Views</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_sql) > 0) {

                                while ($post_row = mysqli_fetch_assoc($result_sql)) {

                            ?>
                                    <tr>
                                        <td><?php echo $post_row['id']; ?></td>
                                        <td><?php echo $post_row['title']; ?></td>
                                        <td><?php echo date("F d, Y", strtotime($post_row['date'])); ?></td>
                                        <td><?php echo $post_row['views']; ?></td>
                                        <td><?php echo $post_row['name']; ?></td>
                                        <td><img src="../assets/images/<?php echo $post_row['thumbnail']; ?>" width="70px" alt=""></td>
                                        <td>
                                            <a href="delete-post.php?id=<?php echo $post_row['postid']; ?> " class="btn btin-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            <a href="edit-post.php?id=<?php echo $post_row['postid']; ?> " class="btn btin-sm btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
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