<?php

	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../index.php');
	}

?>
<?php
require_once "../models/CategoryDB.php";

$categorydb= new CategoryDB();

?>

<?php

    include("./layouts/sidebar.php");
    include("./layouts/navbar.php");

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Form Add Product
                    </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <form method="POST" action="../controllers/ProductController.php?action=create" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="name" class="form-control" id="name" name="name" />
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="price" name="price" />
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Product Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" />
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image" />
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Product Category</label>
                                <select class="form-control" name="categoryId">
                                    <?php
                                        foreach ($categorydb->readAll() as $cat) {
                                    ?>
                                        <option value="<?php echo $cat->id ?>">
                                            <?php echo $cat->libelle; ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
    include("./layouts/footer.php");
?>