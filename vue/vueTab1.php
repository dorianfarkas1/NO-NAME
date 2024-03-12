<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>

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
            <button type="submit">Choisir</button>
        </form>

        <?php if (!empty($lesApplications)) { ?>
            <div class="tab-content">
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
                        <?php foreach ($lesApplications as $appli) { ?>
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
        <?php } ?>
    </div>
</div>