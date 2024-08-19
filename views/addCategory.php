<?php

	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: ../index.php');
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
        <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Form Add Category
                    </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <form action="../controllers/CategoryController.php?action=create" method="POST">
                            <div class="mb-3">
                                <label for="libelle" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="libelle" name="libelle" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <input type="text" class="form-control" id="description" name="description" />
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