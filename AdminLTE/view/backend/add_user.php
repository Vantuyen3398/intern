<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin.php?controller=user&action=add_user" method="post" name="register" onsubmit="return validateForm()" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control" placeholder="example@domain.com" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername">Username</label>
                  <input type="text" class="form-control" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputate">Date</label>
                  <input type="date" class="form-control" id="exampleInputDate" placeholder="Date" name="date">
                </div>
                <div class="form-group">
                  <label for="img">Avatar</label>
                  <input type="file" class="form-control" id="img" placeholder="" name="avatar">
                </div>
                <div class="form-group">
                  <select name="role">
                        <option value="1">Admin</option>
                        <option value="0">Customer</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="add_user">ADD USER</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>