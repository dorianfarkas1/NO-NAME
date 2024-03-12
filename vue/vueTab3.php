<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>

<div class="row mt-3">
    <div class="container">
        <h3> Evolution comparés des volumes facturés entre Janvier 2021 et Avril 2022 </h3>
            <div class="tab-content">
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
                        <?php foreach ($lesVolumes as $volume) { ?>
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
            <h3>Graphique</h3>
            <p>Contenu pour le graphique.</p>
    </div>
</div>