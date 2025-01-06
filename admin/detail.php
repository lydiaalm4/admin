<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Students</title>
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
                <h1 class="h2">List of Students</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">List Of Students</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Domain</th>
                                    <th>Type</th>
                                    
                                </tr>
                                </thead>
                                <tbody id="userTableBody">
                                <?php
                                // Connect to the database
                                try {
                                    $pdo = new PDO('mysql:host=localhost;dbname=daw', 'root', 'admine');
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    // Fetch users with type = 2 (students)
                                    $query = $pdo->query('SELECT * FROM users WHERE type = 2 or type=3');
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['domaine']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                                        
                                        echo "</tr>";
                                    }
                                } catch (PDOException $e) {
                                    echo "<tr><td colspan='8' class='text-danger'>Error fetching data: " . $e->getMessage() . "</td></tr>";
                                }
                                ?>
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
