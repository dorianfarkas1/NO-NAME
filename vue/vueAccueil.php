<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Application de Consultation des Données de Facturation</title>
    <!-- Intégrer des styles CSS ici -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .btn {
            padding: 15px 30px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Application de Consultation des Données de Facturation</h1>
        <p>Bienvenue sur l'application de consultation des données de facturation de la DSI infra.</p>
        <p>Choisissez une option ci-dessous pour commencer :</p>
        <div class="btn-container">
            <a href="./?action=tab1" class="btn">Consulter le Top 10 des Applications par Grand-Client</a>
            <a href="./?action=tab2" class="btn">Consulter l'évolution Mensuelle des Montants Facturés</a>
            <a href="./?action=tab3" class="btn">Consulter l'évolution Comparée des Volumes Facturés</a>
        </div>
    </div>
</body>
</html>
