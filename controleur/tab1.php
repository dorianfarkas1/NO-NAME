<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
if(isset($_POST['GrandClientID'])){
    $idClient = $_POST['GrandClientID'];
    $titre = "Top 10 des Applications du Grand-Client ".$idClient;
    $lesClients = getAllGrandClient();
    $lesApplications = getTopApllicationsByClient($_POST['GrandClientID']);
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab1.php";
    include "$racine/vue/footer.php";
}
else{
    $titre = "Top 10 des Applications par Grand-Client";
    $lesClients = getAllGrandClient();
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab1.php";
    include "$racine/vue/footer.php";
}
?>