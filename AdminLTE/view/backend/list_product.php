<style type="text/css">
  img{
    height: 70px;
  }
</style>
<div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" >
                <tr>
                  <th style="width: 10px ;text-align: center">ID</th>
                  <th style="width: 200px;text-align: center">Name</th>
                  <th>Category</th>
                  <th style="width: 100px;text-align: center">Price</th>
                  <th style="text-align: center">Image</th>
                  <th style="width: 100px;text-align: center">Action</th>
                </tr>
                <?php  
                  if($start_from){
                    foreach ($start_from as $a => $value) {
                      $k = $value[1];
                ?>
                  <tr>
                    <th style="width: 10px;text-align: center; line-height: 70px"><?php echo $a + 1?></th>

                  <th style="text-align: center; line-height: 70px"><?php echo $value[0]?></th>
                  
                  <?php  
                    if($cate){
                      foreach ($cate as $key => $item) {
                        $cate_cate = $key + 1;
                        if($cate_cate == $k){
                  ?>
                   <th style="text-align: center; line-height: 70px"><?php echo $item[0]?></th>  
                  
                  <?php
                        }
                      }
                    }
                  ?>
                  <th style="text-align: center; line-height: 70px"><?php echo $value[2]?></th>

                  <th><img src="uploads/product/<?php echo $value[3]?>" width = "100px" height = "80px" alt="" /></th>

                  <th style="width: 40px;text-align: center; line-height: 70px">
                    <a href="admin.php?action=edit_product&name=<?php echo $value[0];?>">
                      <button type="button" class="btn btn-block btn-info">EDIT</button>
                    </a> 
                    <a href="admin.php?action=delete_product&id=<?php echo $id;?>">
                      <button type="button" class="btn btn-block btn-danger">DELETE</button>
                    </a>
                  </th>
                  </tr>
                <?php
                    }
                  }
                ?>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      </a>
                  </li>
                    <?php 
                      if($list_product){
                        $i = 1;
                        $size = count($list_product);
                        $page = ceil($size / 3);
                        for($i = 1; $i <= $page; $i++){
                      echo '<li class="page-item"><a class="page-link" href="admin.php?action=list_product&page='.$i.'">'.$i.'</a>';
                        }
                      }
                    ?>
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!-- /.col -->
      </div>
  </div>     