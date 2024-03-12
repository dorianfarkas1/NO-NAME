<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
$titre = "Evolution Mensuelle des Montants Facturés";
$lesVolumes = getVolumeFacture();
include "$racine/vue/header.php";
include "$racine/vue/vueTab3.php";
include "$racine/vue/footer.php";

?>