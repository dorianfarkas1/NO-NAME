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
        <form action="index.php?action=tab3" method="post">
            <label for="result">Type de résultat :</label>
            <select name="result" id="result">
                <option value="1">Tableau</option>
                <option value="2">Graphique</option>
            </select>
            <button type="submit">Choisir</button>
        </form>
        <?php if (!empty($lesVolumesTab)) { ?>
            <div class="tab-content">
                <h3><?= $result ?></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mois </th>
                            <th scope="col">Année</th>
                            <th scope="col">Produit 1</th>
                            <th scope="col">Produit 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesVolumesTab as $volume) { ?>
                            <tr>
                                <td><?= $volume['Mois'] ?></td>
                                <td><?= $volume['Annee'] ?></td>
                                <td><?= $volume['Volume_1_1'] ?></td>
                                <td><?= $volume['Volume_1_4'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else if(!empty($lesVolumesGraph)){ ?>
            <div id="chart-container">
                <h3><?= $result ?></h3>
                <canvas id="graphCanvas"></canvas>
            </div>
    <?php    }?>    
    </div>
</div>


    
<script>
    // on lance la fonction showGraph au chargement de la page
    document.addEventListener('DOMContentLoaded', function () {
        // on crée des tableaux de données statiques
        var volumeData = <?php echo json_encode($lesVolumesGraph); ?>;
        var jours = ["Janvier 2023", "Fevrier 2023", "Mars 2023", "Avril 2023", "Mai 2023", "Juin 2023", "Juillet 2023", "Aout 2023", "Septembre 2023", "Octobre 2023", "Novembre 2023", "Decembre 2023", "Janvier 2024", "Fevrier 2024", "Mars 2024", "Avril 2024"];
        var nombres = [];
        var nombres1 = [];

        for (var i in volumeData) {
                nombres.push(volumeData[i].Volume_1_1);
                nombres1.push(volumeData[i].Volume_1_4);
            }
        
        // on fabrique à partir des tableaux jours et nombres la structure de données attendue par Chart.js pour un graphique en barres
        var chartdata = {
            labels: jours,
            datasets: [{
                label: 'Volume_1_1',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1,
                data: nombres     
            },

            {
                label: 'Volume_1_4',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1,
                data: nombres1
            }]
        };

        // on récupère l'élément canvas pour y afficher le graphique
        var graphTarget = document.getElementById("graphCanvas");

        // on crée le graphique avec Chart.js en lui passant l'élément canvas et les données créées
        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    });
</script>
