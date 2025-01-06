<?php
// Database connection settings
$host = 'localhost';
$dbname = 'daw'; // Your database name
$username = 'root'; // Your database username
$password = 'admine'; // Your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $table = $_POST['table'];

        if ($table == 'Educationalyear') {
            $year = $_POST['year'];
            $group_size = $_POST['group_size'];
            $max_candidates = $_POST['max_candidates'];

            $sql = "INSERT INTO Educationalyear (year, group_size, max_candidates) 
                    VALUES (:year, :group_size, :max_candidates)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'year' => $year,
                'group_size' => $group_size,
                'max_candidates' => $max_candidates
            ]);

            $message = "Educational Year saved successfully!";
        } elseif ($table == 'Deadlines') {
            $event_name = $_POST['event_name'];
            $deadline = $_POST['deadline'];

            $sql = "INSERT INTO Deadlines (event_name, deadline) 
                    VALUES (:event_name, :deadline)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'event_name' => $event_name,
                'deadline' => $deadline
            ]);

            $message = "Deadline saved successfully!";
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Parameters</title>
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
        hr {
            border: 0;
            height: 1px;
            background-color: #ccc;
            margin: 30px 0;
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
                            <a class="nav-link active text-primary" href="#">
                                <i class="bi bi-gear"></i> Educational Parameters
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Educational Parameters</h1>
                </div>

                <!-- Display Success or Error Messages -->
                <?php if (isset($message)): ?>
                    <div class="alert alert-success"><?= $message; ?></div>
                <?php endif; ?>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                <?php endif; ?>

                <!-- Form for Educational Year -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Configure Educational Year</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="table" value="Educationalyear">
                            <div class="mb-3">
                                <label for="year" class="form-label">Educational Year</label>
                                <input type="text" id="year" name="year" class="form-control" placeholder="2024/2025">
                            </div>
                            <div class="mb-3">
                                <label for="group_size" class="form-label">Group Size</label>
                                <select id="group_size" name="group_size" class="form-select">
                                    <option value="monome">Monome</option>
                                    <option value="binome">Binome</option>
                                    <option value="trinome">Trinome</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="max_candidates" class="form-label">Maximum Number of Candidates</label>
                                <input type="number" id="max_candidates" name="max_candidates" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

                <!-- Form for Deadlines -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Set Deadlines</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="table" value="Deadlines">
                            <div class="mb-3">
                                <label for="event_name" class="form-label">Event</label>
                                <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Project Proposal Deadline">
                            </div>
                            <div class="mb-3">
                                <label for="deadline" class="form-label">Deadline</label>
                                <input type="date" id="deadline" name="deadline" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
