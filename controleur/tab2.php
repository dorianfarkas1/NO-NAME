<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
if(isset($_POST['GrandClientID'])){
    $idClient = $_POST['GrandClientID'];
    $titre = "Evolution Mensuelle des Montants Facturés du client ".$idClient;
    $lesClients = getAllGrandClient();
    $lesMontants = getEvolutionMontantByClient($_POST['GrandClientID']);
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab2.php";
    include "$racine/vue/footer.php";
}
else{
    $titre = "Evolution Mensuelle des Montants Facturés";
    $lesClients = getAllGrandClient();
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab2.php";
    include "$racine/vue/footer.php";
}
?>