<?php
// Database connection
$host = 'localhost';
$dbname = 'daw';
$username = 'root';
$password = 'admine';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch project details
if (isset($_GET['id'])) {
    $project_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = :id");
    $stmt->execute(['id' => $project_id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        die("Project not found.");
    }
} else {
    die("Project ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Project Details</h1>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <?= htmlspecialchars($project['title']); ?>
        </div>
        <div class="card-body">
            <p><strong>Domaine:</strong> <?= htmlspecialchars($project['domaine']); ?></p>
            <p><strong>Description:</strong></p>
            <p><?= nl2br(htmlspecialchars($project['description'])); ?></p>
            <p><strong>Key Words:</strong> <?= htmlspecialchars($project['key_word']); ?></p>
        </div>
    </div>
    <a href="list_projects.php" class="btn btn-secondary mt-4">Back to List</a>
</div>
</body>
</html>

