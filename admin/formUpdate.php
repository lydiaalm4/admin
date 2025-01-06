<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
            <div class="row">
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">My Profile</h1>
            </div>
                <?php
                try {

                    // Database connection
                    $Pdo = new PDO ('mysql:dbname=daw;hostname=localhost','root','admine');
                    $Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $res = $Pdo->query("select * from users where id = $_GET[id]") ;
                    $donnee = $res->fetch();
                    // Get data from POST request
                    $id = $_GET['id']; // Add this line to get the ID from the POST request
                    $name = $_POST['name'];
                    $firstname = $_POST['firstname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    $domaine = $_POST['domaine'];
                    $photo = null;

                    // Determine the role
                    $role = ($_POST['role'] == 'student') ? 2 : 1;

                    // Prepare and execute the SQL statement
                    $stmt = $Pdo->prepare("UPDATE users SET Name = :nam, firstname = :fname, email = :email, password = :password, phone = :phone, domaine = :domaine, photo = :photo, type = :role WHERE id = :id");
                    $stmt->bindParam(':id', $id); // Add this line to bind the ID parameter
                    $stmt->bindParam(':nam', $name);
                    $stmt->bindParam(':fname', $firstname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':domaine', $domaine);
                    $stmt->bindParam(':photo', $photo);
                    $stmt->bindParam(':role', $role);

                    $stmt->execute();
                    ?>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="alert alert-success" role="alert">
                            <h1 class="h5"><?php echo "Update successfully "; ?></h1>
                        </div>
                    </div>
                <?php } catch (PDOException $e) {?>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="alert alert-danger" role="alert">
                            <h3 class="h5"><?php echo "Error: " . $e->getMessage(); ?></h3>
                        </div>
                    </div>
                <?php }

                // Close the connection
                $Pdo = null;?>

            <div>
                <div class="card ">
                    <div class="card-header">
                        Information
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo $donnee['name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">First name</label>
                                    <input type="text" class="form-control"  name="fname" value="<?php echo $donnee['firstname'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $donnee['email'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $donnee['password'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" value="<?php echo $donnee['phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Domaine</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="domaine" value="<?php echo $donnee['domaine'] ?>">
                                </div>
                                <div class="form-group">
                                    <select class="form-control"  required name="role">
                                        <option value="" disabled>Select your role</option>
                                        <?php if($donnee['type'] == 2) {?>
                                        <option value="student" name="student">Student</option>
                                        <?php }else{ ?>
                                        <option value="teacher" name="teacher">Teacher</option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                        </blockquote>
                    </div>
                </div>
            </div>


</body>
</html>
