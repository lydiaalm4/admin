<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lora', serif;
            background-color: #f8f9fa;
            font-size: larger;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            position: sticky;
            top: 0;
            flex-shrink: 0;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        img.profile-img {
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <h5 class="text-light text-center py-3">Admin Panel</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">
                                <i class="bi bi-house-door-fill"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary" href="accounts.html">
                                <i class="bi bi-file-earmark"></i> Account management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lists.php">
                                <i class="bi bi-list"></i> Lists management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="parameters.php">
                                <i class="bi bi-gear"></i> Educational parameters
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/log.html">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Account management</h1>

                    <input type="button" class="btn btn-success" onclick="location.href='formulaire.php';" value="Add user">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Accounts List</div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <label for="userFilter" class="form-label">Filter by user type</label>
                                        <select id="userFilter" class="form-select w-auto">
                                            <option value="">All</option>
                                            <option value="student">Students</option>
                                            <option value="teacher">Teachers</option>
                                        </select>
                                    </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $Pdo = new PDO ('mysql:dbname=daw;hostname=localhost','root','admine');
                                    $res = $Pdo->query('select * from users') ;
                                    ?>
                                    <tbody id="userTableBody">
                                    <?php while ($donnee = $res->fetch()){?>
                                    <tr>
                                        <td><?php echo $donnee['id']?></td>
                                        <td><?php echo $donnee['name']." ". $donnee['firstname'] ?></td>
                                        <td><?php
                                            if ($donnee['type'] === 0 ){
                                                echo "Admin";
                                            }elseif ($donnee['type'] === 1){
                                                echo "Techer";
                                            }
                                            if($donnee['type'] === 2){
                                                echo "Student";
                                            }
                                            ?></td>
                                        <td>
                                            <a href="formUpdate.php?id=<?php echo $donnee['id']?>" class="btn btn-primary">Update</a>
                                            <a href="delete.php?id=<?php echo $donnee['id'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add a new user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <label for="userType" class="form-label">Type</label>
                            <select id="userType" class="form-select" required>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container my-5">
                    <div class="account-detail">
                        <div class="text-center">
                            <img id="userProfileImg" src="" alt="Profile Image" class="profile-img" style="width: 100px; height: 100px;">
                        </div>

                        <div class="info-section">
                            <div class="row">
                                <div class="col-sm-3">Username:</div>
                                <div class="col-sm-9" id="userUsername"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Email:</div>
                                <div class="col-sm-9" id="userEmail"></div>
                            </div>
                        </div>

                        <hr>

                        <div class="info-section">
                            <div class="row">
                                <div class="col-sm-3"> Info 1:</div>
                                <div class="col-sm-9" id="userInfo1">Info1</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"> Info 2:</div>
                                <div class="col-sm-9" id="userInfo2">Info2</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"> Info 3:</div>
                                <div class="col-sm-9" id="userInfo3">Info3</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"> Info 4:</div>
                                <div class="col-sm-9" id="userInfo4">Info4</div>
                            </div>
                        </div>

                        <div class="text-center my-3">
                            <button class="btn btn-primary" id="editBtn">Edit</button>
                            <button class="btn btn-success d-none" id="saveBtn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">confirm delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wanna delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


