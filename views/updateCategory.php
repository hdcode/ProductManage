<?php

	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../index.php');
	}

?>
<?php

require_once "../models/CategoryDB.php";

$categorydb = new CategoryDB();
$category = null;

if (isset($_GET['id'])) {
    $category = $categorydb->read($_GET['id']);
}else{
    header("Location: listCategory.php");
}

?>


<?php

include("./layouts/sidebar.php");
include("./layouts/navbar.php");

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Form Update Category
                    </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">

                <?php 
                    if($category != null) {
                ?>

                    <div class="card-body">
                        <form method="POST" action="../controllers/CategoryController.php?action=update">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $category->id; ?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="libelle" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $category->libelle; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="<?php echo $category->description; ?>"/>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                
                <?php 
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 
<?php
include("./layouts/footer.php");
?>