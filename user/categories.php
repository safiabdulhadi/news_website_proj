<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">All Categories</h3>
                <a href="" class="btn btn-primary float-end">Add Category</a>
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
                            <tr>
                                <td>1</td>
                                <td>political</td>
                                <td>
                                    <a href="" class="btn btin-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <a href="" class="btn btin-sm btn-warning"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("common/footer.php") ?>