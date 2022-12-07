<?php include_once("common/header.php") ?>

<div class="row my-5">
    <div class="col">
        <div class="card">
            <!-- CARD HEADER -->
            <div class="card-header">
                <h3 class="float-start">All Posts</h3>
                <a href="" class="btn btn-primary float-end">Add Post</a>
            </div>
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
                            <tr>
                                <td>1</td>
                                <td>This is title</td>
                                <td>october 2 , 2022</td>
                                <td>150</td>
                                <td>politicals</td>
                                <td><img src="../assets/images/man1.jpg" width="70px" alt=""></td>
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