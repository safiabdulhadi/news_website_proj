<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Add Post</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">

            <form action="" class="row">
                <div class="form-group col-md-6">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <small>Error</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Post</label>
                    <textarea class="form-control" name="post" id="post"></textarea>
                    <small>Error</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Select Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select Category</option>
                        <?php
                           include "../db_config.php";
                            $cat_sql = "SELECT * FROM categories";
                            $cat_result = mysqli_query($conn, $cat_sql);

                            if(mysqli_num_rows($cat_result)> 0){
                                echo "<option>{$cat_result['name']}</option>";
                            }else{
                                echo "<option>No Record Found</option>";
                            }


                        ?>
                    </select>

                </div>
            </form>

            </div>
        </div>

    </div>
</div>
<?php include_once("common/footer.php") ?>