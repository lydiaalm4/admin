<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
                <h1 class="h2">New User</h1>
            </div>
            <div>
                <div class="card ">
                    <div class="card-header">
                        Information
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <form method="POST" action="add.php">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">First name</label>
                                    <input type="text" class="form-control"  name="fname">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Domaine</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="domaine">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" v-model="role" required name="role">
                                        <option value="" disabled>Select your role</option>
                                        <option value="student" name="student">Student</option>
                                        <option value="teacher" name="teacher">Teacher</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </blockquote>
                    </div>
                </div>
            </div>



</body>
</html>
