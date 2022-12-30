<?php include_once("common/header.php")?>

<?php

// $edit_sql = "SELECT * FROM posts WHERE id = {$_GET['id']}";
// $edit_result = mysqli_query($conn, $edit_sql);

// $edit_row = mysqli_fetch_assoc($edit_result);

// echo "<pre>";
// print_r($edit_row);
// echo "</pre>";

?>

<div class="row my-4">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Update Post</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">

                <form action="" class="row">
                    <div class="form-group col-md-6">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="">Select Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                            $cat_sql = "SELECT * FROM categories";
                            $cat_result = mysqli_query($conn, $cat_sql);

                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                    if($row['category_id'] == $cat_row['id']){
                                        echo $selected = "selected";
                                    }else{
                                        echo $selected = "";
                                    }
                                    echo "<option {$selected} value='{$cat_row['id']}'>{$cat_row['name']}</option>";
                                }
                            } else {
                                echo "<option>No Record Found</option>";
                            }


                            ?>
                        </select>
                        <small></small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Post</label>
                        <textarea class="form-control" rows="6" name="post" id="post" ></textarea>
                        <small></small>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Thumbnail</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-success">Update Post</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php include_once("common/footer.php") ?>