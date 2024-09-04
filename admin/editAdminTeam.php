<?php
include('./action/serve.php');

include('include/header.php');
include('include/navbar.php');
include('include/sideNav.php');





$eid = intval($_GET['empid']);
if (isset($_POST['editTeam'])) {
    $image =  $image = $_FILES['image']['name'];
    $name = mysqli_real_escape_string($con, $_POST['name']);

    $description = mysqli_real_escape_string($con, $_POST['description']);

    $target = "../agency/images/" . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $result = mysqli_query($con, "UPDATE team set  image='$image', name='$name', description='$description' WHERE id='$eid'");

        if ($result) {
            echo "<script>alert('Team updated successfully');</script>";
            echo "<script>window.location.href='./adminTeam.php';</script>";
        } else {
            echo "<script>alert('something went wrong');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image');</script>";
        echo "<script>window.location.href=' ./adminTeam.php';</script>";
    }
}


?>
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h1 class="app-page-title pt-3">Admin Team</h1>

                </div>
                <div class="card-name">
                    <?php //include('action/errors.php');
                    ?>
                    <form class="auth-form auth-signup-form p-5" method="post" action="" enctype="multipart/form-data">
                        <?php
                        $eid = intval($_GET['empid']);
                        $query = $con->query("SELECT * FROM team where id=$eid");
                        while ($result = $query->fetch_array()) :
                        ?>


                            <div class="mb-3">
                                <label class="form-label">Select Image File:</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlentities($result['name']); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="descEditor"><?php echo htmlentities($result['description']); ?></textarea>
                            </div>
                        <?php endwhile; ?>


                        <div class="modal-footer">
                            <a href="./adminTeam.php" class="btn btn-success me-3">Back</a>
                            <button type="submit" class="btn btn btn-info" name="editTeam">Update Team</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Button trigger modal -->





        </div>
        <!--//container-fluid-->
    </div>
</div>



<?php

include('include/footer.php');
include('include/script.php');

?>