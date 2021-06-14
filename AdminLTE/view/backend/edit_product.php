<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?action=update_product" method="post" name="register" onsubmit="return validateForm()" enctype="multipart/form-data">
              <div class="box-body">
                <?php  
                  if($edit){
                  
                ?>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="name" value="<?php echo $edit[0]?>">
                </div>
                <div class="form-group">
                  <label>Category</label>
                    <?php  
                    if($cate){
                      foreach ($cate as $key => $item) {
                        $cate_cate = $key + 1;
                        if($cate_cate == $edit[1]){
                    ?>
                    <select class="form-control" name="category_name">
                      <option value="<?php echo $key + 1?>">
                        <?php echo $item[0]?>
                      </option>
                    </select>
                    <?php
                      }
                    }
                  }
                    ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Price</label>
                  <input type="text" class="form-control" id="exampleInputPrice1" placeholder="Price" name="price" value="<?php echo $edit[2]?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">
                    <img src="uploads/product/<?php echo $edit[3]?>" width = "100px" height = "80px" alt="" />
                  </label>
                  
                  <input type="file" id="exampleInputFile" name="image">
                </div>
              <?php } ?>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="update_product">UPDATE PRODUCT</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>