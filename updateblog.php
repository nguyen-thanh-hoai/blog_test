<?php
require 'models/blog.php';
$blog = new Blog();
$getBlog = $blog->getBlogById($_GET['id']);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- enctype="multipart/form-data" -->
            <form action="updateblogprocess.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tiêu đề</label>
                  <input type="hidden" name="id" value="<?php echo $getBlog[0]['id']?>">
                  <input value="<?php echo $getBlog[0]['tieude'] ?>" type="text" name="tieude" class="form-control" id="tieude" required placeholder="Enter tieu de" >
                </div>
                <div class="form-group">
                  <label for="">Nội dung</label>
                  <input value="<?php echo $getBlog[0]['noidung'] ?>" type="text" name="noidung" class="form-control" id="noidung" required placeholder="Enter password" >
                </div>
                <div class="form-group">
                  <label for="">Hình</label>
                  <input type="file" name="hinh" class="form-control" id="hinh">
                  <img style="width:300px" src="./image/<?php echo $getBlog[0]['hinh'] ?>" alt="hinh">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>