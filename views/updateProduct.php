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
$productdb= new ProductDB();

$categorys= null;
$products= null;

if(isset($_GET['id']) == true) {
	$products= $productdb->read($_GET['id']);
    $categorys=$categorydb->read($products->categoryId);
}
else {
	header('Location: listProduct.php');
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
                        Form Update Product
                    </h6>
                </a>
                <!-- Card Content - Collapse -->

                <?php 
                    if($products != null) {
                ?>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <form method="POST" action="../controllers/ProductController.php?action=update" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?php echo $products->id ?>" />
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="name" class="form-control" id="name" name="name" value="<?php echo $products->name ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $products->price ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $products->quantity ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value="<?php echo $products->image ?>"/>
                                    <?php if (!empty($products->image)): ?>  
                                        <div>  
                                            <img src="../uploads/<?php echo $products->image; ?>" alt="Image existante" width="75" height="75" />  
                                        </div>  
                                    <?php endif; ?> 
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Product Category</label>
                                    <select class="form-control" name="categoryId">
                                        <?php
                                            foreach ($categorydb->readAll() as $cat) {
                                                if($products->categoryId == $cat->id) {
                                        ?>
                                            <option value="<?php echo $cat->id ?>" selected>
                                                <?php echo $cat->libelle ?>
                                            </option>
                                            <?php
                                                }
                                                else {
                                            ?>
                                            <option value="<?php echo $cat->id ?>">
                                                <?php echo $cat->libelle ?>
                                            </option>
                                        <?php
                                                }
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
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
include("./layouts/footer.php");
?>