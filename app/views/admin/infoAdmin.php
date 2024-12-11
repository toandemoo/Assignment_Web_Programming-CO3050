<?php $this->view("./admin/Shared/header"); ?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tài Khoản</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                  <h3>Cập nhật thông tin</a></li>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <!-- /.tab-pane -->
                  <div id="settings">
                    <form class="form-horizontal" action="<?= ROOT ?>InfoAdmin/updateAccount/<?= $data['user']->id ?>" method="post">
                      <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Họ Tên</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="name" 
                                    value="<?= isset($data['user']) ? htmlspecialchars($data['user']->name) : '' ?>" placeholder="Name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" name="email" 
                                    value="<?= isset($data['user']) ? htmlspecialchars($data['user']->email) : '' ?>" placeholder="Email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" name="password" 
                                    value="<?= isset($data['user']) ? htmlspecialchars($data['user']->password) : '' ?>" placeholder="password">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPhone" class="col-sm-2 col-form-label">Số điện thoại</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputPhone" name="phone" 
                                    value="<?= isset($data['user']) ? htmlspecialchars($data['user']->phone) : '' ?>" placeholder="Số điện thoại">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputBirthday" class="col-sm-2 col-form-label">Ngày sinh</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputBirthday" name="birthday" 
                                    value="<?= isset($data['user']) ? htmlspecialchars($data['user']->birthday) : '' ?>" placeholder="Ngày sinh">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="gender" class="col-sm-2 col-form-label">Giới tính</label>
                          <div class="col-sm-10">
                              <select id="gender" name="gender" class="form-control">
                                  <option value="male" <?= isset($data['user']) && $data['user']->gender === 'male' ? 'selected' : '' ?>>Nam</option>
                                  <option value="female" <?= isset($data['user']) && $data['user']->gender === 'female' ? 'selected' : '' ?>>Nữ</option>
                                  <option value="other" <?= isset($data['user']) && $data['user']->gender === 'other' ? 'selected' : '' ?>>Khác</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="address" name="address" 
                                value="<?= isset($data['user']) ? htmlspecialchars($data['user']->name) : '' ?>" placeholder="Địa chỉ">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger" onclick="Confirm()">Cập nhật</button>
                          </div>
                      </div>
                  </form>

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
   <script>
	function Confirm() {
		// Hiển thị thông báo xác nhận
		alert("Tài khoản đã được cập nhật thành công!");
		// Cho phép form được gửi đi
		return true;
	}
  </script>

<?php $this->view("./admin/Shared/footer"); ?>
