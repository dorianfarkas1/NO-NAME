<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

if(isset($_POST['result'])){
    if($_POST['result'] == 1){
        $titre = "Evolution comparés des volumes facturés";
        $result = "Tableau";
        $lesVolumesTab = getVolumeFacture();
        include "$racine/vue/header.php";
        include "$racine/vue/vueTab3.php";
        include "$racine/vue/footer.php";
    }
    else{
        $titre = "Evolution comparés des volumes facturés";
        $result = "Graphique";
        $lesVolumesGraph = getVolumeFacture();
        include "$racine/vue/header.php";
        include "$racine/vue/vueTab3.php";
        include "$racine/vue/footer.php";
    }
}
else{
    $titre = "Evolution comparés des volumes facturés";
    include "$racine/vue/header.php";
    include "$racine/vue/vueTab3.php";
    include "$racine/vue/footer.php";
}
?>