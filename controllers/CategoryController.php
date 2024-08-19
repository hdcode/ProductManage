<?php

require_once "./Controller.php";

$action = $_GET["action"];

if ($action == "create") {
    $libelle= $_POST['libelle'];
    $description= $_POST['description'];

    $categorydb->create($libelle, $description);
    header("Location: ../views/listCategory.php?success=true");
}

if ($action == "update") {
    $id= $_POST['id'];
    $libelle= $_POST['libelle'];
    $description= $_POST['description'];

    $categorydb->update($id, $libelle, $description);
    header("Location: ../views/listCategory.php?update_success=true");
}

if ($action == "delete") {
    $id= $_GET['id'];

    $categorydb->delete($id);
    header("Location: ../views/listCategory.php");
}




?>