<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="documentation">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nouvelles">Nouvelles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="statistiques">Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produits">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="precommande">Précommande</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="infolettre">Infolettre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partenaires">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="textes_dynamiques">Textes Dynamiques</a>
                    </li>
                    <li>
                        <a class="btn btn-danger" href="logout" id="deconnexion">Déconnexion</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <h1>Statistiques</h1>
    <canvas id="stats" style="width:100%;max-width:900px"></canvas>
    <script>
        const xValues = [<?php foreach ($pages as $page) {
                                echo '"' . $page->nom . '" ,';
                            } ?>];
        const yValues = [<?php foreach ($pages as $page) {
                                echo $page->consultations . ' ,';
                            } ?>];

        new Chart("stats", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: "rgba(0,0,255,1.0)",
                    data: yValues
                }]
            },
            options: {
                layout: {
                    padding: 20
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Consultations des pages'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>