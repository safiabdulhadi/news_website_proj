<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">Add Category</h3>
            </div>
            <!-- CARD BODY -->
            <div class="card-body">

                <form action="" class="row align-items-center">
                    <div class="form-group col-md-6">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" id="title" class="form-control">
                        <small>Error</small>
                    </div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-sm btn-primary">Add Category</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<?php include_once("common/footer.php") ?>