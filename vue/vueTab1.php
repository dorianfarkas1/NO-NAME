<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<div class="row mt-3">
    <div class="container">
        <h3><?= $titre ?></h3>
        <form action="index.php?action=tab1" method="post">
            <label for="GrandClientID">Sélectionner un grand client :</label>
            <select name="GrandClientID" id="GrandClientID">
                <option value="">-- Sélectionner --</option>
                <?php foreach ($lesClients as $client) { ?>
                    <option value="<?= $client['GrandClientID'] ?>"><?= $client['NomGrandClient'] ?></option>
                <?php } ?>
            </select>
            <label for="result">Type de résultat :</label>
            <select name="result" id="result">
                <option value="1">Tableau</option>
                <option value="2">Graphique</option>
            </select>
            <button type="submit">Choisir</button>
        </form>

        <?php if (!empty($lesApplicationsTab)) { ?>
            <div class="tab-content">
                <h3><?= $result ?></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Grand Client n°<?php echo($idClient) ?> </th>
                            <th scope="col">Rang</th>
                            <th scope="col">Application</th>
                            <th scope="col">Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($lesApplicationsTab as $appli) { ?>
                            <tr>
                                <td></td>
                                <td>Top <?php echo($i)?> </td>
                                <td><?= $appli['nomAppli'] ?></td>
                                <td><?= $appli['total_cost'] ?></td>
                            </tr>
                        <?php $i = $i + 1; } ?>
                    </tbody>
                </table>
            </div>
        <?php } 
        else if(!empty($lesApplicationsGraph)) { ?>
            <div id="chart-container">
                <h3><?= $result ?></h3>
                <canvas id="graphCanvas"></canvas>
            </div>  
    <?php    }?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var applications = <?php echo json_encode($lesApplicationsGraph); ?>;
        var nom_appli = [];
        var prix = [];

        for (var i in applications) {
            nom_appli.push(applications[i].nomAppli);
            prix.push(applications[i].total_cost);
        }

        var chartdata = {
            labels: nom_appli, // Utilisation des noms d'applications comme labels
            datasets: [{
                label: 'Prix', // Un seul ensemble de données pour le prix
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                data: prix
            },
        ]
        };

        var graphTarget = document.getElementById("graphCanvas");

        var barGraph = new Chart(graphTarget, {
            type: 'line', // Utilisation d'un graphique en ligne
            data: chartdata
        });
    });
</script>

