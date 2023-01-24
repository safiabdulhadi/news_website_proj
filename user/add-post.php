<?php include_once("common/header.php") ?>
<?php
if (isset($_POST['add-post'])) {
    include("../db_config.php");

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $post = mysqli_real_escape_string($conn,$_POST['post']);

    $thumb = $_FILES['thumbnail']['name'];
    $extension = strtolower(pathinfo($thumb, PATHINFO_EXTENSION));
    $size = $_FILES['thumbnail']['size'] / 1024;
    $valid_extension = ['png', 'jpg', 'jpeg'];
    $new_name = time() . "." . $extension;

    if (in_array($extension, $valid_extension)) {
        if ($size > 5000) {

            $msg = "<div class='alert alert-danger mt-2'>Thumbnail size must not be greater than 2MB</div>";
        } else {
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../assets/images/$new_name")) {
                $sql = "INSERT INTO posts (title, post, category_id, user_id, thumbnail)VALUES('{$title}','{$post}','{$category}','{$_SESSION['user_id']}','{$new_name}')";

                if (mysqli_query($conn, $sql)) {
                    $msg = '<div class="alert alert-success">Post added successfully!</div>';
                } else {
                    $msg = '<div class="alert alert-danger">Internam  error!</div>';

                }
            }
        }
    } else {
        $msg = "<div class='alert alert-danger mt-2'>Invalid file type, please select (png, jpg, jpeg)</div>";
    }
}
?>
<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Add Post</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="row" onsubmit="return validate()" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control validate">
                        <small></small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category">Select Category</label>
                        <select name="category" id="category" class="form-control validate">
                            <option value="">Select Category</option>
                            <?php
                            include "../db_config.php";
                            $cat_sql = "SELECT * FROM categories";
                            $cat_result = mysqli_query($conn, $cat_sql);

                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($cat_row = mysqli_fetch_assoc($cat_result)) {

                                    echo "<option value='{$cat_row['id']}'>{$cat_row['name']}</option>";
                                }
                            } else {
                                echo "<option>No Record Found</option>";
                            }


                            ?>
                        </select>
                        <small></small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="post">Post</label>
                        <textarea class="form-control validate " rows="6" name="post" id="post"></textarea>
                        <small></small>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control validate ">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-primary" name="add-post">Add Post</button>
                    </div>
                </form>
                <?php if (isset($msg)) echo $msg; ?>

            </div>
        </div>

    </div>
</div>



<!-- This is for this forme -->
<script>
    const inputs = document.querySelectorAll('.validate');
    const small = document.querySelectorAll('small');

    let validate = () => {
        if (inputs[0].value == "") {
            small[0].style.padding = "0 5px";
            small[0].innerHTML = "<i class='fa-solid fa-circle-info'>Post title is required!</i>";
            return false;
        } else if (inputs[1].value == "") {
            small[0].style.padding = "";
            small[0].innerHTML = "";
            small[1].style.padding = "0 5px";
            small[1].innerHTML = "<i class='fa-solid fa-circle-info'>category is required!</i>";
            return false;
        } else if (inputs[2].value == "") {
            small[1].style.padding = "";
            small[1].innerHTML = "";
            small[2].style.padding = "0 5px";
            small[2].innerHTML = "<i class='fa-solid fa-circle-info'>Post is required!</i>";
            return false;
        } else if (inputs[3].value == "") {
            small[2].style.padding = "";
            small[2].innerHTML = "";
            small[3].style.padding = "0 5px";
            small[3].innerHTML = "<i class='fa-solid fa-circle-info'>Thumbnail / photo is required!</i>";
            return false;
        }
    }
</script>
<?php include_once("common/footer.php") ?>