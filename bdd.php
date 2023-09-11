<?php
function connexion() {
    try
    {
        // Pensez à modifier cette ligne avec le nom de votre base de données et vos identifiants
        return new PDO('mysql:host=localhost;dbname=artbox;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}
