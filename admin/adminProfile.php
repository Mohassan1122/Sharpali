<?php
include('./action/serve.php');

include('include/header.php');
include('include/navbar.php');
include('include/sideNav.php');

?>

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h1 class="app-page-title pt-3">Admin Profile <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create New Admin
                        </button></h1>

                </div>
                <div class="card-body">
                    <?php //include('action/errors.php');
                    ?>
                    <table id="myTable" class="table table-striped mt-5">
                        <thead>
                            <tr class="header">
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $faculty = $con->query("SELECT * FROM users ");
                            while ($result = $faculty->fetch_array()) :
                            ?>
                                <tr>
                                    <th><?php echo ucwords($result['username']) ?> </th>
                                    <td><?php echo htmlentities($result['email']); ?></td>
                                    <td><?php echo htmlentities($result['pword']); ?></td>
                                    <td><?php echo htmlentities($result['created_at']); ?></td>

                                    <td><a href="./editAdminProfile.php?empid=<?php echo htmlentities($result['id']); ?> " class="btn btn-info btn-sm">EDIT</a>
                                    </td>
                                    <td> <a class="btn btn-danger btn-sm" href="./adminProfile.php?inid=<?php echo htmlentities($result['id']); ?>" onclick="return confirm('Are you sure you want to inactive this Employe?');"> DELETE </i>
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
                            <h5 class="modal-title mx-auto" id="exampleModalLabel">Admin Rehistration</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="auth-form auth-signup-form p-5" method="post" action="./action/regFunction.php">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">username</label>
                                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">password</label>
                                    <input type="password" name="pword" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
                                    <input type="password" name="confirm_pword" class="form-control" id="exampleFormControlInput1">
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn btn-primary" name="register">Sign Up</button>
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