<?php
// Commande système à exécuter — sans argument utilisateur
$command = '/bin/hostname';

// On vérifie que la commande existe
if (!is_executable($command)) {
    http_response_code(500);
    echo "Erreur : commande non disponible.";
    exit;
}

// Exécution sécurisée
$output = shell_exec(escapeshellcmd($command));

// Affichage avec protection HTML
echo "Nom d'hôte : " . htmlspecialchars(trim($output), ENT_QUOTES | ENT_SUBSTITUTE);
