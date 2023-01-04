<?php include_once("common/header.php"); ?>

<div class="row">
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <div class="u-img">
                        <img src="../assets/images/<?php echo $row['picture'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-text"><?php echo $row['user_name'] ?></h5>
                        <p>Email: <?php echo$row['email'];?></p>
                        <?php
                        if ($row['status'] == 1) {
                            echo " <a href='disable-user.php?userid={$row['id']}&status=0'class='btn btn-sm btn-success' ><i class='fa-solid fa-toggle-on'></i></a> ";
                        } else {
                            echo " <a href='approve-user.php?userid={$row['id']}&status=1'class='btn btn-sm btn-danger' ><i class='fa-solid fa-toggle-off'></i></a> ";
                        }
                        ?>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<h4>No User Request!</h4>";
    }
    ?>
</div>
<?php include_once("common/footer.php"); ?>