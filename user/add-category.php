<?php include_once("common/header.php") ?>

<div class="row my-4">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Add Category</h3>
            </div>

            <?php


            if(isset($_POST['add-category'])){
                $cat_name = $_POST['add_category'];

                $sql = "INSERT INTO categories (name) VALUES ('{$cat_name}')";

               if(mysqli_query($conn, $sql)){
                header("Location:{$URL}/user/categories.php");
               }

            }
            ?>

            <!-- CARD BODY -->
            <div class="card-body">

                <form action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="validate();"  method="POST" class="row align-items-center">
                    <div class="form-group col-md-6">
                        <label for="category">Category Name</label>
                        <input type="text" name="category_name" id="category" class="form-control validate">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-primary" name="add-category">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const inputs = document.querySelectorAll('.validate');
    const small = document.querySelectorAll('small');

    let validate = () => {
        if(inputs[0].value == "") {
            small[0].style.padding = "0 5px";
            small[0].innerHTML = "<i class='fa-solid fa-circle-info'>Category name is required!</i>";
            return false;
        }else{
            small[0].style.padding = "0";
            small[0].innerHTML = "";
        }
    }
</script>
<?php include_once("common/footer.php") ?>