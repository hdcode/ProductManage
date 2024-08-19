<?php

	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../index.php');
	}

?>

<?php

require_once "../models/CategoryDB.php";

$categorydb = new CategoryDB();
$categories = $categorydb->readAll();


?>

<?php

include("./layouts/sidebar.php");
include("./layouts/navbar.php");

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Category</h1>
        <button onclick="window.location.href='generate_pdf.php'" class="btn btn-primary">Imprimer en PDF</button>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>N²</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if ($categories != null && (sizeof($categories) != 0)) {
                                    $i = 1;
                                    foreach ($categories as $cat) {
                                        $update = 'updateCategory.php?id=' . $cat->id;
                                        $delete = '../controllers/categoryController.php?action=delete&id=' . $cat->id;
                            ?>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $cat->libelle; ?></td>
                                <td><?php echo $cat->description; ?></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-success btn-circle" onclick="document.location.href='<?php echo $update; ?>'">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger btn-circle" onclick="document.location.href='<?php echo $delete; ?>'">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a class="btn btn-info btn-circle deleteBtn" data-id="<?php echo $cat->id; ?>">  
                                            <i class="fas fa-trash"></i>  
                                        </a> 
                                        
                                    </div>
                                </td>
                            </tr>
                        
                            <?php
                                }
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