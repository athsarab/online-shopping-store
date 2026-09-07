
<div class="container p-4">
  <h4><i class="fa fa-edit mr-2"></i>Edit Product</h4>
  <button class="btn btn-sm btn-secondary mb-3" onclick="showProductItems()">
    <i class="fa fa-arrow-left mr-1"></i> Back to Products
  </button>

<?php
    include_once "../config/dbconnect.php";
    $ID  = (int)($_POST['record'] ?? 0);
    $stmt = $conn->prepare(
        "SELECT p.*, c.category_id AS cat_id 
         FROM product p 
         JOIN category c ON p.category_id = c.category_id 
         WHERE p.product_id = ?"
    );
    $stmt->bind_param('i', $ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0):
        $row1  = $result->fetch_assoc();
        $catID = $row1['category_id'];
        // Resolve display src for the admin panel context
        $imgSrc = str_replace('../admin_panel/', './', $row1['product_image']);
?>

<form id="update-Items" onsubmit="return false;" enctype="multipart/form-data">
    <input type="hidden" id="product_id" name="product_id" value="<?=$row1['product_id']?>">

    <div class="form-group">
        <label>Product Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="p_name" name="p_name"
               value="<?=htmlspecialchars($row1['product_name'])?>" required>
    </div>

    <div class="form-group">
        <label>Product Description <span class="text-danger">*</span></label>
        <textarea class="form-control" id="p_desc" name="p_desc" rows="3" required><?=htmlspecialchars($row1['product_desc'])?></textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Price (Rs) <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="p_price" name="p_price"
                       value="<?=$row1['price']?>" min="1" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Category <span class="text-danger">*</span></label>
                <select class="form-control" id="category" name="category" required>
                    <?php
                      $cats = $conn->query("SELECT * FROM category ORDER BY category_name");
                      while($cat = $cats->fetch_assoc()){
                          $sel = ($cat['category_id'] == $catID) ? 'selected' : '';
                          echo "<option value='".$cat['category_id']."' $sel>"
                               . htmlspecialchars($cat['category_name'])
                               . "</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Current Image</label><br>
        <?php if(!empty($row1['product_image'])): ?>
            <img src="<?=htmlspecialchars($imgSrc)?>"
                 width="180" height="140"
                 style="object-fit:cover; border-radius:8px; border:2px solid #ddd;"
                 alt="current product image">
        <?php else: ?>
            <p class="text-muted">No image uploaded for this product.</p>
        <?php endif; ?>

        <div class="mt-3">
            <label>Replace Image</label>
            <input type="hidden" id="existingImage" name="existingImage"
                   value="<?=htmlspecialchars($row1['product_image'])?>">
            <input type="file" class="form-control-file" id="newImage" name="newImage"
                   accept="image/jpeg,image/png,image/gif,image/webp">
            <small class="text-muted">Leave blank to keep the current image.</small>
        </div>
    </div>

    <div class="form-group mt-3">
        <button type="button" class="btn btn-primary px-4" onclick="updateItems()">
            <i class="fa fa-save mr-1"></i> Update Product
        </button>
        <button type="button" class="btn btn-secondary ml-2" onclick="showProductItems()">Cancel</button>
    </div>
</form>

<?php
    else:
        echo '<div class="alert alert-danger"><i class="fa fa-exclamation-circle mr-2"></i>Product not found.</div>';
    endif;
    $stmt->close();
?>
</div>