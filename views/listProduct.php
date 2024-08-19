<?php

	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../index.php');
	}

?>

<?php

require_once '../models/CategoryDB.php';
require_once '../models/ProductDB.php';


$categorydb = new CategoryDB();
$productdb = new ProductDB();

$product = $productdb->readAll();

?>

<?php

include("./layouts/sidebar.php");
include("./layouts/navbar.php");

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Product</h1>
        <div>
            <button class="btn btn-success" onclick="exportToExcel()">Exportez pour excel</button>
            <button onclick="window.location.href='generate_prod.php'" class="btn btn-primary">Imprimer en PDF</button>
        </div>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($product != null && sizeof($product) != 0) {
                                $i = 1;
                                foreach ($product as $prod) {
                                    $update = 'updateProduct?id=' . $prod->id;
                                    $delete = '../controllers/ProductController.php?action=delete&id=' . $prod->id;

                                    $category = $categorydb->read($prod->categoryId);
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $prod->name; ?></td>
                                <td><?php echo $prod->price; ?></td>
                                <td><?php echo $prod->quantity; ?></td>
                                <td>  
                                    <img src="../uploads/<?php echo $prod->image; ?>" alt="Image du produit" width="50" height="50" />  
                                </td>
                                <td><?php echo $category->libelle; ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-success btn-circle" onclick="document.location.href='<?php echo $update; ?>'">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle" onclick="document.location.href='<?php echo $delete; ?>'">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {

                                ?>
                                <tr>
                                    <td style="text-align: center;" colspan="7">
                                        <?php echo ("Aucune données trouvées"); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php
include("./layouts/footer.php");
?>