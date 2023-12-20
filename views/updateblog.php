<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Place the first <script> tag in your HTML's <head> -->
  <script src="https://cdn.tiny.cloud/1/xwzjq80brse3gcrnvsuzxy3i1rxh9mdkfa4iuov46sve8bd5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
  <script>
    tinymce.init({
      selector: '.textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
  </script>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
  </style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Blog-Test</title>

<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">

<?php
require '../models/blog.php';
if (isset($_GET['id'])) {
  $blog = new Blog();
  $getBlog = $blog->getBlogById($_GET['id']);
?>

  <body>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-sm-6">
              <h1>UPDATE</h1>
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
                <form action="../process/updateblogprocess.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Tiêu đề</label>
                      <input type="hidden" name="id" value="<?php echo $getBlog[0]['id'] ?>">
                      <input value="<?php echo $getBlog[0]['tieude'] ?>" type="text" name="tieude" class="form-control" id="tieude" maxlength="255" required placeholder="Enter tieu de">
                    </div>

                    <div class="form-group">
                      <label for="">Nội dung</label>
                      <textarea class="textarea" name="noidung" id="noidung" maxlength="500" cols="30" rows="10"><?php echo $getBlog[0]['noidung'] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Danh mục</label>
                      <input type="text" value="<?php echo $getBlog[0]['danhmuc'] ?>" name="danhmuc" class="form-control" id="danhmuc" maxlength="100" required placeholder="Enter danh mục">
                    </div>
                    <div class="form-group">
                      <label for="">Hình</label>
                      <input type="file" name="hinh" maxlength="100" class="form-control" id="hinh">
                      <img style="width:300px" src="../image/<?php echo $getBlog[0]['hinh'] ?>" alt="hinh">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
<?php
}
?>