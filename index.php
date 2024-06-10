<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Pdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <!-- Add new user modal start -->

<!-- Modal -->
<div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="add-user-form" class="p-2" novalidate>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                    <div class="invalid-feedback">First name is required!</div>
                </div>
                <div class="col">
                    <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                    <div class="invalid-feedback">Last name is required!</div>
                </div>
                <div class="my-3">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                    <div class="invalid-feedback">E-mail is required!</div>
                </div>
                <div class="mb-3">
                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone Number" required>
                    <div class="invalid-feedback">Phone number is required!</div>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg form-control" id="add-user-btn">
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- Add new user modal end -->
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12 d-flex justify-content-between align-items-center my-3">
                <div>
                    <h4 class="text-primary">All users in the database!</h4>
                </div>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add new user</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>praise</td>
                                <td>tab</td>
                                <td>tab@gmail.com</td>
                                <td>0906660789</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm rounded-pill py-0">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm rounded-pill py-0">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>











     <!-- Include Bootstrap JS and Popper.js -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="js/main.js"></script>

  </body>
</html>