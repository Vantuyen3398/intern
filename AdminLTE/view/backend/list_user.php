<form action="admin.php?controller=user&action=list_user&keyword=<?php $item[2]?>" method="get">
      <!-- <input type="hidden" name="c" value="user"> -->
      <input type="text" name="keyword" placeholder="Tìm Kiếm..." value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
      <input type="submit" value="Search">
    </form>
<div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List user</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php
                  $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                  if(!empty($keyword)){
                    foreach ($list_user as $key => $item){
                ?>
                  <tr>
                      <th scope="row"><?php echo $key + 1?></th>
                      <td><?php echo $item[0]?></td>
                      <td><?php echo $item[1]?></td>
                      <td><?php echo $item[2]?></td>
                      <td><?php echo $item[6]?></td>
                      <td>
                        <a onclick="return confirm('Are you want to delete?')" href="admin.php?controller=user&action=list_user&username=<?php echo $item[2];?>">Delete</a>
                      </td>
                  </tr>
                <?php
                    }
                  }
                  else 
                  {
                    if($start_from){
                      foreach ($start_from as $key => $item) {
                ?>
                    <tr>
                      <th scope="row"><?php echo $key + 1?></th>
                      <td><?php echo $item[0]?></td>
                      <td><?php echo $item[1]?></td>
                      <td><?php echo $item[2]?></td>
                      <td><?php echo $item[6]?></td>
                      <td>
                        <a onclick="return confirm('Are you want to delete?')" href="admin.php?controller=user&action=list_user&username=<?php echo $item[2];?>">Delete</a>
                      </td>
                  </tr>
                <?php 
                }
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
                      if($list_all_user){
                        $i = 1;
                        $size = count($list_all_user);
                        $page = ceil($size / 3);
                        for($i = 1; $i <= $page; $i++){
                      echo '<li class="page-item"><a class="page-link" href="admin.php?controller=user&action=list_user&page='.$i.'">'.$i.'</a>';
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