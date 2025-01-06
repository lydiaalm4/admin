<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des listes</title>
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
        .filter-section {
            margin-bottom: 20px;
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
                            <a class="nav-link" href="accounts.php">
                                <i class="bi bi-file-earmark"></i> Accounts management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary" href="lists.html">
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
                <h1 class="h2">Lists management</h1>
    
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="searchInput" class="form-label">search</label>
                        <input type="text" id="searchInput" class="form-control" placeholder="Name, Domain etc.">
                    </div>
                </div>
    
                <div class="mb-4">
                    <input type="button" class="btn btn-primary" onclick="location.href='list_stud.php';" value="List of students">
                    <input type="button" class="btn btn-primary" onclick="location.href='list_techer.php';" value="List of teachers">
                    <input type="button" class="btn btn-primary" onclick="location.href='list_project.php';" value="List of projects">
                </div>
    
                <div class="collapse" id="listEtudiants">
                    <div class="filter-section">
                        <div class="col-md-4">
                            <label for="groupFilter" class="form-label">Filter by status</label>
                            <select id="groupFilter" class="form-select">
                                <option value="">All</option>
                                <option value="monome">with project</option>
                                <option value="binome">without project</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            List of students
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $Pdo = new PDO ('mysql:dbname=univ;hostname=localhost','root','');
                                        $res = $Pdo->query('select * from users where type == 2') ;
                                        while ($donnee = $res->fetch()){
                                        ?>
                                        ?>
                                        <td><?php echo $donnee['Name']." ". $donnee['firstname'] ?></td>
                                        <td>with project</td>
                                        <td><button class="btn btn-info btn-sm">Détails</button></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="collapse" id="listEnseignants">
                    <div class="card mb-4">
                        <div class="card-header">
                            List of teachers
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Proposed projects</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CCCC</td>
                                        <td>Proposed</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>DDDD</td>
                                        <td>Not proposed</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="collapse" id="listProjets">
                    <div class="filter-section">
                        <div class="col-md-4">
                            <label for="projectStatus" class="form-label">Filter by project</label>
                            <select id="projectStatus" class="form-select">
                                <option value="">All</option>
                                <option value="en-attente">Pending</option>
                                <option value="en-cours">In progress</option>
                                <option value="attribue">Assigned</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            List of projects
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name of projet</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Project A</td>
                                        <td>Pendind</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>Projet B</td>
                                        <td>Assigned</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="collapse" id="listCandidatures">
                    <div class="card mb-4">
                        <div class="card-header">
                            List of condidates
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Desired project</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AAAA</td>
                                        <td>Projet A</td>
                                        <td>Pending</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>BBBB</td>
                                        <td>Projet B</td>
                                        <td>Assigned</td>
                                        <td><button class="btn btn-info btn-sm">Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="collapse" id="listGroupes">
                    <div class="col-md-4">
                        <label for="groupFilter" class="form-label">Filter by group</label>
                        <select id="groupFilter" class="form-select">
                            <option value="">All</option>
                            <option value="monome">Monome</option>
                            <option value="binome">Binome</option>
                            <option value="trinome">Trinome</option>
                        </select>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            List of students per group
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Group</th>
                                        <th>Members</th>
                                        <th>Project</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Group 1</td>
                                        <td>AAAA, BBBB</td>
                                        <td>Project A</td>
                                    </tr>
                                    <tr>
                                        <td>Group 2</td>
                                        <td>CCCC, DDDD, EEEEE</td>
                                        <td>Project B</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
