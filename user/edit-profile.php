<?php include_once("common/header.php"); ?>

<form action="" class="row mt-3" >
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
        <small></small>
    </div>

    <div class="form-group col-md-6">
        <select class="form-control" name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Custom">Custom</option>
        </select>
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter your Facebook">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter your Instagram">
        <small></small>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter your Twitter">
        <small></small>
    </div>
    <div class="form-group col-md-12">
        <input type="file" class="form-control" name="picture" id="picture">
        <small></small>
    </div>

    <div class="form-group col-md-6">
        <button class="btn btn-success" name="update-btn" id="update-btn">Update</button>
        <small></small>
    </div>
</form>

<?php include_once("common/footer.php"); ?>