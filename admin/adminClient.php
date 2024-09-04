<?php
include('./action/serve.php');

include('include/header.php');
include('include/navbar.php');
include('include/sideNav.php');


 
    if (isset($_GET['inid'])) {
        $id = $_GET['inid'];
        $sql = "DELETE FROM client WHERE id=$id";
        mysqli_query($con, $sql);
        // header('location: ./adminPortfolio.php');
    }

?>

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h1 class="app-page-title pt-3">Admin Client Page <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create Client
                        </button></h1>

                </div>
                <div class="card-body">
                    <?php //include('action/errors.php');
                            ?>
                    <table id="myTable" class="table table-striped mt-5">
                        <thead>
                            <tr class="header">
                                <th scope="col">Username</th>
                                <th scope="col">Photo</th>
                                
                                <th scope="col">Created at</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $faculty = $con->query("SELECT * FROM  client ORDER BY id DESC");
                            while ($result = $faculty->fetch_array()) :
                            ?>
                                <tr>
                                    <th><?php echo ucwords($result['name']) ?> </th>
                                    <td><img src="../agency/images/<?php echo htmlentities($result['image']); ?>" width="50px" height="50px" alt="" srcset=""></td>
                                    
                                    <td><?php echo htmlentities($result['created_at']); ?></td>

                                    <td><a href="./editAdminClient.php?empid=<?php echo htmlentities($result['id']); ?> " class="btn btn-info btn-sm">EDIT</a>
                                    </td>
                                    <td> <a class="btn btn-danger btn-sm" href="./adminClient.php?inid=<?php echo htmlentities($result['id']); ?>" onclick="return confirm('Are you sure you want to inactive this Employe?');"> DELETE </i>
                                    </td>
                                </tr>

                            <?php endwhile; ?>



                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto" id="exampleModalLabel">Client Register</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="auth-form auth-signup-form p-5" method="post" action="./action/adminClientFunction.php" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label class="form-label">Select Image File:</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                                
                            
                            <div class="mb-3">
                                    <label  class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"  placeholder="">
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn btn-primary" name="client">Create Client</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--//container-fluid-->
    </div>
</div>



<?php

include('include/footer.php');
include('include/script.php');

?>