<?php
include('./action/serve.php');

include('include/header.php');
include('include/navbar.php');
include('include/sideNav.php');





$eid = intval($_GET['empid']);
if (isset($_POST['Clientsubmit'])) {

    
    $image =  $image = $_FILES['image']['name'];
    $name = mysqli_real_escape_string($con, $_POST['name']);

    $target = "../agency/images/" . basename($image);
    
        $result = mysqli_query($con, "UPDATE client set image='$image', name='$name' WHERE id='$eid'");
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        if ($result) {
            echo "<script>alert('Client updated successfully');</script>";
            echo "<script>window.location.href='./adminClient.php';</script>";
        } else {
            echo "<script>alert('something went wrong');</script>";
        }
    }else {
        echo "<script>alert('Failed to upload image');</script>";
        echo "<script>window.location.href=' ./adminClient.php';</script>";
    }
}


?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h1 class="app-page-title pt-3">Admin Client</h1>

                </div>
                <div class="card-body">
                    <?php //include('action/errors.php');
                    ?>
                    <form class="auth-form auth-signup-form p-5" method="post" action="" enctype="multipart/form-data">
                        <?php
                        $eid = intval($_GET['empid']);
                        $query = $con->query("SELECT * FROM client where id=$eid");
                        while ($result = $query->fetch_array()) :
                        ?>
                            <div class="mb-3">
                                <label class="form-label">Select Image File:</label>
                                <input class="form-control" type="file" name="image">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Name of Client</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlentities($result['name']); ?>">
                            </div>
                        <?php endwhile; ?>


                        <div class="modal-footer">
                            <a href="./adminClient.php" class="btn btn-success me-3">Back</a>
                            <button type="submit" class="btn btn btn-info" name="Clientsubmit">Update Client</button>
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