
<div>
  <h2><i class="fa fa-shopping-bag mr-2"></i>Product Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Description</th>
        <th class="text-center">Category</th>
        <th class="text-center">Price (Rs)</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT p.*, c.category_name 
              FROM product p 
              JOIN category c ON p.category_id = c.category_id 
              ORDER BY p.uploaded_date DESC";
      $result = $conn->query($sql);
      $count = 1;
      if ($result && $result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          // Convert DB path to be usable from admin panel context
          $imgSrc = str_replace('../admin_panel/', './', $row['product_image']);
    ?>
    <tr>
      <td><?=$count?></td>
      <td>
        <?php if(!empty($row['product_image'])): ?>
          <img height='80px' width='80px' style='object-fit:cover; border-radius:6px; border:1px solid #ddd;'
               src='<?=htmlspecialchars($imgSrc)?>' alt='product image'>
        <?php else: ?>
          <span class='text-muted' style='font-size:12px;'>No image</span>
        <?php endif; ?>
      </td>
      <td><?=htmlspecialchars($row['product_name'])?></td>
      <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
        <?=htmlspecialchars(mb_substr($row['product_desc'], 0, 70)) . (mb_strlen($row['product_desc']) > 70 ? '...' : '')?>
      </td>
      <td><?=htmlspecialchars($row['category_name'])?></td>
      <td><?=number_format($row['price'])?></td>
      <td><button class="btn btn-primary btn-sm" onclick="itemEditForm('<?=$row['product_id']?>')">
        <i class="fa fa-edit"></i> Edit</button></td>
      <td><button class="btn btn-danger btn-sm" onclick="itemDelete('<?=$row['product_id']?>')">
        <i class="fa fa-trash"></i> Delete</button></td>
    </tr>
    <?php
          $count++;
        }
      } else { ?>
    <tr>
      <td colspan="8" class="text-center py-4 text-muted">
        <i class="fa fa-inbox fa-2x d-block mb-2"></i>
        No products yet. Click "Add Product" to add your first item!
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>

  <!-- Add Product Button -->
  <button type="button" class="btn btn-secondary mb-4" data-toggle="modal" data-target="#addProductModal">
    <i class="fa fa-plus"></i> Add Product
  </button>

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-plus-circle mr-2"></i>New Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="addProductForm" enctype='multipart/form-data' onsubmit="return false;">
            <div class="form-group">
              <label>Product Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="p_name" name="p_name" placeholder="e.g. Blue Floral Dress" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Price (Rs) <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="p_price" name="p_price" placeholder="e.g. 2500" min="1" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category <span class="text-danger">*</span></label>
                  <select class="form-control" id="category" name="category" required>
                    <option value="" disabled selected>-- Select category --</option>
                    <?php
                      $catResult = $conn->query("SELECT * FROM category ORDER BY category_name");
                      if($catResult && $catResult->num_rows > 0){
                        while($cat = $catResult->fetch_assoc()){
                          echo "<option value='".$cat['category_id']."'>".htmlspecialchars($cat['category_name'])."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Description <span class="text-danger">*</span></label>
              <textarea class="form-control" id="p_desc" name="p_desc" rows="3" placeholder="Describe the product..." required></textarea>
            </div>
            <div class="form-group">
              <label>Product Image</label>
              <input type="file" class="form-control-file" id="file" name="file" accept="image/jpeg,image/png,image/gif,image/webp">
              <small class="text-muted">Accepted: jpg, jpeg, png, gif, webp &mdash; max ~10 MB</small>
            </div>
            <button type="button" class="btn btn-success px-4" onclick="addItems()">
              <i class="fa fa-upload mr-1"></i> Upload &amp; Add Item
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>