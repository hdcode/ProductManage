<?php  
// Vérifiez que l'utilisateur a demandé l'exportation  
if (isset($_GET['export'])) {  
    // Les données que vous souhaitez exporter  
    $data = [  
        ['ID', 'Nom', 'Âge'],  
        [1, 'Alice', 30],  
        [2, 'Bob', 25],  
        [3, 'Charlie', 35],  
    ];  

    // En-têtes pour le téléchargement  
    header('Content-Type: text/csv');  
    header('Content-Disposition: attachment; filename="data.csv"');  

    // Ouvrir la sortie en mode écriture  
    $output = fopen('php://output', 'w');  

    // Écrire les données dans le fichier CSV  
    foreach ($data as $row) {  
        fputcsv($output, $row);  
    }  

    // Fermer la ressource  
    fclose($output);  
    exit();  
}  
?>