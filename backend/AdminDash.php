<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .content-section {
            display: none;
        }
        .active-section {
            display: block;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" style="background-color: #343a40;">
            <h5 class="text-light">Dashboard</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="dashboardLink" onclick="showContent('dashboard')">📊 Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="projectsLink" onclick="showContent('projects')">📂 Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="publicationsLink" onclick="showContent('publications')">📚 Publications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">👥 People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">📅 Events</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content p-4" style="flex: 1;">
            <div id="dashboard" class="content-section active-section">
                <h2>Welcome to the Dashboard</h2>
                <p>Select an option from the sidebar.</p>
            </div>

          <!-- Projects Section -->
<div id="projects" class="content-section">
    <div class="row">
        <?php
        // Include the PHP file to fetch projects from the database
        include('C:\xampp2\htdocs\Projet_PSSII\backend\config.php');
        
        // Loop through the projects and display them
        $projects = getProjects();
        foreach ($projects as $project) {
            echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="'.$project['imagelink'].'" class="card-img-top" alt="' . $project['titre'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $project['titre'] . '</h5>
                            <p class="card-text">' . $project['description'] . '</p>
                            <a href="#" class="btn btn-primary">View Project</a>
                            <a href="edit_project.php?id=' . $project['id'] . '" class="btn btn-warning">Modifier</a>
                            <a href="delete_project.php?id=' . $project['id'] . '" class="btn btn-danger" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce projet ?\')">Supprimer</a>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
    </div>
</div>



            <!-- Publications Section -->
            <div id="publications" class="content-section">
                <h3 class="mt-4">Publications</h3>
                <div class="row">
                    <!-- Example publications (can be fetched from a database in a similar way) -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Publication One</h5>
                                <p class="card-text">This paper explores the advancements in artificial intelligence and its applications in cybersecurity.</p>
                                <a href="#" class="btn btn-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    

    <script>
        // Function to switch between sections
        function showContent(section) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.classList.remove('active-section'));
            document.getElementById(section).classList.add('active-section');
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => link.classList.remove('active'));
            document.getElementById(section + 'Link').classList.add('active');
        }
    </script>

</body>
</html>