<!-- Primary Meta Tags -->
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
          <h1>ĐĂNG KÍ</h1>
        </div>
        <div class="mb-3">
            <a href="login.php" class="btn btn-primary">ĐĂNG NHẬP</a>
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
            <form action="../process/registerprocess.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">EMAIL</label>
                  <input type="text" name="email" class="form-control" id="email" maxlength="100" required placeholder="Enter email">
                </div>
                <div class="form-group mt-2">
                  <label for="exampleInputEmail1">PASSWORD</label>
                  <input type="password" name="password" class="form-control" id="password" minlength="6" maxlength="20" required placeholder="Enter password">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ĐĂNG KÍ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</body>