<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
                            <a class="nav-link active text-primary" href="admin.html">
                                <i class="bi bi-house-door-fill"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="bi bi-file-earmark"></i> Accounts management
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
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown me-3">
                            <button class="btn btn-light position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell"></i> Notifications
                            </button>
                            <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                                <h6 class="dropdown-header">Send notification</h6>
                                <form id="notification-form">
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Select </label>
                                        <select id="userType" class="form-select">
                                            <option value="type1">Students</option>
                                            <option value="type2">Teachers</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notificationMessage" class="form-label">Message</label>
                                        <textarea id="notificationMessage" class="form-control" rows="3" placeholder="Type your notification here..."></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" onclick="sendNotification()">Envoyer</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="dropdown">
                            <button class="btn btn-light position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-envelope"></i> 
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    3 
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><h6 class="dropdown-header">Messages</h6></li>
                                <li><a class="dropdown-item" href="#">Sara: "Hi, can I..."</a></li>
                                <li><a class="dropdown-item" href="#">Ahmed: "I have a problem with..."</a></li>
                                <li><a class="dropdown-item" href="#">Lina: "My project isn't..."</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="#">See all messages</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <?php
                    // Database connection
                    $Pdo = new PDO('mysql:dbname=daw;host=localhost', 'root', 'admine');
                    $Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Query to count the number of rows
                    $project = $Pdo->prepare("SELECT COUNT(*) FROM projects");
                    $project->execute();

                    $student = $Pdo->prepare("SELECT COUNT(*) FROM users where type = 2");
                    $student->execute();

                    $teacher = $Pdo->prepare("SELECT COUNT(*) FROM users where type = 1");
                    $teacher->execute();

                    // Fetch the count
                    $rowCountProject = $project->fetchColumn();
                    $rowCountStudent = $student->fetchColumn();
                    $rowCountTeacher = $teacher->fetchColumn();


                ?>


                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                                        echo $rowCountProject;
                                    ?>
                                </h5>
                                <p class="card-text display-6">Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                                        echo $rowCountStudent;
                                    ?>
                                </h5>
                                <p class="card-text display-6">Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                                        echo $rowCountTeacher;
                                    // Close the connection
                                    $Pdo = null;
                                    ?>
                                </h5>
                                <p class="card-text display-6">Teachers</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Recent Activities</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Domaine</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <?php
                                // Connect to the database
                                try {
                                    $pdo = new PDO('mysql:host=localhost;dbname=daw', 'root', 'admine');
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    // Fetch users with type = 2 (students)
                                    $query = $pdo->query('SELECT * FROM users ');
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                                        
                                        
                                        echo "<td>" . htmlspecialchars($row['domaine']) . "</td>";
                                        
                                        
                                        echo "</tr>";
                                    }
                                } catch (PDOException $e) {
                                    echo "<tr><td colspan='8' class='text-danger'>Error fetching data: " . $e->getMessage() . "</td></tr>";
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
