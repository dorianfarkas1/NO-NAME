<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>

<script> 
// on lance la fonction showGraph au chargement de la page 
document.addEventListener('DOMContentLoaded', function () { 
    // on crée des tableaux de données statiques 
    var graph = <?php echo json_encode($lesMontantsGraph); ?>;
    var Mois = ["Janvier 2021", "Fevrier 2021", "Mars 2021", "Avril 2021", "Mai 2021", "Juin 2021", "Juillet 2021", "Aout 2021", "Septembre 2021", "Octobre 2021", "Novembre 2021", "Decembre 2021", "Janvier 2022", "Fevrier 2022", "Mars 2022", "Avril 2022"]; 
    var Montant = []; 
    // on fabrique à partir des tableaux jours et nombres la structure de données attendue par Chart.js pour un graphique en barres 
    for (var i in graph) {
            Montant.push(graph[i].MontantFacture);
        }

    var chartdata = { 
        labels: Mois, 
        datasets: [{ 
            label: 'Montants Facturés', 
            backgroundColor: 'rgba(255, 99, 132, 0.2)', 
            borderColor: 'rgb(255, 99, 132)', 
            borderWidth: 1, 
            data: Montant 
        }] 
    }; 
    // on récupère l'élément canvas pour y afficher le graphique 
    var graphTarget = document.getElementById("graphCanvas"); 
    // on crée le graphique avec Chart.js en lui passant l'élément canvas et les données créées 
    var barGraph = new Chart(graphTarget, { 
        type: 'line', 
        data: chartdata 
        }); 
    }); 
</script>

<div class="row mt-3">
    <div class="container">
        <h3><?= $titre ?></h3>
        <form action="index.php?action=tab2" method="post">
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

        <?php if (!empty($lesMontantsTab)) { ?>
            <div class="tab-content">
            <h3>Tableau</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Grand Client n°<?php echo($idClient) ?> </th>
                            <th scope="col">Mois</th>
                            <th scope="col">Année</th>
                            <th scope="col">Montant de la facture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesMontantsTab as $montant) { ?>
                            <tr>
                                <td></td>
                                <td><?= $montant['Mois'] ?></td>
                                <td><?= $montant['Annee'] ?></td>
                                <td><?= $montant['MontantFacture'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } 
                else if(!empty($lesMontantsGraph)) { ?>
            <div id="chart-container">
                <h3>Graphique</h3> 
                <canvas id="graphCanvas"></canvas> 
            </div>
        <?php } ?>
    </div>
</div>