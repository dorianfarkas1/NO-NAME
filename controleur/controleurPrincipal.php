<?php
$keyword = " ";
$description = " ";

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["accueil"] = "accueil.php";
    $lesActions["tab1"] = "tab1.php";
    $lesActions["tab2"] = "tab2.php";
    $lesActions["tab3"] = "tab3.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
?>

