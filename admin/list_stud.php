<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Student</title>
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
                <h1 class="h2">List of students</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">List Of Student</div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <?php
                                $Pdo = new PDO ('mysql:dbname=daw;hostname=localhost','root','admine');
                                $res = $Pdo->query('select * from users WHERE type = 2 ') ;
                                ?>
                                <tbody id="userTableBody">
                                <?php while ($donnee = $res->fetch()){?>
                                    <tr>
                                        <td><?php echo $donnee['id']?></td>
                                        <td><?php echo $donnee['name'] ?></td>
                                        <td><?php echo $donnee['firstname'] ?></td>
                                        <td><?php echo $donnee['email'] ?></td>
                                        <td><input type="button" class="btn btn-primary" onclick="location.href='detail.php';" value="More"></td>
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




</body>
</html>
