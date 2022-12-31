<?php include_once("common/header.php") ?>

<?php
include("../db_config.php");

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM posts WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update-btn'])) {
    $postid = $_POST['postid'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $post = $_POST['post'];

    if ($_FILES['new-thumbnail']['name'] == '') {
        $thumbnail = $_POST['old-thumbnail'];
    } else {
        $new_thumbnail = $_POST['new-thumbnail']['name'];
        $ext = strtolower(pathinfo($new_thumbnail, PATHINFO_EXTENSION));
        $size = $_FILES['new-thumbnail']['size'] / 1024;
        $valide_ex = ['png', 'jpg', 'jpeg'];


        $thumbnail = time() . "." . $ext;

        if (in_array($ext, $valide_ex)) {

            if ($size > 2048) {
                $msg = "<div class='alert alert-danger' >Image size must not be greater than 2 MB</div>";
            } else {
                if (move_uploaded_file($_FILES['new-thumbnail']['tmp_name'], "../assets/images/$thumbnail")) {

                } else {
                    $msg = "<div class='alert alert-danger' >Internal Error</div>";
                }
            }
        } else {
            $msg = "<div class='alert alert-danger' >Invalid file extention , Please select (png, jpg, jpeg)</div>";
        }
    }
// UPDATE QUERY
    $sql = "UPDATE posts SET title = '{$title}' , category_id = {$category},post = '{$post}' , thumbnail = '{$thumbnail}' WHERE id = {$postid}";

    if(mysqli_query($conn, $sql)){
        $msg = "<div class='alert alert-success' >Record Update Successfully!</div>";
        header("Location:{$url}user/posts.php");
    }else{
        $msg = "<div class='alert alert-danger' >File couldn't be uploaded! </div>";
    }


}
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

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="row" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
                    <div class="form-group col-md-6">

                        <label for="">Title</label>
                        <input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
                        <input type="text" name="title" id="title" class="form-control validate" value="<?php echo $row['title'] ?>">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="">Select Category</label>
                        <select name="category" id="category" class="form-control validate">
                            <option value="">Select Category</option>
                            <?php
                            $cat_sql = "SELECT * FROM categories";
                            $cat_result = mysqli_query($conn, $cat_sql);

                            if (mysqli_num_rows($cat_result) > 0) {
                                while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                    if ($row['category_id'] == $cat_row['id']) {
                                        echo $selected = "selected";
                                    } else {
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
                        <textarea class="form-control validate" rows="6" name="post" id="post"><?php echo $row['post'] ?></textarea>
                        <small></small>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Thumbnail</label>
                        <!--   NEW IMAGE -->
                        <input type="file" id="thumbnail" name="new-thumbnail" class="form-control" id="new-thumbnail">

                        <!-- OLD THUMNAMIL -->
                        <input type="hidden" id="thumbnail" name="old-thumbnail" class="form-control" id="old-thumbnail" value="<?php echo $row['thumnail'] ?>">
                        <!-- SHOW IMAGE -->
                        <img class="img-thumbnail mt-3" src="../assets/images/<?php echo $row['thumbnail'] ?>" alt="" width="120px">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-success " name="update-btn">Update Post</button>
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