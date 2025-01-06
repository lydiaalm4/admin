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
            <?php
            try {
                // Database connection
                $Pdo = new PDO('mysql:dbname=daw;host=localhost', 'root', 'admine');
                $Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Delete query with a condition
                $sql = "DELETE FROM users WHERE id = :id";
                $stmt = $Pdo->prepare($sql);
                $stmt->bindParam(':id', $id);

                // ID of the record to be deleted
                $id = $_GET['id'];

                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    ?>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="alert alert-success" role="alert">
                            <h1 class="h5"><?php echo "Record deleted successfully"; ?></h1>
                        </div>
                    </div>
<?php                } else { ?>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="alert alert-danger" role="alert">
                            <h3 class="h5"><?php echo "No record found with that ID"; ?></h3>
                        </div>
                    </div>
<?php                }
            } catch (PDOException $e) {?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="alert alert-danger" role="alert">
                    <h3 class="h5"><?php echo "Error: " . $e->getMessage(); ?></h3>
                </div>
            </div>
            <?php }
            // Close the connection
            $Pdo = null;?>
        </main>
    </div>
</div>

</body>
</html>


