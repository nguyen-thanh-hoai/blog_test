<?php 
session_start();
if(isset($_SESSION['email'])){ ?> 
<title>Blog-Test</title>

<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">
<style>
  body {
    font-family: Arial, sans-serif;
  }
</style>

<body>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-sm-6">
            <h1>ĐỔI MẬT KhẨU</h1>
          </div>
          <div class="mb-3">
            <a href="register.php" class="btn btn-primary">ĐĂNG KÍ</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
              </div>
              <form action="../process/changepasswordprocess.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">MẬT KHẨU HIỆN TẠI</label>
                    <input type="password" name="oldpassword" class="form-control mb-2" id="oldpassword" minlength="6" maxlength="100" required placeholder="Enter Mật Khẩu Cũ">
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">MẬT KHẨU MỚI</label>
                    <input type="password" name="newpassword" class="form-control" id="newpassword" minlength="6" maxlength="100" required placeholder="Enter Mật Khẩu Mới">
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">XÁC NHẬN MẬT KHẨU MỚI </label>
                    <input type="password" name="newpasswordagain" class="form-control" id="newpasswordagain" minlength="6" maxlength="100" required placeholder="Enter Xác Nhận Mật Khẩu Mới">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ĐỔI MẬT KHẨU</button>
                  <a href="forgotpassword.php" class="btn btn-primary" style="background-color: red;">QUÊN MẬT KHẨU</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<?php }
?>