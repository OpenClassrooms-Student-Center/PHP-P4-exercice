<?php

if(empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['description'])
    || empty($_POST['image'])
    || strlen($_POST['description']) < 3
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    header('Location: ajouter.php?erreur=true');
} else {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);

    // Puis on insère notre oeuvre en base de données
    require 'bdd.php';
    $db = connexion();
    $req = $db->prepare('INSERT INTO oeuvres (titre, description, artiste, image) VALUES (?, ?, ?, ?)');
    $req->execute([$titre, $description, $artiste, $image]);

    // $db->lastInsertId() permet de récupérer l'id de la dernière ligne insérée en base de données (en l'occurence, l'oeuvre que nous venons d'ajouter).
    header('Location: oeuvre.php?id=' . $db->lastInsertId());
}