<?php

/**
 * getLiaisons : Retourne l'ensemble des liaisons avec les noms des ports de départ et d'arrivée
 *
 * @return array
 */

function getAllGrandClient() : array {
    $resultat = array();
    try {
        $cnx = getPDO();
        $req = $cnx->prepare("SELECT * FROM grandclients");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTopApllicationsByClient($id) : array {
    $resultat = array();
    try {
        $cnx = getPDO();
        $req = $cnx->prepare("SELECT gc.NomGrandClient, a.nomAppli, SUM(lf.prix) AS total_cost FROM grandclients gc INNER JOIN clients c ON gc.GrandClientID = c.GrandClientID INNER JOIN ligne_facturation lf ON c.CentreActiviteID = lf.CentreActiviteID INNER JOIN application a ON lf.IRT = a.IRT WHERE gc.GrandClientID = :id GROUP BY gc.NomGrandClient, a.nomAppli ORDER BY gc.NomGrandClient, total_cost DESC LIMIT 10;");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getEvolutionMontantByClient($id) : array {
    $resultat = array();
    try {
        $cnx = getPDO();
        $req = $cnx->prepare("SELECT gc.NomGrandClient,MONTH(lf.mois) AS Mois,YEAR(lf.mois) AS Annee,SUM(lf.prix) AS MontantFacture FROM grandclients gc JOIN clients c ON gc.GrandClientID = c.GrandClientID JOIN ligne_facturation lf ON c.CentreActiviteID = lf.CentreActiviteID WHERE lf.mois BETWEEN '2021-01-01' AND '2022-04-30' AND :id = gc.GrandClientID GROUP BY gc.NomGrandClient,MONTH(lf.mois),YEAR(lf.mois) ORDER BY gc.NomGrandClient,Annee,Mois;");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getVolumeFacture() : array {
    $resultat = array();
    try {
        $cnx = getPDO();
        $req = $cnx->prepare("SELECT MONTH(mois) AS Mois, YEAR(mois) AS Annee, SUM(CASE WHEN produitID = '20' THEN volume ELSE 0 END) AS Volume_1_1, SUM(CASE WHEN produitID = '13' THEN volume ELSE 0 END) AS Volume_1_4 FROM ligne_facturation WHERE produitID IN ('20', '13') AND mois BETWEEN '2021-01-01' AND '2022-04-30' GROUP BY Annee, Mois ORDER BY Annee, Mois;");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getLiaisons() : \n";
    print_r(getLiaisons());

    echo "getLiaisonsBySecteur(3) \n";
    print_r(getLiaisonsBySecteur(3));

    echo "getLiaisonById(1) : \n";
    print_r(getLiaisonById(1));

    echo "getLiaisonsLignes() : \n";
    print_r(getLiaisonsLignes());

    echo "getLiaisonsBySecteurLignes(3) : \n";
    print_r(getLiaisonsBySecteurLignes(3));
}
?>