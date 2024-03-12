<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>

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
            <button type="submit">Choisir</button>
        </form>

        <?php if (!empty($lesMontants)) { ?>
            <div class="tab-content">
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
                        <?php foreach ($lesMontants as $montant) { ?>
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
            <h3>Graphique</h3>
            <p>Contenu pour le graphique.</p>
        <?php } ?>
    </div>
</div>