<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="col-sm-6 mb-4">
            <h1>Tạo Tài Khoản</h1> 
          </div>
          <div class="d-flex justify-content-center align-items-center">
          <form action="<?= ROOT ?>account/addAccount" method="post" class="col-sm-7">
							<div class="mb-3">
								<label for="fullName" class="form-label">Họ tên</label>
								<input type="text" class="form-control" id="fullName" name="fullName" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Mật khẩu</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<div class="mb-3">
								<label for="phoneNumber" class="form-label">Số điện thoại</label>
								<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
							</div>
							<div class="mb-3">
								<label for="birth" class="form-label">Ngày sinh</label>
								<input type="text" class="form-control" id="birth" name="birth" placeholder="01/01/2024" required>
							</div>
							<div class="mb-3">
								<label for="gender">Giới tính:</label>
								<select id="gender" name="gender">
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
									<option value="other">Khác</option>
								</select>
							</div>
							<div class="mb-3" hidden>
								<label for="address" class="form-label">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address" value="none">
							</div>
							<div class="text-center mt-4">
								<button type="submit" class="btn btn-primary auth-btn" onclick="Confirm()">Xác nhận</button>
							</div>
					</form> 
          </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script>
	function Confirm() {
		// Hiển thị thông báo xác nhận
		alert("Tài khoản đã được tạo thành công!");
		// Cho phép form được gửi đi
		return true;
	}
  </script>
  

<?php $this->view("./admin/Shared/footer"); ?>
