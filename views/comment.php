<?php
require '../models/blog.php';
$blog = new Blog();
$id = $_GET['id'];
$getBlog = $blog->getBlogById($id);
$getAllComment = $blog->getAllComment($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" href="../css/swipe.css" rel="stylesheet">
    <style>
        .commentbox {
            height: 500px;
            min-height: 500px;
            border: 1px solid #dfdede;
            padding: 10px;
        }

        .sendmsg {
            background: #3B35CF;
            text-align: left;
            border-radius: 3px;
            color: #267e4e;
            padding: 10px 0px 10px 10px;
            font-size: 20px;
            font-weight: 700;
            margin-top: 2px;
            color: #fff;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mt-4 mb-3 btn btn-primary"><a href="index.php" style="color: #fff;">Back</a></div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row row-grid align-items-center justify-content-center mb-lg-7">
                    <img style="width:50%;height:40%;" src="../image/<?php echo $getBlog[0]['hinh'] ?>" class="w-100" alt="">
                    <h2 class="mb-4"><?php echo $getBlog[0]['tieude'] ?></h2>
                    <p class="font-a"><?php echo $getBlog[0]['noidung'] ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div style="overflow: auto;" class="commentbox">
                    <?php
                    foreach ($getAllComment as $valueComment) { ?>
                        <div style="font-size: 10px;" class="mt-3" ><?php echo $valueComment['macmt'] ?></div>
                        <div class="sendmsg"><?php echo $valueComment['comment'] ?></div>
                    <?php }
                    ?>
                </div>
                <div>
                    <form action="../process/createcommentprocess.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $getBlog[0]['id'] ?>">
                            <input type="text" name="comment" class="form-control mb-2" id="comment" required placeholder="Enter comment">
                            <button type="submit" class="btn btn-primary">Đăng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>