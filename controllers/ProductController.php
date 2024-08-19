<?php

require_once "./Controller.php";
require_once "../models/Upload.php";
$upload = new Upload();

$action = $_GET["action"];

if ($action == "create") {
    $name= $_POST['name'];
    $price= $_POST['price'];
    $quantity= $_POST['quantity'];
    $imgURL = $upload->upload_image($_FILES['image'], 'img-', 800, 600, '../uploads/');
    $categoryId= $_POST['categoryId'];

    $productdb->create($name, $price, $quantity, $imgURL, $categoryId);
    header("Location: ../views/listProduct.php");
}

if ($action == "update") {
    $id= $_POST['id'];
    $name= $_POST['name'];
    $price= $_POST['price'];
    $quantity= $_POST['quantity'];
    $imgURL = $upload->upload_image($_FILES['image'], 'img-', 800, 600, '../uploads/');
    // $image= $_POST['image'];
    $categoryId= $_POST['categoryId'];

    $productdb->update($id, $name, $price, $quantity, $imgURL, $categoryId);
    header("Location: ../views/listProduct.php");
}

if ($action == "delete") {
    $id= $_GET['id'];

    $productdb->delete($id);
    header("Location: ../views/listProduct.php");
}




?>