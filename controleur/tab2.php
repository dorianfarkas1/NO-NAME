<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
if(isset($_POST['GrandClientID'])){
    if($_POST['result'] == 1){
        $idClient = $_POST['GrandClientID'];
        $titre = "Evolution Mensuelle des Montants Facturés du client ".$idClient;
        $result = "Tableau";
        $lesClients = getAllGrandClient();
        $lesMontantsTab = getEvolutionMontantByClient($_POST['GrandClientID']);
        include "$racine/vue/header.php";
        include "$racine/vue/vueTab2.php";
        include "$racine/vue/footer.php";
    }
    else{
        $idClient = $_POST['GrandClientID'];
        $titre = "Evolution Mensuelle des Montants Facturés du client ".$idClient;
        $result = "Graphique";
        $lesClients = getAllGrandClient();
        $lesMontantsGraph = getEvolutionMontantByClient($_POST['GrandClientID']);
        include "$racine/vue/header.php";
        include "$racine/vue/vueTab2.php";
        include "$racine/vue/footer.php";
    }
}
else{
    $titre = "Evolution Mensuelle des Montants Facturés";
    $lesClients = getAllGrandClient();
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab2.php";
    include "$racine/vue/footer.php";
}
?>